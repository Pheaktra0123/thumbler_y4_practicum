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
    <div class="w-full mx-auto">
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

            <div class="mt-10 grid grid-cols-2 gap-6 lg:mt-24 lg:grid-cols-4 lg:gap-4">
                @foreach($trendingTumblers as $tumblerTrending)
                <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl mt-4">
                    <a href="{{ route('tumbler.details', $tumblerTrending->id) }}">
                        @php
                        $thumbs = is_array($tumblerTrending->thumbnails) ? $tumblerTrending->thumbnails : json_decode($tumblerTrending->thumbnails, true);
                        $firstThumb = $thumbs[0] ?? 'default.png';
                        @endphp
                        <img src="{{ asset('storage/' . $firstThumb) }}" alt="{{ $tumblerTrending->name }}" class="h-80 w-72 object-cover rounded-t-xl" />
                        <div class="px-4 py-3 w-72">
                            <div class="mb-2">
                                <span class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">
                                    {{ $tumblerTrending->purchases_count }} {{ Str::plural('purchase', $tumblerTrending->purchases_count) }}
                                </span>
                            </div>
                            <span class="text-gray-400 mr-3 uppercase text-xs">{{ $tumblerTrending->category->name ?? 'Uncategorized' }}</span>
                            <div>
                                <p class="text-s mt-2 font-bold text-black truncate block capitalize">{{ $tumblerTrending->name }}</p>
                                <p class="flex items-center text-s font-semibold text-black cursor-auto my-3">
                                    {{ $tumblerTrending->model->name ?? 'No model' }} | {{ $tumblerTrending->size }} OZ
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <!-- Pagination Links -->
            <!-- <div class="mt-8">
                {{ $trendingTumblers->links('vendor.pagination.custom') }}
            </div> -->
        </div>
    </section>

</body>

</html>
@endsection