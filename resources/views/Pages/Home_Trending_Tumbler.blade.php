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
            animation-delay: 3s;
            /* Adjust this delay for smoother transitions */
        }

        .carousel-item:nth-child(3) {
            animation-delay: 6s;
            /* Adjust this delay for smoother transitions */
        }
    </style>
    <section class="bg-white py-12 text-gray-700 sm:py-16 lg:py-20">
        <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-md text-center">
                <h2 class="font-serif text-2xl font-bold sm:text-3xl">Our Top Trending Tumbler</h2>
                <p class="mt-4 text-base text-gray-700">Discover our latest trending tumbler — a perfect blend of style, durability, and personalization</p>
            </div>

            <div class="mt-10 grid grid-cols-2 gap-6 lg:mt-24 lg:grid-cols-4 lg:gap-4 ">
                @foreach($trendingTumblers as $tumblerTrending)
                <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl mt-4">
                    <a href="{{ route('tumbler.details', $tumblerTrending->id) }}">
                        @php
                        $thumbs = is_array($tumblerTrending->thumbnails) ? $tumblerTrending->thumbnails : json_decode($tumblerTrending->thumbnails, true);
                        $firstThumb = $thumbs[0] ?? 'default.png'; // fallback image
                        @endphp
                        <img src="{{ asset('storage/' . $firstThumb) }}" alt="{{ $tumblerTrending->name }}" class="h-80 w-72 object-cover  rounded-t-xl" />
                        <div class="px-4 py-3 w-72">
                            <span class="text-gray-400 mr-3 uppercase text-xs">{{ $tumblerTrending->category->name ?? 'Uncategorized' }}</span>
                            <div>
                                <p class="text-s mt-2 font-bold text-black truncate block capitalize">{{ $tumblerTrending->name }}</p>
                                <p class="flex items-center text-s font-semibold text-black cursor-auto my-3">
                                    {{ $tumblerTrending->model->name ?? 'No model' }} | {{ $tumblerTrending->size }} OZ
                                </p>
                            </div>
                            <!-- Star Rating -->
                            <div class="flex items-center mt-1 mb-3">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <=$tumblerTrending->rating)
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="h-5 w-5 text-yellow-500">
                                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                    </svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="h-5 w-5 text-gray-300">
                                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                    </svg>
                                    @endif
                                    @endfor
                                    <span class="text-xs text-gray-500 ml-1">({{ $tumblerTrending->rating_count }})</span>
                            </div>
                            <div class="flex items-center">
                                <p class="text-lg font-semibold text-black cursor-auto my-3">${{ number_format($tumblerTrending->price, 2) }}</p>
                                @if($tumblerTrending->discount_price)
                                <del>
                                    <p class="text-sm text-gray-600 cursor-auto ml-2">${{ number_format($tumblerTrending->discount_price, 2) }}</p>
                                </del>
                                @endif
                                <div class="ml-auto">
                                    @if($tumblerTrending->stock > 0)
                                    <button class="border border-2 text-sm text-gray-600 px-4 py-2 rounded hover:bg-gray-300  transition duration-200 flex items-center justify-center hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-6 h-6 inline-block mr-2 items-center">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                        Add to Cart
                                    </button>
                                    @else
                                    <p class="text-sm text-red-600 ml-2">Out of Stock</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>

            <!-- Pagination Links -->
            <div class="mt-8">
                {{ $trendingTumblers->links('vendor.pagination.custom') }}
            </div>
        </div>
    </section>

</body>

</html>
@endsection