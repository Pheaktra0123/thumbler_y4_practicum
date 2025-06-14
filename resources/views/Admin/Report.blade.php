@extends('TailwindCssLink.style')
@extends('Component.Nav_Dashbord')
@section('title', 'User Order Completion Report')
@section('contents')
<div class="container mx-auto p-8">
    <h1 class="text-2xl font-bold mb-6">User Order Completion Report</h1>

    <!-- Back to User Orders Report Link -->

    <!-- Filter Form -->
    <div class="bg-white p-4 rounded-lg shadow-md mb-6">
        <form action="{{ route('admin.report.user-orders') }}" method="GET" class="flex flex-wrap gap-4 items-end">
            <div class="flex-1 min-w-[200px]">
                <label for="date_from" class="block text-sm font-medium text-gray-700 mb-1">From Date</label>
                <input type="date" name="date_from" id="date_from" value="{{ request('date_from') }}"
                    class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <div class="flex-1 min-w-[200px]">
                <label for="date_to" class="block text-sm font-medium text-gray-700 mb-1">To Date</label>
                <input type="date" name="date_to" id="date_to" value="{{ request('date_to') }}"
                    class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <div class="flex-1 min-w-[200px]">
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Order Status</label>
                <select name="status" id="status" class="w-full p-2 border border-gray-300 rounded-md">
                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="processing" {{ request('status') == 'processing' ? 'selected' : '' }}>Processing</option>
                    <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>All Statuses</option>
                </select>
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                Filter
            </button>
        </form>
    </div>

    <!-- Export Buttons -->
    <div class="flex gap-4 mb-6">
        <a href="{{ route('admin.report.export-user-orders', request()->query()) }}"
            class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
            Export Current Filter to Excel
        </a>

        <a href="{{ route('admin.report.export-user-orders') }}"
            class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
            Export All Data to Excel
        </a>
    </div>

    <!-- Report Table -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Completed Orders</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Spent</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last Order Date</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($users as $user)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->orders_count }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">${{ number_format($user->total_spent, 2) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $user->last_order_date ? \Illuminate\Support\Carbon::parse($user->last_order_date)->format('Y-m-d') : 'N/A' }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">No users with completed orders found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($users->hasPages())
    <div class="mt-4">
        {{ $users->appends(request()->query())->links() }}
    </div>
    @endif
</div>
@endsection