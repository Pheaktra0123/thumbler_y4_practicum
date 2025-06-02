@extends('Component.Nav_Dashbord')
@section('title', 'Order Details')
@section('contents')

<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <a href="{{ url()->previous() }}"
            class="inline-flex items-center mb-4 px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back
        </a>
        @if(isset($order))
        <div class="bg-white p-6 rounded-lg shadow-lg">

            <!-- Order Header -->
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h1 class="text-2xl font-bold">User Order : {{ $order->user->username }}</h1>
                    
                </div>
                <div class="text-right">
                    <img src="{{ asset($order->user->thumbnail) }}" alt="User Profile Picture" class="w-56 h-56 rounded-full border border-gray-200">
                    <p class="mt-2 text-sm text-gray-600">{{ $order->user->email }}</p>
                    
                </div>
            </div>
            <div class="flex justify-between items-start mb-6">
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
                    <p class="mt-1 text-sm">Tracking: {{ $order->tracking_number }}</p>
                </div>
            </div>

            <!-- Order Items -->
            <h2 class="text-xl font-semibold mb-4 border-b pb-2">Order Items</h2>
            <div class="space-y-6 mb-8">
                @foreach($order->items as $item)
                <div class="flex items-start border-b pb-6">
                    <div class="w-24 h-24 bg-gray-100 rounded-md overflow-hidden mr-6">
                        @if(file_exists(public_path('storage/' . $item->image)))
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="w-full h-full object-cover">
                        @else
                        <div class="w-full h-full flex items-center justify-center text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        @endif
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

            <!-- Shipping and Payment Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                <div>
                    <h3 class="text-lg font-semibold mb-2">Shipping Information</h3>
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
                            <p class="font-medium">Payment Receipt</p>
                            <a href="{{ asset('storage/' . $order->bank_slip_path) }}" target="_blank">
                                <img src="{{ asset('storage/' . $order->bank_slip_path) }}" alt="Payment Receipt" class="mt-2 w-32 h-32 object-cover rounded border">
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="bg-white p-6 rounded-lg shadow-lg text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h2 class="text-xl font-semibold mt-4">Order Not Found</h2>
            <p class="text-gray-600 mt-2">We couldn't find the order you're looking for.</p>
        </div>
        @endif
    </div>
</body>
@endsection