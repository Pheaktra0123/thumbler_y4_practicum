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
        <section class="mt-10" id="services">
            <div class="container mx-auto">
                <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Our Categories</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 ">
                    @if(!isset($Categories) || count($Categories) === 0)
                    <div class="col-span-full">
                        <p class="text-center text-gray-600">No categories found</p>
                        <!-- Add this for debugging -->
                        @if(config('app.debug'))
                        <p class="text-center text-sm text-gray-500 mt-2">
                            Debug: Categories variable is {{ isset($Categories) ? 'set' : 'not set' }}
                            {{ isset($Categories) ? '(Count: ' . count($Categories) . ')' : '' }}
                        </p>
                        @endif
                    </div>
                    @else
                    @foreach ($Categories as $category)
                    <div class=" max-w-md">
                        <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                            <img class="h-64 w-full object-cover object-center" src="{{ $category->Thumbnail ? Storage::url($category->Thumbnail) : asset('default-image.jpg') }}"
                                alt="{{ $category->name ?? 'Category Image' }}">
                            <div class="p-6">
                                <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">CATEGORY</h2>
                                <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ $category->name ?? 'Unknown Category' }}</h1>
                                <div class="flex items-center flex-wrap">
                                    <a class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">
                                        See all items
                                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14"></path>
                                            <path d="M12 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                    <span class="text-gray-400 mr-3 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
                                        <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                        1.2K
                                    </span>
                                    <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>

                                        {{$category->created_at->diffForHumans()}}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </section>

        <!-- All items section -->
            <h1 class="font-bold text-4xl text-center mt-10 ">Choose your own Product!!</h1>
        <section id="Projects"
            class="w-fit mx-auto grid grid-cols-1 lg:grid-cols-4 md:grid-cols-2 justify-items-center justify-center gap-y-20 gap-x-14  mb-5">
            <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
                <a href="#" class="delay-[300ms] duration-[600ms] taos:scale-[0.6] taos:opacity-0" data-taos-offset="100">
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