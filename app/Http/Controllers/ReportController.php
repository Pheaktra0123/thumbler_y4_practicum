<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\UserOrdersExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    // Show user order completion report
    public function userOrders()
    {
        $users = User::query()
            ->where('type', 'user') // <-- Only include users, not admins
            ->withCount(['orders' => function ($query) {
                $query->where('status', 'completed');
            }])
            // In app/Exports/UserOrdersExport.php
            ->withSum('orders as total_spent', 'total')  // Match your column name
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
            ->orderByDesc('orders_count')
            ->paginate(25);

        return view('Admin.Report', compact('users'));
    }
    // Export to Excel
    public function exportUserOrders()
    {
        return Excel::download(new UserOrdersExport, 'user-orders-report.xlsx');
    }
}
