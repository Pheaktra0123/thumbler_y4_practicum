<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class MonthlySalesExport implements FromCollection, WithHeadings
{
    protected $year;
    protected $month;

    public function __construct($year = null, $month = null)
    {
        $this->year = $year;
        $this->month = $month;
    }

    public function collection()
    {
        $query = DB::table('orders')
            ->select(
                DB::raw('YEAR(created_at) as year'),
                DB::raw('MONTH(created_at) as month'),
                DB::raw('SUM(total) as total_sales'),
                DB::raw('COUNT(*) as orders_count'),
                DB::raw('SUM(total) / COUNT(*) as average_order_value')
            )
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc');

        if ($this->year) {
            $query->whereYear('created_at', $this->year);
        }

        if ($this->month) {
            $query->whereMonth('created_at', $this->month);
        }

        return $query->get();
    }

    public function headings(): array
    {
        return [
            'Year',
            'Month',
            'Total Sales',
            'Orders Count',
            'Average Order Value'
        ];
    }
}
