@extends('Component.header')
@extends('TailwindCssLink.style')
@section('title', 'Model Tumbler')
@section('contents')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <main>
        <div class="relative w-full h-[400px] object-cover" id="home">
            <div class="absolute inset-0 ">
                <video class="object-cover object-center w-full h-full absolute object-cover" src="{{ asset('Animated.mp4') }}"
                    type="video/mp4" autoplay muted loop>
                </video>

            </div>
            <div class="absolute inset-9 flex flex-col md:flex-row items-center justify-center">
                <div class="md:w-1/2 mb-4 md:mb-0 text-center">
                    <h1 class="text-grey-700  font-bold text-4xl md:text-5xl leading-tight mb-2">Model Tumbler Haven
                    </h1>
                    <p class="font-regular text-xl mb-8 mt-4">One stop solution for flour grinding services</p>
                    <form id="model-search-form"
                        action="{{ route('model.tumblers', ['id' => $model->id]) }}"
                        method="GET"
                        onsubmit="event.preventDefault(); const searchBar = document.getElementById('search-bar'); const searchBtn = document.getElementById('search-btn'); const searchLoading = document.getElementById('search-loading'); const searchBtnText = document.getElementById('search-btn-text'); searchBtn.disabled = true; searchLoading.classList.remove('hidden'); searchBtnText.classList.add('hidden'); this.submit();"

                        class="mx-auto relative bg-white min-w-sm max-w-2xl flex flex-col md:flex-row items-center justify-center border py-2 px-2 rounded-2xl gap-2 shadow-2xl focus-within:border-gray-300">
                        <input id="search-bar" name="query" placeholder="Search Product Name Here ..."
                            class="px-6 py-2 w-full rounded-md flex-1 outline-none bg-white" value="{{ old('query', $query ?? '') }}">
                        <button id="search-btn" type="submit"
                            class="w-full md:w-auto px-6 py-3 bg-black border-black text-white fill-white active:scale-95 duration-100 border will-change-transform overflow-hidden relative rounded-xl transition-all disabled:opacity-70">
                            <span id="search-btn-text">Search</span>
                            <svg id="search-loading" class="hidden w-5 h-5 ml-2 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                        </button>
                    </form>
                </div>

            </div>
        </div>

        <!-- our model section -->
        <section id="Projects" class="flex justify-center items-center flex-wrap gap-10 px-10 mt-10">
            @forelse ($tumblers as $tumbler)
            <div class="w-72 bg-white object-center object-cover shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
                <a href="{{ route('tumbler.details', $tumbler->id) }}" class="delay-[300ms] duration-[600ms] taos:scale-[0.6] taos:opacity-0 object-center object-cover" data-taos-offset="100">
                    <img src="{{ !empty($tumbler->thumbnails) ? Storage::url(json_decode($tumbler->thumbnails)[0]) : asset('cuz_1.png') }}" alt="{{ $tumbler->tumbler_name }}" class="h-96 w-72 object-cover object-center rounded-t-xl" />
                    <div class="px-4 py-3 w-72">
                        <span class="text-gray-400 mr-3 uppercase text-xs">{{ $tumbler->category->name ?? 'Unknown Category' }}</span>
                        <div>
                            <p class="text-s mt-2 font-bold text-black truncate block capitalize">{{ $tumbler->tumbler_name }}</p>
                            <p class="flex items-center text-s font-semibold text-black cursor-auto my-3">
                                {{ $tumbler->model->name ?? 'Unknown Model' }} |
                                @php
                                $sizes = json_decode($tumbler->sizes, true);
                                $firstSize = 'N/A';
                                if (is_array($sizes)) {
                                // Remove empty values and reindex
                                $sizes = array_values(array_filter($sizes));
                                if (isset($sizes[0]) && !empty($sizes[0])) {
                                $firstSize = trim(str_replace(['"', '[', ']'], '', $sizes[0]));
                                }
                                }
                                echo $firstSize;
                                @endphp
                            </p>
                        </div>
                        <div class="flex items-center mt-2">
                            @php
                            $rating = $tumbler->rating ?? 0;
                            $ratingCount = $tumbler->rating_count ?? 0;
                            $fullStars = floor($rating);
                            $halfStar = ($rating - $fullStars) >= 0.5;
                            $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                            @endphp
                            <div class="flex items-center space-x-1">
                                @for ($i = 0; $i < $fullStars; $i++)
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.9 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 " /></svg>
                                    @endfor
                                    @if ($halfStar)
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <defs>
                                            <linearGradient id="half-grad">
                                                <stop offset="50%" stop-color="currentColor" />
                                                <stop offset="50%" stop-color="#e5e7eb" />
                                            </linearGradient>
                                        </defs>
                                        <polygon fill="url(#half-grad)" points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.9 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 " />
                                    </svg>
                                    @endif
                                    @for ($i = 0; $i < $emptyStars; $i++)
                                        <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                        <polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.9 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 " /></svg>
                                        @endfor
                            </div>
                            <span class="text-gray-800 ml-2 font-semibold">{{ number_format($rating, 1) }} <span class="text-gray-500 font-normal">out of 5</span></span>

                        </div>
                        <div class="flex items-center">
                            <p class="text-lg font-semibold text-black cursor-auto my-3">${{ number_format($tumbler->price, 2) }}</p>
                            @if($tumbler->original_price)
                            <del>
                                <p class="text-sm text-gray-600 cursor-auto ml-2">${{ number_format($tumbler->original_price, 2) }}</p>
                            </del>
                            @endif
                            <div class="ml-auto">
                                @if($tumbler->stock > 0)
                                <button class="border border-2 text-sm text-gray-600 px-4 py-2 rounded hover:bg-gray-200  transition duration-200 flex items-center justify-center hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
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
            @empty
            <div class="col-span-full text-center text-gray-600 mt-10 mb-10">
                <p>No tumblers available</p>
            </div>
            @endforelse
        </section>
        <!-- Pagination Links -->
        <div class="mt-6">
            <div class="flex justify-center">
                {{ $tumblers->links('vendor.pagination.custom') }}
            </div>
        </div>
    </main>
</body>

</html>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('model-search-form');
        const btn = document.getElementById('search-btn');
        const btnText = document.getElementById('search-btn-text');
        const loadingIcon = document.getElementById('search-loading');

        if (form) {
            form.addEventListener('submit', function() {
                btn.disabled = true;
                btnText.classList.add('opacity-50');
                loadingIcon.classList.remove('hidden');
            });
        }
    });
</script>

@endsection