@extends('Component.header')
@extends('TailwindCssLink.style')
@section('title', 'Trending Tumbler')
@section('contents')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<div class="w-full mx-auto mt-20">
    <div id="default-carousel" class="relative rounded-lg overflow-hidden shadow-lg" data-carousel="static">
        <!-- Carousel wrapper -->
        <div class="relative h-80 md:h-96" data-carousel-inner>
            <!-- Item 1 -->
            <div class="carousel-item duration-700 ease-in-out" data-carousel-item>
                <img src="trending3.png" class="object-cover w-full h-full" alt="Slide 1">
            </div>
            <!-- Item 2 -->
            <div class="carousel-item duration-700 ease-in-out" data-carousel-item>
                <img src="trendBanner2.png" class="object-cover w-full h-full" alt="Slide 2">
            </div>
            <!-- Item 3 -->
            <div class="carousel-item duration-700 ease-in-out" data-carousel-item>
                <img src="trending3.png" class="object-cover w-full h-full" alt="Slide 3">
            </div>
        </div>

        <!-- Slider indicators -->
        <div class="flex absolute bottom-5 left-1/2 z-30 -translate-x-1/2 space-x-2" data-carousel-indicators>
            <button type="button" class="w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-400 focus:outline-none focus:bg-gray-400 transition"></button>
            <button type="button" class="w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-400 focus:outline-none focus:bg-gray-400 transition"></button>
            <button type="button" class="w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-400 focus:outline-none focus:bg-gray-400 transition"></button>
        </div>
    </div>
</div>

<style>
    /* Ensure that all items start off-screen and invisible */
    #default-carousel[data-carousel="static"] .carousel-item {
        opacity: 0;
        transform: translateX(100%);
        transition: opacity 1s ease, transform 1s ease;
    }

    /* The first image is visible by default */
    #default-carousel[data-carousel="static"] .carousel-item:first-child {
        opacity: 1;
        transform: translateX(0);
    }

    /* Keyframe animation for sliding and fading images in and out */
    @keyframes slideLoop {
        0% {
            opacity: 0;
            transform: translateX(-100%);
        }
        20% {
            opacity: 1;
            transform: translateX(0);
        }
        40% {
            opacity: 1;
            transform: translateX(0);
        }
        60% {
            opacity: 0;
            transform: translateX(100%);
        }
        100% {
            opacity: 0;
            transform: translateX(100%);
        }
    }

    /* Apply sliding animation to all items */
    .carousel-item {
        animation: slideLoop 9s infinite;
    }

    /* Adjust the animation timing to display each item one by one */
    .carousel-item:nth-child(1) {
        animation-delay: 0s;
    }

    .carousel-item:nth-child(2) {
        animation-delay: 3s; /* Adjust this delay for smoother transitions */
    }

    .carousel-item:nth-child(3) {
        animation-delay: 6s; /* Adjust this delay for smoother transitions */
    }
</style>



    <section class="bg-white py-12 text-gray-700 sm:py-16 lg:py-20">
        <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-md text-center">
                <h2 class="font-serif text-2xl font-bold sm:text-3xl">Our Top Trending Tumbler</h2>
                <p class="mt-4 text-base text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Purus
                    faucibus massa dignissim tempus.</p>
            </div>

            <div class="mt-10 grid grid-cols-2 gap-6 lg:mt-16 lg:grid-cols-4 lg:gap-4 bg-gray-50">
                <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
                    <a href="#">
                        <img src="velentinecollection.webp" alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
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
                                    <p class="text-sm text-gray-600 ml-2 border-b border-black cusor-pointer">Add to
                                        Cart</p>
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
                                    <p class="text-sm text-gray-600 ml-2 border-b border-black cusor-pointer">Add to
                                        Cart</p>
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
                                    <p class="text-sm text-gray-600 ml-2 border-b border-black cusor-pointer">Add to
                                        Cart</p>
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
                                    <p class="text-sm text-gray-600 ml-2 border-b border-black cusor-pointer">Add to
                                        Cart</p>
                                </div>
                            </div>
                        </div>

                    </a>
                </div>
            </div>
        </div>
        </div>
    </section>

</body>

</html>
@endsection
