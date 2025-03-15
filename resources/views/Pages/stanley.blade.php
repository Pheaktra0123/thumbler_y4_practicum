@extends('Component.header')
@include('TailwindCssLink.style')
@section('title', 'Stanley')
@section('contents')
<body>
    <style>
        .hidden {
            display: none;
        }
    </style>
    <header class="mt-20 lg:px-16 px-3 w-full h-[40px] bg-black flex justify-between items-center py-2 shadow-md">
        <!-- Left Section -->
        <div class=" font-serif flex items-center font-bold">
            <a href="#" class=" text-xl text-white">Stanley</a>
        </div>

        <!-- Right Section -->
        <div class="text-yellow-400 underline text-sm font-medium ml-auto">
            FREE SHIPPING ON ORDERS $75+
        </div>
    </header>
    <section class="bg-white py-12 text-gray-700 sm:py-16 lg:py-20">
        <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-md text-center">
                <h2 class="font-serif text-2xl font-bold sm:text-3xl">Our Qunecher Tumber</h2>
                <p class="mt-4 text-base text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Purus
                    faucibus massa dignissim tempus.</p>
            </div>

            <!-- Product Grid -->
            <div class="mt-10 grid grid-cols-2 gap-6 lg:mt-16 lg:grid-cols-4 lg:gap-4 bg-white">
                <!-- First Row (Always Visible) -->
                <div
                    class="product-item w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
                    <!-- Product Content -->
                    <a href="/details_tumbler">
                        <img src="cuz_1.png" alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
                        <div class="px-4 py-3 w-72">
                            <span class="text-gray-400 mr-3 uppercase text-xs">Mist</span>
                            <div>
                                <p class="text-s mt-2 font-bold text-black truncate block capitalize">The Quencher H2.0
                                    FlowState™</p>
                                <p class=" flex items-center text-s font-semibold text-black cursor-auto my-3"> Tumbler
                                    | 40 OZ</p>
                            </div>
                            <!-- Star Rating -->
                            <div class="flex items-center mt-1 mb-3">
                                <!-- Stars (5 filled) -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="h-5 w-5 text-black">
                                    <path
                                        d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="h-5 w-5 text-yellow-gray-300">
                                    <path
                                        d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="h-5 w-5 text-gray-300">
                                    <path
                                        d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="h-5 w-5 text-gray-300">
                                    <path
                                        d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="h-5 w-5 text-gray-300">
                                    <path
                                        d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg>
                            </div>
                            <div class="flex items-center">
                                <p class="text-lg font-semibold text-black cursor-auto my-3">$149</p>
                                <del>
                                    <p class="text-sm text-gray-600 cursor-auto ml-2">$199</p>
                                </del>
                                <div class="ml-auto">
                                    <p id="addToCart"
                                        class="text-sm text-gray-600 ml-2 border-b border-black cusor-pointer">Add to
                                        Cart</p>
                                </div>
                            </div>
                        </div>

                    </a>
                </div>
                <div
                    class="product-item w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
                    <!-- Product Content -->
                    <a href="/details_tumbler">
                        <img src="cuz_1.png" alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
                        <div class="px-4 py-3 w-72">
                            <span class="text-gray-400 mr-3 uppercase text-xs">Mist</span>
                            <div>
                                <p class="text-s mt-2 font-bold text-black truncate block capitalize">The Quencher H2.0
                                    FlowState™</p>
                                <p class=" flex items-center text-s font-semibold text-black cursor-auto my-3"> Tumbler
                                    | 40 OZ</p>
                            </div>
                            <!-- Star Rating -->
                            <div class="flex items-center mt-1 mb-3">
                                <!-- Stars (5 filled) -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="h-5 w-5 text-black">
                                    <path
                                        d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="h-5 w-5 text-yellow-gray-300">
                                    <path
                                        d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="h-5 w-5 text-gray-300">
                                    <path
                                        d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="h-5 w-5 text-gray-300">
                                    <path
                                        d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="h-5 w-5 text-gray-300">
                                    <path
                                        d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg>
                            </div>
                            <div class="flex items-center">
                                <p class="text-lg font-semibold text-black cursor-auto my-3">$149</p>
                                <del>
                                    <p class="text-sm text-gray-600 cursor-auto ml-2">$199</p>
                                </del>
                                <div class="ml-auto">
                                    <p id="addToCart" class="text-sm text-gray-600 ml-2 border-b border-black cusor-pointer">Add to
                                        Cart</p>
                                </div>
                            </div>
                        </div>

                    </a>
                </div>
                <div
                    class="product-item w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
                    <!-- Product Content -->
                    <a href="/details_tumbler">
                        <img src="cuz_1.png" alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
                        <div class="px-4 py-3 w-72">
                            <span class="text-gray-400 mr-3 uppercase text-xs">Mist</span>
                            <div>
                                <p class="text-s mt-2 font-bold text-black truncate block capitalize">The Quencher H2.0
                                    FlowState™</p>
                                <p class=" flex items-center text-s font-semibold text-black cursor-auto my-3"> Tumbler
                                    | 40 OZ</p>
                            </div>
                            <!-- Star Rating -->
                            <div class="flex items-center mt-1 mb-3">
                                <!-- Stars (5 filled) -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="h-5 w-5 text-black">
                                    <path
                                        d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="h-5 w-5 text-yellow-gray-300">
                                    <path
                                        d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="h-5 w-5 text-gray-300">
                                    <path
                                        d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="h-5 w-5 text-gray-300">
                                    <path
                                        d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="h-5 w-5 text-gray-300">
                                    <path
                                        d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg>
                            </div>
                            <div class="flex items-center">
                                <p class="text-lg font-semibold text-black cursor-auto my-3">$149</p>
                                <del>
                                    <p class="text-sm text-gray-600 cursor-auto ml-2">$199</p>
                                </del>
                                <div class="ml-auto">
                                    <p id="addToCart" class="text-sm text-gray-600 ml-2 border-b border-black cusor-pointer">Add to
                                        Cart</p>
                                </div>
                            </div>
                        </div>

                    </a>
                </div>
                <div
                    class="product-item w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
                    <!-- Product Content -->
                    <a href="/details_tumbler">
                        <img src="cuz_1.png" alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
                        <div class="px-4 py-3 w-72">
                            <span class="text-gray-400 mr-3 uppercase text-xs">Mist</span>
                            <div>
                                <p class="text-s mt-2 font-bold text-black truncate block capitalize">The Quencher H2.0
                                    FlowState™</p>
                                <p class=" flex items-center text-s font-semibold text-black cursor-auto my-3"> Tumbler
                                    | 40 OZ</p>
                            </div>
                            <!-- Star Rating -->
                            <div class="flex items-center mt-1 mb-3">
                                <!-- Stars (5 filled) -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="h-5 w-5 text-black">
                                    <path
                                        d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="h-5 w-5 text-yellow-gray-300">
                                    <path
                                        d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="h-5 w-5 text-gray-300">
                                    <path
                                        d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="h-5 w-5 text-gray-300">
                                    <path
                                        d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="h-5 w-5 text-gray-300">
                                    <path
                                        d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg>
                            </div>
                            <div class="flex items-center">
                                <p class="text-lg font-semibold text-black cursor-auto my-3">$149</p>
                                <del>
                                    <p class="text-sm text-gray-600 cursor-auto ml-2">$199</p>
                                </del>
                                <div class="ml-auto">
                                    <p id="addToCart" class="text-sm text-gray-600 ml-2 border-b border-black cusor-pointer">Add to
                                        Cart</p>
                                </div>
                            </div>
                        </div>

                    </a>
                </div>

                <!-- Second Row (Hidden Initially) -->
                <div class="hidden-row hidden">
                    <div class="mt-10 grid grid-cols-2 gap-6 lg:mt-16 lg:grid-cols-4 lg:gap-4 bg-white">
                        <!-- First Row (Always Visible) -->

                    </div>
                    <div
                        class="product-item w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
                        <!-- Product Content -->
                        <a href="/details_tumbler">
                            <img src="cuz_1.png" alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
                            <div class="px-4 py-3 w-72">
                                <span class="text-gray-400 mr-3 uppercase text-xs">Mist</span>
                                <div>
                                    <p class="text-s mt-2 font-bold text-black truncate block capitalize">The Quencher
                                        H2.0
                                        FlowState™</p>
                                    <p class=" flex items-center text-s font-semibold text-black cursor-auto my-3">
                                        Tumbler
                                        | 40 OZ</p>
                                </div>
                                <!-- Star Rating -->
                                <div class="flex items-center mt-1 mb-3">
                                    <!-- Stars (5 filled) -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                        class="h-5 w-5 text-black">
                                        <path
                                            d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                        class="h-5 w-5 text-yellow-gray-300">
                                        <path
                                            d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                        class="h-5 w-5 text-gray-300">
                                        <path
                                            d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                        class="h-5 w-5 text-gray-300">
                                        <path
                                            d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                        class="h-5 w-5 text-gray-300">
                                        <path
                                            d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                    </svg>
                                </div>
                                <div class="flex items-center">
                                    <p class="text-lg font-semibold text-black cursor-auto my-3">$149</p>
                                    <del>
                                        <p class="text-sm text-gray-600 cursor-auto ml-2">$199</p>
                                    </del>
                                    <div class="ml-auto">
                                        <p id="addToCart"
                                            class="text-sm text-gray-600 ml-2 border-b border-black cursor-pointer">Add
                                            to Cart</p>
                                    </div>
                                </div>
                            </div>

                        </a>
                    </div>
                    <div
                        class="product-item w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
                        <!-- Product Content -->

                    </div>
                    <div
                        class="product-item w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
                        <!-- Product Content -->
                    </div>


                </div>
            </div>
        </div>

        <!-- Show More Button -->
        <div class="mt-6 text-right">
            <button id="showMoreButton"
                class="bg-black text-white px-12 py-2 rounded-lg font-medium hover:bg-gray-800 transition duration-300 mr-36">
                Show More Products
            </button>
        </div>

        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Handle Show More/Less Products button
            const showMoreButton = document.getElementById("showMoreButton");
            const hiddenRow = document.querySelector(".hidden-row");

            if (showMoreButton && hiddenRow) {
                showMoreButton.addEventListener("click", function () {
                    hiddenRow.classList.toggle("hidden");
                    showMoreButton.textContent = hiddenRow.classList.contains("hidden") ? "Show More Products" : "Show Less Products";
                });
            }

            // Handle Add to Cart button
            const addToCartButton = document.getElementById("addToCart");
            if (addToCartButton) {
                addToCartButton.addEventListener("click", function () {
                    window.location.href = "/details_tumbler";
                });
            }
        });
    </script>

    @endsection
