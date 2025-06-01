@extends('TailwindCssLink.style')
@extends('Component.Nav_Dashbord')
@section('title', 'Monthly Sales Report')
@section('contents')
<div class="container mx-auto p-8">
    <h1 class="text-2xl font-bold mb-6">Monthly Sales Report</h1>
    <a href="{{ route('admin.report.export') }}" class="mb-4 inline-block px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Export to Excel</a>
    <table class="min-w-full bg-white border rounded-lg overflow-hidden">
        <thead>
            <tr>
                <th class="px-4 py-2 border-b">Year</th>
                <th class="px-4 py-2 border-b">Month</th>
                <th class="px-4 py-2 border-b">Total Sales</th>
                <th class="px-4 py-2 border-b">Orders Count</th>
            </tr>
        </thead>
        <tbody>
            @foreach($monthlySales as $row)
                <tr>
                    <td class="px-4 py-2 border-b">{{ $row->year }}</td>
                    <td class="px-4 py-2 border-b">{{ $row->month }}</td>
                    <td class="px-4 py-2 border-b">${{ number_format($row->total_sales, 2) }}</td>
                    <td class="px-4 py-2 border-b">{{ $row->orders_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

