@extends('Component.header')
@extends('TailwindCssLink.style')
@section('title','Category Tumbler')
@section('contents')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <main>
        <div class="relative w-full h-[600px] object-cover" id="home">
            <div class="absolute inset-0  ">
                <img src="tumbler_banner.jpg" alt="Background Image" class="object-cover object-center w-full h-full" />

            </div>
            <div class="absolute inset-9 flex flex-col md:flex-row items-center justify-center">
                <div class="md:w-1/2 mb-4 md:mb-0 text-center">
                    <h2 class="text-white font-medium text-4xl md:text-5xl leading-tight mb-2">Categories TumblerHaven</h2>
                    <p class="font-regular text-xl mb-8 mt-4 text-white">One stop solution for flour grinding services</p>
                    <label
                        class="mx-auto relative bg-white min-w-sm max-w-2xl flex flex-col md:flex-row items-center justify-center border py-2 px-2 rounded-2xl gap-2 shadow-2xl focus-within:border-gray-300"
                        for="search-bar">
                        <input id="search-bar" placeholder="Find your products here ... "
                            class="px-6 py-2 w-full rounded-md flex-1 outline-none bg-white">
                        <button
                            class="w-full md:w-auto px-6 py-3 bg-black border-black text-white fill-white active:scale-95 duration-100 border will-change-transform overflow-hidden relative rounded-xl transition-all disabled:opacity-70">

                            <div class="relative">

                                <!-- Loading animation change opacity to display -->
                                <div
                                    class="flex items-center justify-center h-3 w-3 absolute inset-1/2 -translate-x-1/2 -translate-y-1/2 transition-all">
                                    <svg class="opacity-0 animate-spin w-full h-full" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                            stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                </div>

                                <div class="flex items-center transition-all opacity-1 valid:"><span
                                        class="text-sm font-semibold whitespace-nowrap truncate mx-auto">
                                        Search
                                    </span>
                                </div>

                            </div>

                        </button>
                    </label>
                </div>

            </div>
        </div>

        <!-- our category section -->
        <section class="py-10" id="services">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Our Categories</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="image.png" alt="wheat flour grinding"
                            class="w-full h-64 object-cover object-center">
                    </div>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="【数量限定】まさにキャンパー好み！「ハイドロフラスク」の限定カラーモデル4色が登場.jpg" alt="Coffee"
                            class="w-full h-64 object-cover object-center">
                    </div>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="image1.jpg" alt="Coffee"
                            class="w-full h-64 object-cover object-center">
                    </div>
                </div>
        </section>

        <!-- All items section -->
        <div class="text-center mb-6">
            <h1 class="font-bold text-4xl ">Choose your own Product!!</h1>
        </div>
        <section id="Projects"
            class="w-fit mx-auto grid grid-cols-1 lg:grid-cols-4 md:grid-cols-2 justify-items-center justify-center gap-y-20 gap-x-14  mb-5">
            <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
                <a href="#" class="delay-[300ms] duration-[600ms] taos:scale-[0.6] taos:opacity-0"  data-taos-offset="100">
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
        </section>
    </main>
</body>

</html>
@endsection