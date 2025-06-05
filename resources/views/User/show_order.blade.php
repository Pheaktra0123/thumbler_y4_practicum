@extends('Component.header')
@extends('TailwindCssLink.style')
@section('title', 'My Orders')

@section('contents')
<div class="container mx-auto px-4 py-8 mt-16">
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="p-6 border-b">
            <div class="flex justify-between items-start">
                <div>
                    <h1 class="text-2xl font-bold">Order #{{ $order->id }}</h1>
                    <p class="text-gray-600">Placed on {{ $order->created_at->format('M d, Y \a\t h:i A') }}</p>
                </div>
                <div class="text-right">
                    <p class="text-xl font-semibold">${{ number_format($order->total, 2) }}</p>
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
            <h2 class="text-xl font-semibold mb-4">Order Summary</h2>
            <div class="space-y-6">
                @foreach($order->items as $item)
                <div class="flex items-start border-b pb-6">
                    <div class="w-24 h-24 bg-gray-100 rounded-md overflow-hidden mr-6">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1">
                        <h3 class="font-medium text-lg">{{ $item->name }}</h3>
                        @if($item->is_customized)
                        <div class="mt-2 space-y-1">
                            @if($item->color)
                            <p class="text-sm">Color: <span class="inline-block w-4 h-4 rounded-full" style="background-color: {{ $item->color }};"></span> {{ $item->color }}</p>
                            @endif
                            @if($item->engraving)
                            <p class="text-sm">Engraving: {{ $item->engraving }}</p>
                            @endif
                            @if($item->font)
                            <p class="text-sm">Font: {{ $item->font }}</p>
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

            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-2">Shipping Address</h3>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="whitespace-pre-line">{{ $order->shipping_address }}</p>
                        @if($order->coordinates)
                        <div class="mt-4">
                            <a href="https://www.google.com/maps/search/?api=1&query={{ $order->coordinates }}"
                                target="_blank"
                                class="text-blue-500 hover:underline flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                View on Map
                            </a>
                        </div>
                        @endif
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-2">Payment Information</h3>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <div class="mb-4">
                            <p class="font-medium">Payment Method</p>
                            <p class="capitalize">{{ $order->payment_method }}</p>
                        </div>

                        <div class="mb-4">
                            <p class="font-medium">Phone Number</p>
                            <p>{{ $order->phone_number }}</p>
                        </div>

                        @if($order->payment_method === 'online' && $order->bank_slip_path)
                        <div>
                            <p class="font-medium">Payment Slip</p>
                            <a href="{{ asset('storage/' . $order->bank_slip_path) }}" target="_blank">
                                <img src="{{ asset('storage/' . $order->bank_slip_path) }}" alt="Payment Slip" class="mt-2 w-32 h-32 object-cover rounded border">
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="p-6 bg-gray-50 border-t">
            <div class="flex justify-between items-center">
                <a href="#" class="text-blue-500 hover:underline">
                    &larr; Back to Orders
                </a>
                @if($order->status === 'pending' || $order->status === 'processing')
                <form id="cancel-order-form" action="{{ route('orders.cancel', $order) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="cancel_note" id="cancel_note_input">
                    <button type="button" id="cancel-order-btn" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                        Cancel Order
                    </button>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cancelBtn = document.getElementById('cancel-order-btn');
        if (cancelBtn) {
            cancelBtn.addEventListener('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Cancel Order',
                    text: 'You can provide a reason for cancellation (optional):',
                    input: 'textarea',
                    inputPlaceholder: 'Enter your reason here (optional)...',
                    showCancelButton: true,
                    confirmButtonText: 'Submit',
                    cancelButtonText: 'Close',
                    inputAttributes: {
                        'aria-label': 'Reason for cancellation'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('cancel_note_input').value = result.value || '';
                        document.getElementById('cancel-order-form').submit();
                    }
                });
            });
        }
    });
</script>
@endsection