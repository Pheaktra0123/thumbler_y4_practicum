<?php
namespace App\Exports;
use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
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
        $query = Order::select(
                DB::raw('YEAR(created_at) as year'),
                DB::raw('MONTH(created_at) as month'),
                DB::raw('SUM(total_amount) as total_sales'),
                DB::raw('COUNT(*) as orders_count')
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