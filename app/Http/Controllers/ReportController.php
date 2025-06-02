<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MonthlySalesExport;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    //
    // In your ReportController


public function monthly(Request $request)
{
    $year = $request->input('year', date('Y'));
    $month = $request->input('month');
    
    $query = Order::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(total) as total_sales'), // <-- change here
            DB::raw('COUNT(*) as orders_count')
        )
        ->whereYear('created_at', $year)
        ->groupBy('year', 'month')
        ->orderBy('year', 'desc')
        ->orderBy('month', 'desc');
    
    if ($month) {
        $query->whereMonth('created_at', $month);
    }
    
    $monthlySales = $query->paginate(12);
    
    return view('Admin.Report', compact('monthlySales'));
}

public function export(Request $request)
{
    $year = $request->input('year');
    $month = $request->input('month');
    
    return Excel::download(new MonthlySalesExport($year, $month), 'monthly-sales-report.xlsx');
}
public function index()
{
    // Fetch monthly sales data
    $monthlySales = Order::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(total) as total_sales, COUNT(*) as orders_count')
        ->groupBy('year', 'month')
        ->orderBy('year', 'desc')
        ->orderBy('month', 'desc')
        ->paginate(12);
    
    return view('Admin.Report', compact('monthlySales'));
}
}
