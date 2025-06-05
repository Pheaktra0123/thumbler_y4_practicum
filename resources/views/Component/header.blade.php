@section('title','Home')
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        function toggleMenu() {
            const menu = document.getElementById("menu");
            menu.classList.toggle("hidden");
        }
    </script>
    <style>
        .swal2-confirm {
            background-color: #f53636 !important;
            /* Red color */
            color: #fff !important;
            /* White text */
        }

        .swal2-cancel {
            background-color: #d5d5d5 !important;
            /* Gray color */
            color: #000 !important;
            /* Black text */
        }
    </style>
</head>

<body class="bg-gray-100">
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white/50 bg-opacity-90 backdrop-blur-md">
        <div class="max-w-9xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <div class="flex-shrink-0">
                    <a href="/" class="text-gray-800 font-bold text-2xl">
                        TUMBLER HAVEN
                    </a>
                </div>
                <div class="hidden md:block text-gray-700">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="/" class="text-lg font-semibold text-gray-700 hover:underline hover:underline-offset-8 hover:transition hover:deration-700 hover:ease-in-out  px-3 py-2 rounded-md transition-colors duration-300">Home</a>
                        <a href="/Categories_home" class="text-lg font-semibold text-gray-700 hover:underline hover:underline-offset-8 hover:transition hover:deration-700 hover:ease-in-out  px-3 py-2 rounded-md transition-colors duration-300">Category</a>
                        <a href="/Model_home" class="text-lg font-medium text-gray-700 hover:underline hover:underline-offset-8 hover:transition hover:deration-700 hover:ease-in-out  px-3 py-2 rounded-md transition-colors duration-300">Model</a>
                        <a href="{{ route('trending.tumblers') }}" class="text-lg font-semibold text-gray-700 hover:underline hover:underline-offset-8 hover:transition hover:deration-700 hover:ease-in-out  px-3 py-2 rounded-md transition-colors duration-300">New Trending</a>
                        <a href="#about-us" class="text-lg font-semibold text-gray-700 hover:underline hover:underline-offset-8 hover:transition hover:deration-700 hover:ease-in-out  px-3 py-2 rounded-md transition-colors duration-300">About Us</a>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center justify-center md:ml-6 gap-1 text-gray-700">
                        <div class="relative flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                                <path fill-rule="evenodd" d="m9.69 18.933.003.001C9.89 19.02 10 19 10 19s.11.02.308-.066l.002-.001.006-.003.018-.008a5.741 5.741 0 0 0 .281-.14c.186-.096.446-.24.757-.433.62-.384 1.445-.966 2.274-1.765C15.302 14.988 17 12.493 17 9A7 7 0 1 0 3 9c0 3.492 1.698 5.988 3.355 7.584a13.731 13.731 0 0 0 2.273 1.765 11.842 11.842 0 0 0 .976.544l.062.029.018.008.006.003ZM10 11.25a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5Z" clip-rule="evenodd" />
                            </svg>

                            <a href="#" onclick="showLocationPopup(); return false;" class="text-md font-normal text-gray-900 hover:text-gray-600 px-2 py-2 rounded-md transition-colors duration-300">Location</a>
                        </div>
                        <div class="relative flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                                <path d="M15.993 1.385a1.87 1.87 0 0 1 2.623 2.622l-4.03 5.27a12.749 12.749 0 0 1-4.237 3.562 4.508 4.508 0 0 0-3.188-3.188 12.75 12.75 0 0 1 3.562-4.236l5.27-4.03ZM6 11a3 3 0 0 0-3 3 .5.5 0 0 1-.72.45.75.75 0 0 0-1.035.931A4.001 4.001 0 0 0 9 14.004V14a3.01 3.01 0 0 0-1.66-2.685A2.99 2.99 0 0 0 6 11Z" />
                            </svg>

                            <a href="{{ route('customized.tumblers') }}" class="text-md font-normal text-gray-900 hover:text-gray-600 px-2 py-2 rounded-md transition-colors duration-300">Customized</a>
                        </div>
                    </div>
                </div>
                <div class="block content-center justify-center place-content-center">
                    <div class="flex items-center justify-center md:ml-6 gap-1 text-gray-700">
                        <div id="cartIcon" class="relative flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-6 w-6 h-6">
                                <path fill-rule="evenodd" d="M6 5v1H4.667a1.75 1.75 0 0 0-1.743 1.598l-.826 9.5A1.75 1.75 0 0 0 3.84 19H16.16a1.75 1.75 0 0 0 1.743-1.902l-.826-9.5A1.75 1.75 0 0 0 15.333 6H14V5a4 4 0 0 0-8 0Zm4-2.5A2.5 2.5 0 0 0 7.5 5v1h5V5A2.5 2.5 0 0 0 10 2.5ZM7.5 10a2.5 2.5 0 0 0 5 0V8.75a.75.75 0 0 1 1.5 0V10a4 4 0 0 1-8 0V8.75a.75.75 0 0 1 1.5 0V10Z" clip-rule="evenodd" />
                            </svg>

                            <span
                                class="cart-badge w-4 h-4 md:w-5 md:h-5 bg-red-500 text-white text-xs font-semibold rounded-full text-center content-items-center place-content-center absolute -top-1 md:-top-2 right-0 md:right-8">
                                {{ $cartCount ?? 0 }}
                            </span>
                            <a
                                href="{{route('user.viewCart')}}"
                                class="hidden md:block ml-2 text-md font-normal text-gray-900 hover:text-gray-600 transition-colors duration-300">
                                Cart
                            </a>
                        </div>
                        <div class="relative flex items-center justify-center md:ml-8">
                            @if(Route::has('login'))
                            @auth()
                            <button type="button" class="flex  text-sm rounded-full md:me-0 " id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                                <span class="sr-only">Open user menu</span>
                                @if (auth()->check() && auth()->user()->thumbnail)
                                <img class="h-8 w-8 rounded-full border-4 border-gray-300 mx-auto my-4"
                                    src="{{ auth()->user()->thumbnail ? asset(auth()->user()->thumbnail) : 'https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=320&amp;h=320&amp;q=80' }}"
                                    alt="Profile Image">
                                @else
                                <!-- Display a default profile when register  -->
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8 w-8 h-8">
                                    <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                                </svg>
                                @endif

                            </button>
                            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow " id="user-dropdown">
                                <div class="px-4 py-3">
                                    <span class="block text-sm text-gray-900 ">{{auth()->user()->name}}</span>
                                    <span class="block text-sm  text-gray-500 truncate ">{{auth()->user()->email}}</span>
                                </div>
                                <ul class="py-2" aria-labelledby="user-menu-button">
                                    <li class="">
                                        <a href="/User/Dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">Your Dashboard</a>
                                    </li>
                                    <li id="show-alert-logout">
                                        <a href="#" onclick="confirmLogout()" class="flex item-center place-items-center hover:bg-gray-100 text-red-500">
                                            <div class="block px-4 py-2 text-sm text-gray-700 pointer text-red-500">Log out</div>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                                                <path fill-rule="evenodd" d="M3 4.25A2.25 2.25 0 0 1 5.25 2h5.5A2.25 2.25 0 0 1 13 4.25v2a.75.75 0 0 1-1.5 0v-2a.75.75 0 0 0-.75-.75h-5.5a.75.75 0 0 0-.75.75v11.5c0 .414.336.75.75.75h5.5a.75.75 0 0 0 .75-.75v-2a.75.75 0 0 1 1.5 0v2A2.25 2.25 0 0 1 10.75 18h-5.5A2.25 2.25 0 0 1 3 15.75V4.25Z" clip-rule="evenodd" />
                                                <path fill-rule="evenodd" d="M6 10a.75.75 0 0 1 .75-.75h9.546l-1.048-.943a.75.75 0 1 1 1.004-1.114l2.5 2.25a.75.75 0 0 1 0 1.114l-2.5 2.25a.75.75 0 1 1-1.004-1.114l1.048-.943H6.75A.75.75 0 0 1 6 10Z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            @else
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8 w-8 h-8">
                                <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                            </svg>
                            <a href="{{ route('login') }}" class="hidden md:block md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse font-semibold text-gray-700">Log In</a>
                            @endauth
                            @endif
                        </div>
                    </div>
                </div>
                <div class="md:hidden">
                    <button onclick="toggleMenu()" class="inline-flex items-center justify-center p-2 rounded-md text-gray-900 hover:text-gray-600 focus:outline-none focus:ring-2  focus:ring-offset-gray-800 focus:ring-white">
                        <span class="sr-only">Open main menu</span>
                        <svg id="menu-icon" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 12h18M3 6h18M3 18h18"></path>
                        </svg>
                        <svg id="close-icon" class="h-6 w-6 hidden" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div id="menu" class="md:hidden hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="/" class="text-md block font-medium text-gray-900 hover:text-gray-600 px-3 py-2 rounded-md transition-colors duration-300">Home</a>
                <a href="{{ route('search.categories') }}" class="text-md block font-medium text-gray-900 hover:text-gray-600 px-3 py-2 rounded-md transition-colors duration-300">Category</a>
                <a href="{{ route('model.home') }}" class="text-md block font-medium text-gray-900 hover:text-gray-600 px-3 py-2 rounded-md transition-colors duration-300">Model</a>
                <a href="{{ route('trending.tumblers') }}" class="text-md block font-medium text-gray-900 hover:text-gray-600 px-3 py-2 rounded-md transition-colors duration-300">New Trending</a>
                <a href="#about-us" class="text-md block font-medium text-gray-900 hover:text-gray-600 px-3 py-2 rounded-md transition-colors duration-300">About Us</a>
            </div>
            <hr class="border-gray-300 w-full">
            <div class="flex item-center justify-center gap-1 p-4 ">
                <div class="relative flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd" d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
                    </svg>
                    <a href="#" class="text-sm font-medium text-gray-900 hover:text-gray-600 px-3 py-2 rounded-md transition-colors duration-300">Location</a>
                </div>
                <div class="relative flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd" d="M20.599 1.5c-.376 0-.743.111-1.055.32l-5.08 3.385a18.747 18.747 0 0 0-3.471 2.987 10.04 10.04 0 0 1 4.815 4.815 18.748 18.748 0 0 0 2.987-3.472l3.386-5.079A1.902 1.902 0 0 0 20.599 1.5Zm-8.3 14.025a18.76 18.76 0 0 0 1.896-1.207 8.026 8.026 0 0 0-4.513-4.513A18.75 18.75 0 0 0 8.475 11.7l-.278.5a5.26 5.26 0 0 1 3.601 3.602l.502-.278ZM6.75 13.5A3.75 3.75 0 0 0 3 17.25a1.5 1.5 0 0 1-1.601 1.497.75.75 0 0 0-.7 1.123 5.25 5.25 0 0 0 9.8-2.62 3.75 3.75 0 0 0-3.75-3.75Z" clip-rule="evenodd" />
                    </svg>
                    <a href="#" class="text-sm font-medium text-gray-900 hover:text-gray-600 px-3 py-2 rounded-md transition-colors duration-300">Customize</a>
                </div>
            </div>
        </div>
    </nav>

    <main>
        <section class="section-card-dialog">
            <div id="cartDialog" class="p-4 fixed z-50 hidden flex right-0 top-12 transform ">
                <div class="bg-white w-80 max-h-[400px] rounded-lg shadow-lg p-4 relative overflow-y-auto">
                    <h3 class="text-xl font-bold mb-4">Your Cart</h3>
                    @if(count($cartItems) > 0)
                    <ul class="space-y-4">
                        @foreach($cartItems as $item)
                        <li class="flex items-center gap-3 border-b pb-2">
                            <img src="{{ $item['image'] ? asset('storage/' . $item['image']) : asset('images/default-placeholder.png') }}"
                                alt="{{ $item['name'] }}"
                                class="w-12 h-12 object-cover rounded border" />
                            <div class="flex-1">
                                <div class="font-semibold text-gray-800 text-sm">{{ $item['name'] }}</div>
                                <div class="text-xs text-gray-500">Qty: {{ $item['quantity'] }}</div>
                                <div class="text-xs text-gray-500">Price: ${{ number_format($item['price'], 2) }}</div>
                                @if(!empty($item['color']))
                                <div class="inline-block w-4 h-4 rounded-full border mt-1" style="background:{{ $item['color'] }}"></div>
                                @endif
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="mt-4 flex justify-between items-center">
                        <span class="font-bold text-gray-700 text-sm">Total:</span>
                        <span class="font-bold text-green-600 text-lg">
                            ${{ number_format(array_sum(array_map(fn($i) => $i['price'] * $i['quantity'], $cartItems)), 2) }}
                        </span>
                    </div>
                    <a href="{{ route('user.viewCart') }}"
                        class="block mt-4 w-full text-center bg-gray-900 text-white py-2 rounded hover:bg-gray-800 transition">
                        View Full Cart
                    </a>
                    @else
                    <p class="text-gray-600 text-center justify-center">Your cart is currently empty.</p>
                    @endif
                </div>
            </div>
        </section>
        <div class=" relative  ">
            <div>@yield('contents')</div>
        </div>
    </main>
    <footer class="px-3 pt-4 lg:px-9  bg-gray-50">
        <div class="grid gap-10 row-gap-6 mb-8 sm:grid-cols-2 lg:grid-cols-4">

            <div class="sm:col-span-2">
                <a href="#" class="inline-flex items-center">
                    <span class="ml-2 text-xl font-bold tracking-wide text-gray-800">BE THE FIRST TO KNOW
                    </span>
                </a>
                <div class="mt-6 lg:max-w-xl">
                    <p class="text-sm text-gray-800">
                        At Tumbler Haven, we’re dedicated to making tumbler shopping simple, fun, and fully digital. Our platform allows customers to easily personalize their tumblers in real time and place orders without needing to wait for seller replies or visit a physical store. We focus on delivering high-quality, stylish drinkware that reflects your personality and is perfect for everyday use or as a thoughtful gift.

                    </p>
                </div>
            </div>

            <div class="flex flex-col gap-2 text-sm">
                <p class="text-base font-bold tracking-wide text-gray-900">Popular Tumblers</p>
                <a href="#">The Quencher ProTour Flip Straw Tumbler</a>
                <a href="#">The IceFlow™ Flip Straw Tumbler</a>
                <a href="#">The Drinkware</a>
                <p class="text-base font-bold tracking-wide text-gray-900">Trending Popular</p>
                <a href="#">GO Everyday Wine Tumbler</a>
                <a href="#">Adventure Stacking Beer Pint</a>
                <a href="#">Adventure Stacking Beer Pint</a>
            </div>

            <div class="w-full h-full">
                <p class=" font-bold tracking-wide text-gray-900 text-center font-serif">Tumbler Haven </p>
                <img src="footer.png" alt="">
            </div>

        </div>

        <div class="flex flex-col-reverse justify-between pt-5 pb-10 border-t lg:flex-row">
            <p class="text-sm text-gray-600">© Copyright 2025 Company. All rights reserved.</p>
            <ul class="flex flex-col mb-3 space-y-2 lg:mb-0 sm:space-y-0 sm:space-x-5 sm:flex-row">
                <li>
                    <a href="#"
                        class="text-sm text-gray-600 transition-colors duration-300 hover:text-deep-purple-accent-400">Privacy
                        &amp; Cookies Policy
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="text-sm text-gray-600 transition-colors duration-300 hover:text-deep-purple-accent-400">Disclaimer
                    </a>
                </li>
            </ul>
        </div>

    </footer>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const cartIcon = document.getElementById("cartIcon");
        const cartDialog = document.getElementById("cartDialog");
        const closeCartDialog = document.getElementById("closeCartDialog");
        let hoverTimeout;

        // Remove click event for cartIcon (do not open on click)
        // cartIcon.addEventListener("click", ...); // <-- Remove or comment out

        // Show cart dialog on hover
        cartIcon.addEventListener("mouseenter", function() {
            clearTimeout(hoverTimeout);
            cartDialog.classList.remove("hidden");
        });

        // Hide cart dialog when mouse leaves both icon and dialog
        cartIcon.addEventListener("mouseleave", function() {
            hoverTimeout = setTimeout(() => {
                cartDialog.classList.add("hidden");
            }, 200);
        });
        cartDialog.addEventListener("mouseenter", function() {
            clearTimeout(hoverTimeout);
        });
        cartDialog.addEventListener("mouseleave", function() {
            cartDialog.classList.add("hidden");
        });

        // Close button inside dialog
        closeCartDialog.addEventListener("click", function() {
            cartDialog.classList.add("hidden");
        });
    });

    function confirmLogout() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You will be logged out!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#f53636',
            cancelButtonColor: '#d5d5d5',
            confirmButtonText: 'Yes, log out!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "/logout";
            }
        });
    }

    function showLocationPopup() {
        Swal.fire({
            title: 'Our Store Location',
            html: `
                <div class="mb-2 font-semibold text-gray-700">Tumbler Haven Store</div>
                <div class="mb-2 text-gray-600 text-sm">Royal University of Phnom Penh</div>
                <div style="width:100%;border-radius:8px;overflow:hidden;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3908.7652965627717!2d104.88816677481728!3d11.56867598863239!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3109519fe4077d69%3A0x20138e822e434660!2sRoyal%20University%20of%20Phnom%20Penh!5e0!3m2!1sen!2skh!4v1748585371174!5m2!1sen!2skh"
                        width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            `,
            width: 600,
            showCloseButton: true,
            showConfirmButton: false,
        });
    }
</script>

</html>