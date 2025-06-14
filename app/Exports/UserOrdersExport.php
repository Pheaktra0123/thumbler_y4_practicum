<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserOrdersExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return User::query()
            ->where('type', 'user') // Only include users, not admins
            ->withCount(['orders as completed_orders' => function ($query) {
                $query->where('status', 'completed');
            }])
            ->withSum('orders as total_spent', 'total') // Use the correct column name
            ->withMax('orders as last_order_date', 'created_at')
            ->when(request('date_from'), function ($query) {
                $query->whereHas('orders', function ($q) {
                    $q->whereDate('created_at', '>=', request('date_from'));
                });
            })
            ->when(request('date_to'), function ($query) {
                $query->whereHas('orders', function ($q) {
                    $q->whereDate('created_at', '<=', request('date_to'));
                });
            })
            ->when(request('status') && request('status') != 'all', function ($query) {
                $query->whereHas('orders', function ($q) {
                    $q->where('status', request('status'));
                });
            })
            ->get()
            ->map(function ($user) {
                return [
                    $user->id,
                    $user->username, // or $user->name if that's your column
                    $user->email,
                    $user->completed_orders,
                    $user->total_spent,
                    $user->last_order_date,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Email',
            'Completed Orders',
            'Total Spent ($)',
            'Last Order Date',
        ];
    }
}