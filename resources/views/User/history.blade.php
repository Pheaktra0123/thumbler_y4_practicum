@extends('Component.header')
@extends('TailwindCssLink.style')
@section('title', 'My Orders')
@section('contents')
<div class="container mx-auto px-4 py-8 mt-16 ">
    <div class="flex justify-between items-center mb-2">

        <h1 class="text-3xl font-bold mb-8">My Orders</h1>
        <form id="clear-history-form" action="{{ route('orders.clear') }}" method="post" class="inline-block">
            @csrf
            @method('POST')
            <button type="button" id="clear-history-btn" class="bg-gray-200 text-red-600 px-4 py-2 rounded-full hover:bg-gray-300 mb-4 text-sm">
                clear
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-4 h-4 inline-block ml-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                </svg>

            </button>
        </form>
    </div>
    @if($orders->isEmpty())
    <div class="bg-white rounded-lg shadow p-6 text-center">
        <p class="text-gray-600">You haven't placed any orders yet.</p>
        <a href="#" class="mt-4 border border-1 text-sm inline-block  text-gray-600 px-4 py-2 rounded-full hover:bg-gray-200">
            Continue Shopping
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 w-5 h-5 inline-block ml-1">
                <path fill-rule="evenodd" d="M16.72 7.72a.75.75 0 0 1 1.06 0l3.75 3.75a.75.75 0 0 1 0 1.06l-3.75 3.75a.75.75 0 1 1-1.06-1.06l2.47-2.47H3a.75.75 0 0 1 0-1.5h16.19l-2.47-2.47a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>

        </a>
    </div>
    @else
    <div class="space-y-6">
        @foreach($orders as $order)
        @if (!$order->hidden_for_user)
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="p-6 border-b">
                <div class="flex justify-between items-start">
                    <div>
                        <h2 class="text-xl font-semibold">Order #{{ $order->id }}</h2>
                        <p class="text-gray-600">Placed on {{ $order->created_at->format('M d, Y') }}</p>
                    </div>
                    <form class="delete-order-form" action="{{ route('orders.delete', $order->id) }}" method="post" style="display:inline;">
                        @csrf
                        @method('POST')
                        <button type="button" class="text-red-500 hover:text-red-700 focus:outline-none delete-order-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-5 h-5 inline-block ml-1 text-red-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

            <div class="p-6">
                <div class="text-right ">
                    <span class="px-3 py-1 rounded-full text-sm 
                                    @if($order->status === 'processing') bg-blue-100 text-blue-800
                                    @elseif($order->status === 'shipped') bg-purple-100 text-purple-800
                                    @elseif($order->status === 'delivered') bg-green-100 text-green-800
                                    @elseif($order->status === 'cancelled') bg-red-100 text-red-800
                                    @else bg-gray-100 text-gray-800 @endif">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>
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
        @endif

        @endforeach
    </div>
    @endif
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const clearBtn = document.getElementById('clear-history-btn');
        if (clearBtn) {
            clearBtn.addEventListener('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Clear Order History?',
                    text: "Are you sure you want to clear your order history? This action cannot be undone.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, clear it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('clear-history-form').submit();
                    }
                });
            });
        }

        document.querySelectorAll('.delete-order-btn').forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const form = btn.closest('.delete-order-form');
                Swal.fire({
                    title: 'Delete this order?',
                    text: "Are you sure you want to delete this order from your history?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
@endsection