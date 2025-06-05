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
                    <p class="font-regular text-xl mb-8 mt-4">One stop solution for plastic bottles.  We have Tumbler Haven. </p>
                    <form id="model-search-form"
                          action="{{ route('search.model') }}"
                            name="search"
                            method="GET"
                            onsubmit="event.preventDefault(); const searchBar = document.getElementById('search-bar'); const searchBtn = document.getElementById('search-btn'); const searchLoading = document.getElementById('search-loading'); const searchBtnText = document.getElementById('search-btn-text'); searchBtn.disabled = true; searchLoading.classList.remove('hidden'); searchBtnText.classList.add('hidden'); this.submit();"

                          class="mx-auto relative bg-white min-w-sm max-w-2xl flex flex-col md:flex-row items-center justify-center border py-2 px-2 rounded-2xl gap-2 shadow-2xl focus-within:border-gray-300">
                        <input id="search-bar" name="query" placeholder="Search Product Name Here ..."
                            class="px-6 py-2 w-full rounded-md flex-1 outline-none bg-white"  value="{{ old('query', $query ?? '') }}">
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
        <section class="mt-10 py-8 " id="services">
            <div class="container  px-4 lg:px-8 md:px-6">
                <h2 class="relative text-4xl font-bold text-gray-800 mb-8 text-center before:absolute before:inset-x-0 before:top-1/2 before:h-0.5 before:bg-gray-300">
                    <span class="relative z-10 bg-gray-100 px-4">Our Top Model</span>
                </h2>
                <div class="grid grid-cols-1 mx-4 lg:mx-6 md:mx-4 sm:grid-cols-2 sm:justify-item-center sm:item-content-center lg:grid-cols-4 md:gap-8 md:justify-items-center md:grid-cols-4 justify-items-center ">

                    @if(!isset($model) || count($model) === 0)
                        <div class="col-span-full text-center">
                            <p class="text-gray-500 text-lg">No models available at the moment.</p>
                        </div>
                    @else
                        @foreach ($model as $item)
                            <a href="{{route('model.tumblers', ['id' => $item->id])}}">
                                <article
                                    class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl px-8 pb-8 pt-40  mx-auto mt-24 w-[350px] h-[350px] bg-gray-800 shadow-lg hover:shadow-xl transition-shadow duration-300">
                                    <img src="{{Storage::url($item->Thumbnail)}}" alt="{{$item->name}}" class="absolute inset-0 h-full w-full object-cover">
                                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                                    <h3 class="z-10 mt-3 text-3xl font-bold text-white">{{$item->name}}</h3>
                                    <div class="z-10 gap-y-1 overflow-hidden text-sm leading-6 text-gray-300">
                                        {{ $item->tumblers ? $item->tumblers->count() : 0 }} Tumblers
                                    </div>
                                </article>
                            </a>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
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
