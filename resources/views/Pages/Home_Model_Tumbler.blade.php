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
        <section class="mt-10 py-10" id="services">
            <div class="container mx-auto px-4">
                <h2 class="relative text-4xl font-bold text-gray-800 mb-8 text-center before:absolute before:inset-x-0 before:top-1/2 before:h-0.5 before:bg-gray-300">
                    <span class="relative z-10 bg-gray-100 px-4">Our Top Model</span>
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @if(!isset($model) || count($model) === 0)
                        <div class="col-span-full text-center">
                            <p class="text-gray-500 text-lg">No models available at the moment.</p>
                        </div>
                    @else
                        @foreach ($model as $item)
                            <div class="mt-10 bg-white rounded-lg shadow-md overflow-hidden object-cover object-center ">
                                @if($item->Thumbnail)
                                    <img src="{{Storage::url($item->Thumbnail)}}"
                                        alt="{{ $item->name ?? 'Tumbler Model' }}" 
                                        class="w-full h-64 object-cover object-center">
                                @else
                                    <div class="w-full h-64 bg-gray-200 flex items-center justify-center">
                                        <span class="text-gray-400">No image available</span>
                                    </div>
                                @endif
                                <div class="p-6 text-center">
                                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{$item->name ?? 'Unnamed Model'}}</h3>
                                    <a href="/stanley">
                                        <button class="mt-4 w-full bg-black text-white py-2 rounded-lg hover:bg-gray-800 focus:outline-none focus:bg-gray-800">
                                            View All Items
                                        </button>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>  
        </section>
    </main>
</body>

</html>
@endsection
