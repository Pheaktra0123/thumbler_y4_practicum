@extends('Component.Nav_Dashbord')
@section('title', 'Order Details')
@section('contents')

<body class="bg-gray-50">
    <div class="container mx-auto p-4 md:p-6 animate-fadeIn">
        <!-- Back Button with Smooth Transition -->
        <a href="{{ url()->previous() }}"
            class="inline-flex items-center mb-6 px-4 py-2 bg-white text-gray-700 rounded-lg shadow-sm hover:bg-gray-50 transition-all duration-300 ease-in-out transform hover:-translate-x-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back
        </a>

        @if(isset($order))
        <!-- Main Order Card with Subtle Animation -->
        <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
            <!-- Order Header Section -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 space-y-4 md:space-y-0">
                <div class="space-y-2">
                    <h1 class="text-2xl font-bold text-gray-800">Order #{{ $order->id }}</h1>
                    <p class="text-gray-500">Placed on {{ $order->created_at->format('M d, Y \a\t h:i A') }}</p>
                </div>

                <!-- Status Badge with Pulse Animation -->
                <div class="text-right">
                    <div class="flex items-center justify-end space-x-3">
                        <span class="px-3 py-1 rounded-full text-sm font-medium animate-pulse
                            @if($order->status === 'processing') bg-blue-100 text-blue-800
                            @elseif($order->status === 'shipped') bg-purple-100 text-purple-800
                            @elseif($order->status === 'delivered') bg-green-100 text-green-800
                            @elseif($order->status === 'cancelled') bg-red-100 text-red-800
                            @else bg-gray-100 text-gray-800 @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                        <p class="text-xl font-semibold text-gray-800">${{ number_format($order->total, 2) }}</p>
                    </div>
                    @if($order->tracking_number)
                    <p class="mt-1 text-sm text-gray-500">Tracking: {{ $order->tracking_number }}</p>
                    @endif
                </div>
            </div>

            <!-- User Profile Section -->
            <div class="flex flex-col md:flex-row items-center md:items-start space-y-4 md:space-y-0 md:space-x-6 mb-8 p-4 bg-gray-50 rounded-lg">
                <div class="relative group">
                    <img src="{{ asset($order->user->thumbnail) }}"
                        alt="User Profile"
                        class="w-20 h-20 md:w-24 md:h-24 rounded-full border-2 border-white shadow-md group-hover:border-blue-300 transition-all duration-300">
                    <div class="absolute -bottom-2 -right-2 bg-white p-1 rounded-full shadow">
                        <div class="h-5 w-5 rounded-full @if($order->user->isOnline()) bg-green-400 @else bg-gray-300 @endif"></div>
                    </div>
                </div>
                <div class="text-center md:text-left">
                    <h2 class="text-lg font-semibold text-gray-800">{{ $order->user->username }}</h2>
                    <p class="text-sm text-gray-500">{{ $order->user->email }}</p>
                    <p class="text-xs mt-1 text-gray-400">
                        @if($order->user->isOnline())
                        <span class="flex items-center justify-center md:justify-start">
                            <span class="h-2 w-2 rounded-full bg-green-400 mr-1 animate-pulse"></span>
                            Online now
                        </span>
                        @else
                        @if($order->user->last_activity)
                        Last seen {{ $order->user->last_activity->diffForHumans() }}
                        @else
                        Last seen unknown
                        @endif
                        @endif
                    </p>
                </div>
            </div>

            <!-- Order Items Section -->
            <h2 class="text-xl font-semibold mb-4 pb-2 border-b border-gray-100 text-gray-700">Order Items</h2>
            <div class="space-y-4 mb-8">
                @foreach($order->items as $item)
                <div class="flex flex-col md:flex-row items-start border-b border-gray-100 pb-4 hover:bg-gray-50 transition-colors duration-200 p-2 rounded-lg">
                    <div class="w-full md:w-20 h-20 bg-gray-100 rounded-md overflow-hidden mr-0 md:mr-6 mb-2 md:mb-0 flex-shrink-0">
                        @if(file_exists(public_path('storage/' . $item->image)))
                        <img src="{{ asset('storage/' . $item->image) }}"
                            alt="{{ $item->name }}"
                            class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                        @else
                        <div class="w-full h-full flex items-center justify-center text-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        @endif
                    </div>
                    <div class="flex-1 w-full">
                        <div class="flex flex-col md:flex-row md:justify-between">
                            <div class="mb-2 md:mb-0">
                                <h3 class="font-medium text-gray-800">{{ $item->name }}</h3>
                                @if($item->is_customized)
                                <div class="mt-2 space-y-1 text-sm text-gray-600">
                                    @if($item->color)
                                    <p>Color: <span class="inline-block w-3 h-3 rounded-full mr-1 align-middle" style="background-color: {{ $item->color }};"></span> {{ $item->color }}</p>
                                    @endif
                                    @if($item->engraving)
                                    <p>Engraving: "{{ $item->engraving }}"</p>
                                    @endif
                                    @if($item->font)
                                    <p>Font: {{ $item->font }}</p>
                                    @endif
                                </div>
                                @endif
                            </div>
                            <div class="text-right">
                                <p class="text-gray-800">${{ number_format($item->price, 2) }}</p>
                                <p class="text-gray-500 text-sm">Qty: {{ $item->quantity }}</p>
                                <p class="font-medium text-gray-800">${{ number_format($item->price * $item->quantity, 2) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Shipping and Payment Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Shipping Information -->
                <div class="bg-gray-50 p-4 rounded-lg hover:shadow-sm transition-shadow duration-300">
                    <h3 class="text-lg font-semibold mb-3 flex items-center text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Shipping Information
                    </h3>
                    <div class="mt-2 text-gray-600 whitespace-pre-line">{{ $order->shipping_address }}</div>
                    @if($order->coordinates)
                    <div class="mt-4">
                        <a href="https://www.google.com/maps/search/?api=1&query={{ $order->coordinates }}"
                            target="_blank"
                            class="inline-flex items-center text-blue-500 hover:text-blue-600 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            View on Map
                        </a>
                    </div>
                    @endif
                </div>

                <!-- Payment Information -->
                <div class="bg-gray-50 p-4 rounded-lg hover:shadow-sm transition-shadow duration-300">
                    <h3 class="text-lg font-semibold mb-3 flex items-center text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                        Payment Information
                    </h3>
                    <div class="space-y-3 text-gray-600">
                        <div>
                            <p class="font-medium text-gray-700">Payment Method</p>
                            <p class="capitalize">{{ $order->payment_method }}</p>
                        </div>

                        <div>
                            <p class="font-medium text-gray-700">Phone Number</p>
                            <p>{{ $order->phone_number }}</p>
                        </div>

                        @if($order->payment_method === 'online' && $order->bank_slip_path)
                        <div class="pt-2">
                            <p class="font-medium text-gray-700">Payment Receipt</p>
                            <a href="{{ asset('storage/' . $order->bank_slip_path) }}"
                                target="_blank"
                                class="inline-block mt-2">
                                <img src="{{ asset('storage/' . $order->bank_slip_path) }}"
                                    alt="Payment Receipt"
                                    class="w-24 h-24 object-contain rounded border hover:shadow-md transition-shadow duration-300">
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @else
        <!-- Empty State with Animation -->
        <div class="bg-white p-8 rounded-xl shadow-sm text-center max-w-md mx-auto animate-bounceIn">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h2 class="text-xl font-semibold mt-4 text-gray-600">Order Not Found</h2>
            <p class="text-gray-400 mt-2">The requested order could not be located.</p>
            <a href="{{ route('orders.index') }}"
                class="mt-4 inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors duration-200">
                View All Orders
            </a>
        </div>
        @endif
    </div>

    <!-- Add these CSS animations to your stylesheet -->
    <style>
        .animate-fadeIn {
            animation: fadeIn 0.5s ease-out;
        }

        .animate-bounceIn {
            animation: bounceIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes bounceIn {
            0% {
                opacity: 0;
                transform: scale(0.8);
            }

            50% {
                opacity: 1;
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }
    </style>
</body>
@endsection