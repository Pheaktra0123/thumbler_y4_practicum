@extends("TailwindCssLink.style")
@extends("Component.Nav_Dashbord")
@section('title', 'Orders')
@section('contents')
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">
</head>

<body>
    <main class="p-8 bg-gray-100 min-h-screen">
        <div class="bg-white rounded-xl shadow p-6">
            <h1 class="text-2xl font-bold mb-6">User Orders</h1>
            <table class=" border rounded-lg overflow-hidden">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b text-left">#</th>
                        <th class="px-4 py-2 border-b text-left">User Name</th>
                        <th class="px-4 py-2 border-b text-left">Email</th>
                        <th class="px-4 py-2 border-b text-left">Order Date</th>
                        <th class="px-4 py-2 border-b text-left">Total</th>
                        <th class="px-4 py-2 border-b text-left">Tracking #</th>
                        <th class="px-4 py-2 border-b text-left">Shipping Address</th>
                        <th class="px-4 py-2 border-b text-left">Payment Method</th>
                        <th class="px-4 py-2 border-b text-left">Phone</th>
                        <th class="px-4 py-2 border-b text-left">Engraving</th>
                        <th class="px-4 py-2 border-b text-left">Color</th>
                        <th class="px-4 py-2 border-b text-left">Qty</th>
                        <th class="px-4 py-2 border-b text-left">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr >
                            <td class="px-4 py-2 border-b">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 border-b">{{ $order->user->username ?? 'N/A' }}</td>
                            <td class="px-4 py-2 border-b">{{ $order->user->email ?? 'N/A' }}</td>
                            <td class="px-4 py-2 border-b">{{ $order->created_at->format('Y-m-d') }}</td>
                            <td class="px-4 py-2 border-b">${{ number_format($order->total, 2) }}</td>
                            <td class="px-4 py-2 border-b">{{ $order->tracking_number ?? '-' }}</td>
                            <td class="px-4 py-2 border-b">{{ $order->shipping_address ?? '-' }}</td>
                            <td class="px-4 py-2 border-b">{{ $order->payment_method ?? '-' }}</td>
                            <td class="px-4 py-2 border-b">{{ $order->phone_number ?? '-' }}</td>
                            <td class="px-4 py-2 border-b">{{ $order->engraving ?? '-' }}</td>
                            <td class="px-4 py-2 border-b">{{ $order->color ?? '-' }}</td>
                            <td class="px-4 py-2 border-b">{{ $order->quantity ?? '-' }}</td>
                            <td class="px-4 py-2 border-b">
                                <span class="px-2 py-1 rounded text-xs {{ $order->status == 'completed' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                                @if($order->status !== 'completed')
                                <form action="{{ route('admin.orders.confirm', $order->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="ml-2 px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-xs">
                                        Confirm
                                    </button>
                                </form>
                                <form action="{{ route('admin.orders.reject', $order->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to reject and delete this order?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="ml-2 px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-xs">
                                        Reject
                                    </button>
                                </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="13" class="text-center py-6 text-gray-500">No orders found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>
@endsection