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

<body >
    <div class="bg-yellow-50 flex pt-12 px-6 md:px-20  items-center justify-center bg-hero md:h-screen overflow-hidden">
    <div class=" flex flex-col  gap-6 md:flex-row items-center max-w-8xl">
        <div class="w-full md:w-1/2 lg:pr-32">
            <h2 class="text-8xl lg:text-5xl text-center md:text-left text-blue-900 leading-tight font-medium">New Trending Tumbler</h2>
            <h3
                class="mt-6 md:mt-10 text-md lg:text-xl text-center md:text-left text-gray-700 font-light tracking-wider leading-relaxed">
                Help Scout is designed with your customers in mind. Provide email and live chat with a personal touch,
                and deliver help content right where your customers need it, all in one place, all for one low price.
            </h3>
            <div class="mt-10 flex flex-col sm:flex-row justify-center md:justify-start">
                <button class="w-full sm:w-40 px-4 py-3 rounded font-semibold text-md bg-blue-500 text-white border-2 border-blue-500">Get started</button>
                <button class="w-full mt-4 sm:mt-0 sm:ml-4 sm:w-40 px-4 py-3 rounded font-semibold text-md bg-white text-blue-500 border-2 border-gray-500">Watch a Demo</button>
            </div>
        </div>
        <div class="w-full md:w-1/2 flex justify-center md:justify-end">
            <img src="newtrending.png">
        </div>
    </div>
</div>
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
                                <p class="text-sm text-gray-600 ml-2 border-b border-black cusor-pointer">Add to Cart</p>
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
                                <p class="text-sm text-gray-600 ml-2 border-b border-black cusor-pointer">Add to Cart</p>
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
                                <p class="text-sm text-gray-600 ml-2 border-b border-black cusor-pointer">Add to Cart</p>
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
