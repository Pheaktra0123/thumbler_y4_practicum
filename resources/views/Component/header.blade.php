<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Optimized CSS and JS imports -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js" defer></script> -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" type="image/png" href="{{ asset('Asset 1.png') }}">
    <style>
        /* Custom animations */
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

        @keyframes slideIn {
            from {
                transform: translateX(100%);
            }

            to {
                transform: translateX(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.3s ease-out forwards;
        }

        .animate-slide-in {
            animation: slideIn 0.3s ease-out forwards;
        }

        /* Button hover effects */
        .btn-hover {
            transition: all 0.3s ease;
            transform: translateY(0);
        }

        .btn-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Nav link animation */
        .nav-link {
            position: relative;
            transition: color 0.3s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: #4f46e5;
            transition: width 0.3s ease;
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }

        .nav-link.active {
            color: #4f46e5;
            font-weight: 600;
        }

        /* Loading spinner */
        .loader {
            border: 4px solid rgba(243, 243, 243, 0.8);
            border-top: 4px solid #4f46e5;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Page transition */
        .page-transition {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(255, 255, 255, 0.9);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }

        .page-transition.active {
            opacity: 1;
            pointer-events: all;
        }

        /* Card hover effect */
        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-gray-50 font-sans antialiased" x-data="{ openMobileMenu: false }">
    <!-- Page Transition Overlay -->
    <div id="pageTransition" class="page-transition">
        <div class="loader"></div>
    </div>
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white/90 backdrop-blur-md shadow-sm transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="/" class="flex items-center text-indigo-600 font-bold text-xl">
                        <svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.11 155.44" class="size-8  mr-2 ">
                            <style>
                                .cls-1 {
                                    fill: #4f46e5;
                                }
                            </style>
                            <g id="Objects">
                                <path class="cls-1" d="m118,27.22l-2.57-12.6c-.18-.87-.93-1.5-1.82-1.52-8.04-.16-46.15-.3-72.52-.38L37.01,0l-6.72,2.15,3.37,10.55c-7.39-.02-13.23-.04-16.25-.04-1.32,0-2.46.92-2.73,2.21l-2.56,12.35H0v11.88h7.96l20.01,116.34h74.16l20.01-116.34h7.96v-11.88h-12.11Zm-84.08,121.16l-4.81-27.97h71.88l-4.81,27.97h-62.26Zm9.3-56.42c0-11.81,9.58-21.39,21.39-21.39s21.39,9.58,21.39,21.39-9.58,21.39-21.39,21.39-21.39-9.58-21.39-21.39Zm67.43-27.65H19.46l-3.74-21.77h98.67l-3.74,21.77Z" />
                            </g>
                        </svg>
                        TUMBLER HAVEN
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <div class="flex space-x-6">
                        <a href="/" class="nav-link text-gray-700 hover:text-indigo-600 px-1 py-2 text-sm font-medium">Home</a>
                        <a href="/Categories_home" class="nav-link text-gray-700 hover:text-indigo-600 px-1 py-2 text-sm font-medium">Categories</a>
                        <a href="/Model_home" class="nav-link text-gray-700 hover:text-indigo-600 px-1 py-2 text-sm font-medium">Models</a>
                        <a href="{{ route('trending.tumblers') }}" class="nav-link text-gray-700 hover:text-indigo-600 px-1 py-2 text-sm font-medium">Trending</a>
                        <a href="#about-us" class="nav-link text-gray-700 hover:text-indigo-600 px-1 py-2 text-sm font-medium">About</a>
                    </div>

                    <div class="flex items-center space-x-4 ml-6">
                        <button onclick="showLocationPopup()" class="flex items-center text-gray-600 hover:text-indigo-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm">Location</span>
                        </button>

                        <a href="{{ route('customized.tumblers') }}" class="flex items-center text-gray-600 hover:text-indigo-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm">Customize</span>
                        </a>
                    </div>
                </div>

                <!-- Right side icons -->
                <div class="flex items-center space-x-4">
                    <!-- Cart -->
                    <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <a href="{{ route('user.viewCart') }}" class="p-1 text-gray-600 hover:text-indigo-600 rounded-full transition-colors relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                            </svg>
                            <span class="absolute top-4 -right-6 bg-indigo-600 text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center">
                                {{ $cartCount ?? 0 }}
                            </span>
                        </a>

                        <!-- Cart Dropdown -->
                        <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-1"
                            class="absolute right-0 mt-2 w-72 bg-white rounded-md shadow-lg overflow-hidden z-50">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-800 border-b pb-2">Your Cart</h3>
                                @if(count($cartItems) > 0)
                                <div class="max-h-60 overflow-y-auto py-2">
                                    @foreach($cartItems as $item)
                                    <div class="flex items-center py-3 border-b last:border-b-0">
                                        <img src="{{ $item['image'] ? asset('storage/' . $item['image']) : asset('images/default-placeholder.png') }}"
                                            alt="{{ $item['name'] }}"
                                            class="w-12 h-12 object-cover rounded-md border">
                                        <div class="ml-3 flex-1">
                                            <h4 class="text-sm font-medium text-gray-800">{{ $item['name'] }}</h4>
                                            <div class="flex justify-between items-center mt-1">
                                                <span class="text-xs text-gray-500">Qty: {{ $item['quantity'] }}</span>
                                                <span class="text-xs font-semibold">${{ number_format($item['price'], 2) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="mt-3 pt-3 border-t">
                                    <div class="flex justify-between items-center">
                                        <span class="font-medium text-gray-700">Total:</span>
                                        <span class="font-bold text-indigo-600">
                                            ${{ number_format(array_sum(array_map(fn($i) => $i['price'] * $i['quantity'], $cartItems)), 2) }}
                                        </span>
                                    </div>
                                    <a href="{{ route('user.viewCart') }}"
                                        class="block mt-3 w-full text-center bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700 transition-colors btn-hover">
                                        View Cart
                                    </a>
                                </div>
                                @else
                                <div class="py-6 text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    <p class="mt-2 text-gray-500">Your cart is empty</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- User Profile -->
                    <div class="relative ml-3" x-data="{ open: false }">
                        <button @click="open = !open" type="button" class="flex text-sm rounded-full focus:outline-none" id="user-menu-button">
                            @if (auth()->check() && auth()->user()->thumbnail)
                            <img class="h-8 w-8 rounded-full border-2 border-gray-200"
                                src="{{ auth()->user()->thumbnail ? asset(auth()->user()->thumbnail) : 'https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=320&amp;h=320&amp;q=80' }}"
                                alt="Profile Image">
                            @else
                            <div class="h-8 w-8 rounded-full bg-gray-100 flex items-center justify-center border-2 border-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            @endif
                        </button>

                        <!-- Profile Dropdown -->
                        <div x-show="open" x-cloak @click.away="open = false"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50">
                            @if(Route::has('login'))
                            @auth()
                            <div class="px-4 py-2 border-b">
                                <p class="text-sm font-medium text-gray-900">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-gray-500 truncate">{{ auth()->user()->email }}</p>
                            </div>
                            <a href="/User/Dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                            <a href="/logout" @click.prevent="confirmLogout()" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center">
                                <span class="text-red-500">Sign out</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            @else
                            <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign in</a>
                            @endauth
                            @endif
                        </div>
                    </div>

                    <!-- Mobile menu button -->
                    <div class="md:hidden">
                        <button @click="openMobileMenu = !openMobileMenu" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-600 hover:text-gray-900 focus:outline-none">
                            <svg x-show="!openMobileMenu" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <svg x-show="openMobileMenu" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div x-show="openMobileMenu" x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            class="md:hidden bg-white shadow-lg">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="/" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-indigo-600 hover:bg-gray-50">Home</a>
                <a href="/Categories_home" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-indigo-600 hover:bg-gray-50">Categories</a>
                <a href="/Model_home" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-indigo-600 hover:bg-gray-50">Models</a>
                <a href="{{ route('trending.tumblers') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-indigo-600 hover:bg-gray-50">Trending</a>
                <a href="#about-us" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-indigo-600 hover:bg-gray-50">About</a>

                <div class="pt-4 pb-3 border-t border-gray-200">
                    <div class="flex items-center px-5 space-x-3">
                        <button onclick="showLocationPopup()" class="flex items-center text-gray-600 hover:text-indigo-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                            </svg>
                            <span>Location</span>
                        </button>
                    </div>
                    <div class="flex items-center px-5 mt-3 space-x-3">
                        <a href="{{ route('customized.tumblers') }}" class="flex items-center text-gray-600 hover:text-indigo-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                            </svg>
                            <span>Customize</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-16">
        <div class="animate-fade-in">
            @yield('contents')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white mt-12 border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- About Section -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-gray-900">Tumbler Haven</h3>
                    <p class="text-gray-600 text-sm">
                        We're dedicated to making tumbler shopping simple, fun, and fully digital. Our platform allows customers to easily personalize their tumblers in real time.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-500 hover:text-indigo-600 transition-colors">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-indigo-600 transition-colors">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-indigo-600 transition-colors">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900 uppercase tracking-wider">Shop</h3>
                        <ul class="mt-4 space-y-2">
                            <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600 transition-colors">All Products</a></li>
                            <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600 transition-colors">New Arrivals</a></li>
                            <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600 transition-colors">Best Sellers</a></li>
                            <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600 transition-colors">Custom Designs</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900 uppercase tracking-wider">Support</h3>
                        <ul class="mt-4 space-y-2">
                            <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600 transition-colors">Contact Us</a></li>
                            <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600 transition-colors">FAQs</a></li>
                            <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600 transition-colors">Shipping Policy</a></li>
                            <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600 transition-colors">Returns & Exchanges</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Newsletter -->
                <div>
                    <h3 class="text-sm font-semibold text-gray-900 uppercase tracking-wider">Subscribe to our newsletter</h3>
                    <p class="mt-4 text-sm text-gray-600">The latest news, articles, and resources, sent to your inbox weekly.</p>
                    <form class="mt-4 sm:flex sm:max-w-md">
                        <label for="email-address" class="sr-only">Email address</label>
                        <input type="email" name="email-address" id="email-address" autocomplete="email" required class="w-full min-w-0 appearance-none rounded-md border border-gray-300 bg-white px-4 py-2 text-base text-gray-900 placeholder-gray-500 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500" placeholder="Enter your email">
                        <div class="mt-3 rounded-md sm:mt-0 sm:ml-3 sm:flex-shrink-0">
                            <button type="submit" class="flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Copyright -->
            <div class="mt-8 border-t border-gray-200 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-sm text-gray-500">© 2025 Tumbler Haven. All rights reserved.</p>
                <div class="mt-4 md:mt-0 flex space-x-6">
                    <a href="#" class="text-sm text-gray-500 hover:text-gray-700">Privacy Policy</a>
                    <a href="#" class="text-sm text-gray-500 hover:text-gray-700">Terms of Service</a>
                    <a href="#" class="text-sm text-gray-500 hover:text-gray-700">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Initialize Alpine.js for mobile menu
        document.addEventListener('alpine:init', () => {
            Alpine.data('main', () => ({
                openMobileMenu: false,
                confirmLogout() {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You will be logged out!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#4f46e5',
                        cancelButtonColor: '#d1d5db',
                        confirmButtonText: 'Yes, log out!',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Show loading before logout
                            const transitionOverlay = document.getElementById('pageTransition');
                            transitionOverlay.classList.add('active');

                            setTimeout(() => {
                                window.location.href = "/logout";
                            }, 300);
                        }
                    });
                }
            }));
        });

        // Show location popup
        function showLocationPopup() {
            Swal.fire({
                title: 'Our Store Location',
                html: `
                    <div class="text-left">
                        <div class="mb-2 font-semibold text-gray-800">Tumbler Haven Store</div>
                        <div class="mb-4 text-gray-600 text-sm">Royal University of Phnom Penh</div>
                        <div style="width:100%;border-radius:8px;overflow:hidden;">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3908.7652965627717!2d104.88816677481728!3d11.56867598863239!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3109519fe4077d69%3A0x20138e822e434660!2sRoyal%20University%20of%20Phnom%20Penh!5e0!3m2!1sen!2skh!4v1748585371174!5m2!1sen!2skh"
                                width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                `,
                width: 600,
                showCloseButton: true,
                showConfirmButton: false,
                background: '#ffffff',
                padding: '1.5rem',
                borderRadius: '0.5rem'
            });
        }

        // Set active nav link based on current URL
        document.addEventListener("DOMContentLoaded", function() {
            const currentUrl = window.location.pathname;
            const navLinks = document.querySelectorAll('.nav-link');

            navLinks.forEach(link => {
                if (link.getAttribute('href') === currentUrl) {
                    link.classList.add('active');
                }
            });

            // Add smooth scrolling to all links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();

                    const targetId = this.getAttribute('href');
                    const targetElement = document.querySelector(targetId);

                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 80,
                            behavior: 'smooth'
                        });
                    }
                });
            });

            // Improved page transition handling
            const transitionOverlay = document.getElementById('pageTransition');
            let isTransitioning = false;

            // Function to handle page transitions
            function handlePageTransition(href) {
                if (isTransitioning) return;
                isTransitioning = true;

                transitionOverlay.classList.add('active');

                setTimeout(() => {
                    window.location.href = href;
                }, 300);
            }

            // Handle regular link clicks
            document.querySelectorAll('a[href]:not([href^="#"]):not([onclick])').forEach(link => {
                link.addEventListener('click', function(e) {
                    // Don't intercept if it's an external link or has a target
                    if (this.target || this.href.startsWith('javascript:') ||
                        this.href.startsWith('mailto:') || this.href.startsWith('tel:')) {
                        return;
                    }

                    e.preventDefault();
                    handlePageTransition(this.href);
                });
            });

            // Handle browser navigation (back/forward buttons)
            window.addEventListener('pageshow', function(event) {
                // Hide loading overlay if it's still visible
                transitionOverlay.classList.remove('active');
                isTransitioning = false;

                // Check if page is loaded from cache (bfcache)
                if (event.persisted) {
                    // Hide any remaining loading indicators
                    transitionOverlay.classList.remove('active');
                }
            });

            // Handle page load start
            window.addEventListener('beforeunload', function() {
                if (!isTransitioning) {
                    transitionOverlay.classList.add('active');
                }
            });

            // Handle page load completion
            window.addEventListener('load', function() {
                transitionOverlay.classList.remove('active');
                isTransitioning = false;
            });

            // Fallback: Hide loading overlay after 5 seconds if still visible
            setTimeout(() => {
                transitionOverlay.classList.remove('active');
                isTransitioning = false;
            }, 5000);
        });
    </script>
</body>

</html>