@extends('Component.header')@extends('TailwindCssLink.style')
@section('title','Category Tumbler')
@section('contents')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="TumblerHaven - Your one-stop solution for tumbler grinding services. Explore our categories and find the perfect tumbler for you.">2
</head>

<body">
    <main>
        <div class="relative w-full h-[600px] object-cover" id="home">
            <div class="absolute inset-0  ">
                <img src="tumbler_banner.jpg" alt="Background Image" class="object-cover object-center w-full h-full" />

            </div>
            <div class="absolute inset-9 flex flex-col md:flex-row items-center justify-center">
                <div class="md:w-1/2 mb-4 md:mb-0 text-center">
                    <h1 class="text-grey-700  font-bold text-4xl md:text-5xl leading-tight mb-2">Categories Tumbler Haven
                    </h1>
                    <p class="font-regular text-xl mb-8 mt-4">One-stop solution for plastic bottles. We have Tumbler Haven.</p>
                    <form id="model-search-form"
                        action="{{ route('search.categories') }}"
                        name="search"
                        method="GET"
                        onsubmit="event.preventDefault(); const searchBar = document.getElementById('search-bar'); const searchBtn = document.getElementById('search-btn'); const searchLoading = document.getElementById('search-loading'); const searchBtnText = document.getElementById('search-btn-text'); searchBtn.disabled = true; searchLoading.classList.remove('hidden'); searchBtnText.classList.add('hidden'); this.submit();"

                        class="mx-auto relative bg-white min-w-sm max-w-2xl flex flex-col md:flex-row items-center justify-center border py-2 px-2 rounded-2xl gap-2 shadow-2xl focus-within:border-gray-300">
                        <input id="search-bar" name="query" placeholder="Search Product Name Here ..."
                            class="px-6 py-2 w-full rounded-md flex-1 outline-none bg-white"
                            value="{{ old('query', $query ?? '') }}">
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

        <!-- our category section -->
        <section class="mt-10" id="services">
            <div class="container w-full mx-auto px-4">
                <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center font-serif">Our Categories</h2>
                <div class="w-11/12 mx-auto flex flex-wrap gap-10 justify-center items-center">
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
                        <div class="h-full shadow-sm border-gray-200 border-opacity-60 rounded-lg overflow-hidden hover:shadow-xl duration-300 hover:scale-105  ">
                            <img class="h-64 w-full object-cover object-center " src="{{ $category->Thumbnail ? Storage::url($category->Thumbnail) : asset('default-image.jpg') }}"
                                alt="{{ $category->name ?? 'Category Image' }}">
                            <div class="p-6">
                                <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">CATEGORY</h2>
                                <h1 class="title-font text-lg font-medium text-gray-900 mb-3 font-mono">{{ $category->name ?? 'Unknown Category' }}</h1>
                                <div class="flex items-center flex-wrap">
                                    <a href="{{ route('category.tumblers', $category->id) }}" class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0 font-sans">
                                        See all items
                                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14"></path>
                                            <path d="M12 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                    <span class="text-gray-400 mr-3 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
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
        <h1 class="font-bold text-4xl text-center mt-10 font-serif ">Choose your own Tumbler!!</h1>
        <p class="text-center text-gray-600 font-serif opacity-50 mt-5">One-stop solution for plastic bottles. We have Tumbler Haven.</p>
        <div class="flex justify-between items-center px-10 mb-24 ">
            <h3 class="text-lg font-medium opacity-40  text-center font-serif ">Recently Tumbler</h3>
            <p class="text-lg font-medium opacity-50  text-center ">Total Item {{$tumblers->count()}}</p>
        </div>
        <section id="Projects" class="flex justify-center items-center flex-wrap gap-10 px-10">
            @forelse ($tumblers as $tumbler)
            <div class="w-72 bg-white object-center object-cover shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
                <a href="{{ route('tumbler.details', $tumbler->id) }}" class="delay-[300ms] duration-[600ms] taos:scale-[0.6] taos:opacity-0 object-center object-cover" data-taos-offset="100">
                    <img src="{{ !empty($tumbler->thumbnails) ? Storage::url(json_decode($tumbler->thumbnails)[0]) : asset('cuz_1.png') }}" alt="{{ $tumbler->tumbler_name }}" class="h-96 w-72 object-fit object-center rounded-t-xl" />
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

        <!-- Add this section where you want to display the results -->
        <div id="search-results" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-6">
            <!-- Results will be dynamically inserted here -->
        </div>
    </main>
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchBar = document.getElementById('search-bar');
            const searchButton = document.getElementById('search-button');
            const loadingSpinner = document.getElementById('loading-spinner');
            const resultsContainer = document.getElementById('search-results');
            let searchTimeout;

            function performSearch() {
                const query = searchBar.value;
                if (query.length < 2) return; // Don't search for very short queries

                loadingSpinner.classList.remove('opacity-0');

                fetch(`/search?query=${encodeURIComponent(query)}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        resultsContainer.innerHTML = ''; // Clear existing results

                        if (data.tumblers.length === 0) {
                            resultsContainer.innerHTML = '<div class="col-span-full text-center">No products found</div>';
                            return;
                        }

                        data.tumblers.forEach(tumbler => {
                            const card = `
                        <div class="bg-white rounded-lg shadow-md p-4">
                            <img src="${tumbler.image_url || '/default-tumbler.jpg'}" alt="${tumbler.name}" class="w-full h-48 object-cover rounded-md">
                            <h3 class="mt-2 text-lg font-semibold">${tumbler.name}</h3>
                            <p class="text-gray-600">${tumbler.description || ''}</p>
                            <p class="mt-2 text-green-600 font-bold">$${tumbler.price}</p>
                        </div>
                    `;
                            resultsContainer.innerHTML += card;
                        });
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        resultsContainer.innerHTML = '<div class="col-span-full text-center text-red-500">An error occurred while searching</div>';
                    })
                    .finally(() => {
                        loadingSpinner.classList.add('opacity-0');
                    });
            }

            // Search as you type with debouncing
            searchBar.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(performSearch, 300);
            });

            // Search when search button is clicked
            searchButton.addEventListener('click', function(e) {
                e.preventDefault();
                performSearch();
            });

            // Search when Enter key is pressed
            searchBar.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    performSearch();
                }
            });
        });
    </script>
    @endpush
    <!-- Loading Spinner -->
    <div id="pagination-loading-spinner" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="w-16 h-16 border-4 border-blue-500 border-t-transparent rounded-full animate-spin"></div>
    </div>
    </body>

</html>
@endsection