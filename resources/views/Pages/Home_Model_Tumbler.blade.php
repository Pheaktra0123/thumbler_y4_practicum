@extends('Component.header')
@extends('TailwindCssLink.style')
@section('title', 'Model Tumbler')
@section('contents')

<div class="min-h-screen bg-gray-50">
    <!-- Hero Section -->
    <section class="relative h-96 md:h-[400px] w-full overflow-hidden">
        <video class="absolute inset-0 w-full h-full object-cover" src="{{ asset('Animated.mp4') }}" autoplay muted loop></video>

        <div class="absolute inset-0 bg-black/30 flex items-center justify-center">
            <div class="container px-4 mx-auto text-center">
                <h1 class="text-white text-4xl md:text-5xl font-bold mb-4">Model Tumbler Haven</h1>
                <p class="text-white text-xl mb-8 max-w-2xl mx-auto">One stop solution for plastic bottles. We have Tumbler Haven.</p>

                <form id="model-search-form" action="{{ route('search.model') }}" method="GET" class="max-w-2xl mx-auto">
                    <div class="flex flex-col md:flex-row gap-2 bg-white p-2 rounded-xl shadow-lg">
                        <input
                            id="search-bar"
                            name="query"
                            type="text"
                            placeholder="Search Product Name Here..."
                            value="{{ old('query', $query ?? '') }}"
                            class="flex-grow px-6 py-3 rounded-lg border-none focus:ring-2 focus:ring-blue-500 outline-none">
                        <button
                            id="search-btn"
                            type="submit"
                            class="px-6 py-3 bg-black text-white rounded-lg hover:bg-gray-800 transition-colors flex items-center justify-center min-w-[120px]">
                            <span id="search-btn-text">Search</span>
                            <svg id="search-loading" class="hidden w-5 h-5 ml-2 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Models Section -->
    <section class="py-12 bg-white" id="services">
        <div class="container px-4 mx-auto">
            <h2 class="relative text-3xl md:text-4xl font-bold text-gray-800 mb-12 text-center">
                <span class="relative z-10 bg-white px-4">Our Top Models</span>
                <span class="absolute left-0 right-0 top-1/2 h-0.5 bg-gray-200 -z-10"></span>
            </h2>

            @if(!isset($model) || count($model) === 0)
            <div class="text-center py-12">
                <p class="text-gray-500 text-lg">No models available at the moment.</p>
            </div>
            @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($model as $item)
                <a
                    href="{{ route('model.tumblers', ['id' => $item->id]) }}"
                    class="group relative block overflow-hidden rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 h-80">
                    <img
                        src="{{ Storage::url($item->Thumbnail) }}"
                        alt="{{ $item->name }}"
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/70 via-gray-900/30 to-transparent"></div>
                    <div class="relative h-full flex flex-col justify-end p-6">
                        <h3 class="text-2xl font-bold text-white">{{ $item->name }}</h3>
                        <p class="text-gray-200 mt-1">
                            {{ $item->tumblers ? $item->tumblers->count() : 0 }} Tumblers
                        </p>
                    </div>
                </a>
                @endforeach
            </div>
            @endif
        </div>
    </section>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('model-search-form');
        const btn = document.getElementById('search-btn');
        const btnText = document.getElementById('search-btn-text');
        const loadingIcon = document.getElementById('search-loading');

        if (form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                // Show loading state
                btn.disabled = true;
                btnText.classList.add('opacity-50');
                loadingIcon.classList.remove('hidden');

                // Submit form after a brief delay to show loading state
                setTimeout(() => {
                    form.submit();
                }, 100);
            });
        }
    });
</script>

@endsection