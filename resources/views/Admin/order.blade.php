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
        <div class="max-w-5xl mx-auto bg-white rounded-xl shadow p-6">
            <h1 class="text-2xl font-bold mb-6">User Orders</h1>
            <table class="min-w-full bg-white border rounded-lg overflow-hidden">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b text-left">#</th>
                        <th class="px-4 py-2 border-b text-left">User Name</th>
                        <th class="px-4 py-2 border-b text-left">Email</th>
                        <th class="px-4 py-2 border-b text-left">Order Date</th>
                        <th class="px-4 py-2 border-b text-left">Total</th>
                        <th class="px-4 py-2 border-b text-left">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border-b">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 border-b">{{ $order->user->name ?? 'N/A' }}</td>
                            <td class="px-4 py-2 border-b">{{ $order->user->email ?? 'N/A' }}</td>
                            <td class="px-4 py-2 border-b">{{ $order->created_at->format('Y-m-d') }}</td>
                            <td class="px-4 py-2 border-b">${{ number_format($order->total, 2) }}</td>
                            <td class="px-4 py-2 border-b">
                                <span class="px-2 py-1 rounded text-xs {{ $order->status == 'completed' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-6 text-gray-500">No orders found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>
@endsection