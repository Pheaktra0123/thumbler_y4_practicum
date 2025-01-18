@extends("TailwindCssLink.style")
<!-- source: https://github.com/mfg888/Responsive-Tailwind-CSS-Grid/blob/main/index.html -->

<div class=" w-full "></div>
<!-- @include('pages.header') -->
@include("Component.header")

<div class="py-4 p-20 flex flex-col items-start">
    <!-- <button onclick="history.back()"
        class="bg-gray-100 hover:bg-gray-300 text-black py-2 px-4 rounded-xl font-bold py-1 px-2 flex items-center">
        <img src="https://cdn-icons-png.flaticon.com/512/93/93634.png" alt="Back arrow icon" class="h-5 w-5 mr-2" />
        Back
    </button> -->
</div>


<div class="text-center p-10">
    <h1 class="font-bold text-4xl mb-4">Choose your own Product!!</h1>
</div>

<!-- ✅ Grid Section - Starts Here 👇 -->
<section id="Projects"
    class="w-fit mx-auto grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 justify-items-center justify-center gap-y-20 gap-x-14 mt-10 mb-5">

    <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
        <a href="#">
            <img src="cuz_1.png" alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
            <div class="px-4 py-3 w-72">
                <span class="text-gray-400 mr-3 uppercase text-xs">Mist</span>
                <div>
                    <p class="text-s mt-2 font-bold text-black truncate block capitalize">The Quencher H2.0 FlowState™</p>
                    <p class=" flex items-center text-s font-semibold text-black cursor-auto my-3"> Tumbler | 40 OZ</p>
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
                        <p class="text-sm text-gray-600 ml-2 border-b border-black cusor-pointer" >Add to Cart</p>
                    </div>
                </div>
            </div>

        </a>
    </div>

    <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
        <a href="#">
            <img src="cuz_1.png" alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
            <div class="px-4 py-3 w-72">
                <span class="text-gray-400 mr-3 uppercase text-xs">Mist</span>
                <div>
                    <p class="text-s mt-2 font-bold text-black truncate block capitalize">The Quencher H2.0 FlowState™
                    </p>
                    <p class=" flex items-center text-s font-semibold text-black cursor-auto my-3"> Tumbler | 40 OZ</p>
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
                        <p class="text-sm text-gray-600 cursor-auto ml-2 border-b border-black">Add to Cart</p>
                    </div>
                </div>
            </div>

        </a>
    </div>


    <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
        <a href="#">
            <img src="cuz_1.png" alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
            <div class="px-4 py-3 w-72">
                <span class="text-gray-400 mr-3 uppercase text-xs">Brand</span>
                <div>
                    <p class="text-s mt-2 font-bold text-black truncate block capitalize">The Quencher H2.0 FlowState™
                    </p>
                    <p class=" flex items-center text-s font-semibold text-black cursor-auto my-3"> Tumbler | 40 OZ</p>
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
                        <p class="text-sm text-gray-600 cursor-auto ml-2 border-b border-black">Add to Cart</p>
                    </div>
                </div>
            </div>

        </a>
    </div>

    <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
        <a href="#">
            <img src="cuz_1.png" alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
            <div class="px-4 py-3 w-72">
                <span class="text-gray-400 mr-3 uppercase text-xs">Brand</span>
                <div>
                    <p class="text-s mt-2 font-bold text-black truncate block capitalize">The Quencher H2.0 FlowState™
                    </p>
                    <p class=" flex items-center text-s font-semibold text-black cursor-auto my-3"> Tumbler | 40 OZ</p>
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
                        <p class="text-sm text-gray-600 cursor-pointer ml-2 border-b border-black">Add to Cart</p>
                    </div>
                </div>
            </div>

        </a>
    </div>

    <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
        <a href="#">
            <img src="cuz_1.png" alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
            <div class="px-4 py-3 w-72">
                <span class="text-gray-400 mr-3 uppercase text-xs">Brand</span>
                <div>
                    <p class="text-s mt-2 font-bold text-black truncate block capitalize">The Quencher H2.0 FlowState™
                    </p>
                    <p class=" flex items-center text-s font-semibold text-black cursor-auto my-3"> Tumbler | 40 OZ</p>
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
                        <p class="text-sm text-gray-600 cursor-pointer ml-2 border-b border-black">Add to Cart</p>
                    </div>
                </div>
            </div>

        </a>
    </div>


    <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
        <a href="#">
            <img src="cuz_1.png" alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
            <div class="px-4 py-3 w-72">
                <span class="text-gray-400 mr-3 uppercase text-xs">Brand</span>
                <div>
                    <p class="text-s mt-2 font-bold text-black truncate block capitalize">The Quencher H2.0 FlowState™
                    </p>
                    <p class=" flex items-center text-s font-semibold text-black cursor-auto my-3"> Tumbler | 40 OZ</p>
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
                        <p class="text-sm text-gray-600 cursor-auto ml-2 border-b border-black">Add to Cart</p>
                    </div>
                </div>
            </div>

        </a>
    </div>
    <!--   🛑 Product card 5 - Ends Here  -->

    <!--   ✅ Product card 6 - Starts Here 👇 -->
    <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
        <a href="#">
            <img src="cuz_1.png" alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
            <div class="px-4 py-3 w-72">
                <span class="text-gray-400 mr-3 uppercase text-xs">Brand</span>
                <div>
                    <p class="text-s mt-2 font-bold text-black truncate block capitalize">The Quencher H2.0 FlowState™
                    </p>
                    <p class=" flex items-center text-s font-semibold text-black cursor-auto my-3"> Tumbler | 40 OZ</p>
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
                        <p class="text-sm text-gray-600 cursor-pointer ml-2 border-b border-black">Add to Cart</p>
                    </div>
                </div>
            </div>

        </a>
    </div>
    <!--   🛑 Product card 6 - Ends Here  -->

</section>
<div class="bg-black mx-auto py-10 grid max-w-screen-full text-black pl-6 pr-4 sm:px-20 ">
    <div class="text-center text-white">
        <p class="mb-12 mt-12 text-center text-xl font-bold font-serif">Don't see what you looking for?</p>
    </div>
    <div class="text-center mt-5 align-center">
        <button class=" align-center bg-white hover:opacity-70 text-black font-bold py-2 px-4 rounded">
            Contact us
        </button>
    </div>
</div>
@include('pages.footer')
