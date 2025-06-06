@extends("TailwindCssLink.style")
@extends("Component.Nav_Dashbord")
@section('title', 'Orders')
@section('contents')
<div class="container mx-auto px-4 py-4">
    <h1 class="text-2xl font-bold mb-6">Order Management</h1>

    <!-- Filter and Search Section -->
    <div class="bg-white rounded-lg shadow p-4 mb-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <!-- Search Form -->
            <form action="{{ route('admin.orders') }}" method="GET" class="flex-1">
                <div class="relative">
                    <input type="text" name="search" placeholder="Search by customer, email, or tracking #"
                        value="{{ request('search') }}"
                        class="w-full pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <div class="absolute left-3 top-2.5 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
            </form>

            <!-- Tumbler Filter -->
            <form action="{{ route('admin.orders') }}" method="GET" class="flex-1">
                <select name="tumbler" onchange="this.form.submit()"
                    class="w-full pl-3 pr-10 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">All Tumblers</option>
                    @foreach($tumblers as $tumbler)
                    <option value="{{ $tumbler->id }}" {{ request('tumbler') == $tumbler->id ? 'selected' : '' }}>
                        {{ $tumbler->name}}
                    </option>
                    @endforeach
                </select>
            </form>

            <!-- Status Filter -->
            <form action="{{ route('admin.orders') }}" method="GET" class="flex-1">
                <select name="status" onchange="this.form.submit()"
                    class="w-full pl-3 pr-10 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">All Statuses</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="processing" {{ request('status') == 'processing' ? 'selected' : '' }}>Processing</option>
                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </form>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Items</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tracking #</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payment</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($orders as $order)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="font-medium">{{ $order->user->username }}</div>
                            <div class="text-sm text-gray-500">{{ $order->user->email }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $order->created_at->format('M d, Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">${{ number_format($order->total, 2) }}</td>
                        <td class="px-6 py-4">
                            @foreach($order->items as $item)
                            <div class="text-sm text-gray-700">
                                {{ $item->tumbler?->name ?? $item->name ?? 'Unknown Tumbler' }} (x{{ $item->quantity }})
                            </div>
                            @endforeach
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $order->tracking_number ? $order->tracking_number : 'N/A' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs rounded-full {{ $order->payment_method === 'online' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                                {{ ucfirst($order->payment_method) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs rounded-full {{ $order->status === 'completed' ? 'bg-green-100 text-green-800' : ($order->status === 'cancelled' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('admin.orders.details',$order->id) }}" class="text-blue-600 hover:text-blue-900 mr-3">View</a>
                            @if($order->status !== 'completed' && $order->status !== 'cancelled')
                            <form action="{{ route('admin.orders.confirm', $order->id) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="text-green-600 hover:text-green-900 mr-3">Confirm</button>
                            </form>
                            <form action="{{ route('admin.orders.reject', $order->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to reject this order?')">Reject</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="px-6">
    {{ $orders->appends(request()->query())->links('vendor.pagination.custom') }}
</div>
@endsection