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
                <video class="object-cover object-center w-full h-full absolute object-cover" src="animated.mp4"
                    type="video/mp4" autoplay muted loop>
                </video>

            </div>
            <div class="absolute inset-9 flex flex-col md:flex-row items-center justify-center">
                <div class="md:w-1/2 mb-4 md:mb-0 text-center">
                    <h1 class="text-grey-700  font-bold text-4xl md:text-5xl leading-tight mb-2">Model Tumbler Haven
                    </h1>
                    <p class="font-regular text-xl mb-8 mt-4">One stop solution for flour grinding services</p>
                    <label
                        class="mx-auto relative bg-white min-w-sm max-w-2xl flex flex-col md:flex-row items-center justify-center border py-2 px-2 rounded-2xl gap-2 shadow-2xl focus-within:border-gray-300"
                        for="search-bar">
                        <input id="search-bar" placeholder="Search Product Name Here ... "
                            class="px-6 py-2 w-full rounded-md flex-1 outline-none bg-white">
                        <button
                            class="w-full md:w-auto px-6 py-3 bg-black border-black text-white fill-white active:scale-95 duration-100 border will-change-transform overflow-hidden relative rounded-xl transition-all disabled:opacity-70">

                            <div class="relative">

                                <!-- Loading animation change opacity to display -->
                                <div
                                    class="flex items-center justify-center h-3 w-3 absolute inset-1/2 -translate-x-1/2 -translate-y-1/2 transition-all">
                                    <svg class="opacity-0 animate-spin w-full h-full" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24">
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

        <!-- our model section -->
          <section id="Projects" class="flex justify-center items-center flex-wrap gap-10 px-10">
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
                                        <p class="text-sm text-gray-600 ml-2 border-b border-black cursor-pointer">Add to Cart</p>
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
@endsection