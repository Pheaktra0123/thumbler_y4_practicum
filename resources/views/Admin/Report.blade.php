@extends('TailwindCssLink.style')
@extends('Component.Nav_Dashbord')
@section('title', 'Monthly Sales Report')
@section('contents')
<div class="container mx-auto p-8">
    <h1 class="text-2xl font-bold mb-6">Monthly Sales Report</h1>

    <!-- Filter Form -->
    <div class="bg-white p-4 rounded-lg shadow-md mb-6">
        <form action="{{ route('admin.report.monthly') }}" method="GET" class="flex flex-wrap gap-4 items-end">
            <div class="flex-1 min-w-[200px]">
                <label for="year" class="block text-sm font-medium text-gray-700 mb-1">Year</label>
                <select name="year" id="year" class="w-full p-2 border border-gray-300 rounded-md">
                    @foreach(range(date('Y'), date('Y') - 5) as $y)
                    <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>{{ $y }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex-1 min-w-[200px]">
                <label for="month" class="block text-sm font-medium text-gray-700 mb-1">Month</label>
                <select name="month" id="month" class="w-full p-2 border border-gray-300 rounded-md">
                    <option value="">All Months</option>
                    @foreach(range(1, 12) as $m)
                    <option value="{{ $m }}" {{ request('month') == $m ? 'selected' : '' }}>
                        {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                    </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                Filter
            </button>
        </form>
    </div>

    <!-- Export Buttons -->
    <div class="flex gap-4 mb-6">
        <a href="{{ route('admin.report.export', ['year' => request('year'), 'month' => request('month')]) }}"
            class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
            Export Current Filter to Excel
        </a>

        <a href="{{ route('admin.report.export') }}"
            class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
            Export All Data to Excel
        </a>
    </div>

    <!-- Report Table -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Year</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Month</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Sales</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Orders Count</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Average Order Value</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($monthlySales as $row)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $row->year }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ date('F', mktime(0, 0, 0, $row->month, 1)) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">${{ number_format($row->total_sales, 2) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $row->orders_count }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">${{ number_format($row->average_order_value, 2) }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">No sales data found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($monthlySales->hasPages())
    <div class="mt-4">
        {{ $monthlySales->appends(request()->query())->links() }}
    </div>
    @endif
</div>
@endsection