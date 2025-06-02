@extends('Component.header')
@extends('TailwindCssLink.style')
@section('title', 'My Orders')
@section('contents')
<div class="container mx-auto px-4 py-8 mt-16 ">
    <h1 class="text-3xl font-bold mb-8">My Orders</h1>
    @if($orders->isEmpty())
    <div class="bg-white rounded-lg shadow p-6 text-center">
        <p class="text-gray-600">You haven't placed any orders yet.</p>
        <a href="#" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Continue Shopping
        </a>
    </div>
    @else
    <div class="space-y-6">
        @foreach($orders as $order)
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="p-6 border-b">
                <div class="flex justify-between items-start">
                    <div>
                        <h2 class="text-xl font-semibold">Order #{{ $order->id }}</h2>
                        <p class="text-gray-600">Placed on {{ $order->created_at->format('M d, Y') }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-lg font-semibold">${{ number_format($order->total, 2) }}</p>
                        <span class="px-3 py-1 rounded-full text-sm 
                                    @if($order->status === 'processing') bg-blue-100 text-blue-800
                                    @elseif($order->status === 'shipped') bg-purple-100 text-purple-800
                                    @elseif($order->status === 'delivered') bg-green-100 text-green-800
                                    @elseif($order->status === 'cancelled') bg-red-100 text-red-800
                                    @else bg-gray-100 text-gray-800 @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="p-6">
                <h3 class="font-medium mb-2">Items</h3>
                <div class="space-y-4">
                    @foreach($order->items as $item)
                    <div class="flex items-start border-b pb-4">
                        <div class="w-20 h-20 bg-gray-100 rounded-md overflow-hidden mr-4">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1">
                            <h4 class="font-medium">{{ $item->name }}</h4>
                            @if($item->is_customized)
                            <div class="text-sm text-gray-600 mt-1">
                                @if($item->color)
                                <p>Color: <span class="inline-block w-4 h-4 rounded-full" style="background-color: {{ $item->color }};"></span></p>
                                @endif
                                @if($item->engraving)
                                <p>Engraving: {{ $item->engraving }}</p>
                                @endif
                                @if($item->font)
                                <p>Font: {{ $item->font }}</p>
                                @endif
                            </div>
                            @endif
                        </div>
                        <div class="text-right">
                            <p>${{ number_format($item->price, 2) }}</p>
                            <p class="text-gray-600">Qty: {{ $item->quantity }}</p>
                            <p class="font-medium">${{ number_format($item->price * $item->quantity, 2) }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="p-6 bg-gray-50">
                <div class="flex justify-between">
                    <div>
                        <h3 class="font-medium mb-2">Shipping Address</h3>
                        <p class="text-gray-600 whitespace-pre-line">{{ $order->shipping_address }}</p>
                    </div>
                    <div class="text-right">
                        <h3 class="font-medium mb-2">Payment Method</h3>
                        <p class="text-gray-600 capitalize">{{ $order->payment_method }}</p>
                        @if($order->payment_method === 'online' && $order->bank_slip_path)
                        <a href="{{ asset('storage/' . $order->bank_slip_path) }}" target="_blank" class="text-blue-500 hover:underline mt-2 inline-block">
                            View Payment Slip
                        </a>
                        @endif
                    </div>
                </div>
                <div class="mt-6 text-right">
                    <a href="{{ route('orders.show', $order) }}" class="text-blue-500 hover:underline font-medium">
                        View Order Details
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection