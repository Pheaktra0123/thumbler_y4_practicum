@extends("TailwindCssLink.style")
@extends("Component.Nav_Dashbord")
@section('title','tumbler')
@section('contents')
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.1/dist/flowbite.min.js"></script>
</head>

<body>
    @if(session('success'))
    <div id="success-popup" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40 animate-fadeIn">
        <div class="bg-white rounded-lg shadow-lg p-8 flex flex-col items-center animate-popUp">
            <svg class="w-16 h-16 text-green-500 mb-4 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" stroke-width="2" stroke="currentColor" fill="none"/>
                <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2l4-4"/>
            </svg>
            <h2 class="text-2xl font-bold mb-2 text-green-700">Success!</h2>
            <p class="text-gray-700 mb-4">{{ session('success') }}</p>
            <button onclick="document.getElementById('success-popup').style.display='none';"
                class="mt-2 px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">OK</button>
        </div>
    </div>
    @endif

    <style>
    @keyframes popUp {
        0% { transform: scale(0.7); opacity: 0; }
        80% { transform: scale(1.05); opacity: 1; }
        100% { transform: scale(1); opacity: 1; }
    }
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    .animate-popUp { animation: popUp 0.5s cubic-bezier(.36,.07,.19,.97); }
    .animate-fadeIn { animation: fadeIn 0.3s; }
    </style>

    <main>
        <section class="mb-10">
            <div class="flex gap-2 mt-5 mx-5 justify-between mb-10">
                <h1 class="text-4xl font-bold text-sky-950 uppercase">Tumbler</h1>
            </div>
            <div class="flex justify-between item-center place-content-center px-10">
                <p class="text-lg content-center font-medium text-gray-400">All</p>
                <div class="flex">
                    <div class="relative  text-gray-500 focus-within:text-gray-900 mb-4">
                        <div class="absolute inset-y-0 left-1 flex items-center pl-3 pointer-events-none ">
                            <svg class="w-5 h-5" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.5 17.5L15.4167 15.4167M15.8333 9.16667C15.8333 5.48477 12.8486 2.5 9.16667 2.5C5.48477 2.5 2.5 5.48477 2.5 9.16667C2.5 12.8486 5.48477 15.8333 9.16667 15.8333C11.0005 15.8333 12.6614 15.0929 13.8667 13.8947C15.0814 12.6872 15.8333 11.0147 15.8333 9.16667Z" stroke="#9CA3AF" stroke-width="1.6" stroke-linecap="round" />
                                <path d="M17.5 17.5L15.4167 15.4167M15.8333 9.16667C15.8333 5.48477 12.8486 2.5 9.16667 2.5C5.48477 2.5 2.5 5.48477 2.5 9.16667C2.5 12.8486 5.48477 15.8333 9.16667 15.8333C11.0005 15.8333 12.6614 15.0929 13.8667 13.8947C15.0814 12.6872 15.8333 11.0147 15.8333 9.16667Z" stroke="black" stroke-opacity="0.2" stroke-width="1.6" stroke-linecap="round" />
                                <path d="M17.5 17.5L15.4167 15.4167M15.8333 9.16667C15.8333 5.48477 12.8486 2.5 9.16667 2.5C5.48477 2.5 2.5 5.48477 2.5 9.16667C2.5 12.8486 5.48477 15.8333 9.16667 15.8333C11.0005 15.8333 12.6614 15.0929 13.8667 13.8947C15.0814 12.6872 15.8333 11.0147 15.8333 9.16667Z" stroke="black" stroke-opacity="0.2" stroke-width="1.6" stroke-linecap="round" />
                            </svg>
                        </div>
                        <input type="text" id="default-search" class="block w-80 h-11 pr-5 pl-12 py-2.5 text-base font-normal shadow-xs  bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none text-gray-500" placeholder="Search for Categories">
                    </div>
                </div>
                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="flex place-items-center gap-2 text-white bg-blue-500 hover:bg-blue-800  focus:outline-none focus:ring-blue-300 font-normal rounded-lg text-md px-3 text-center" type="button">
                    <span class="uppercase">Tumbler</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-md font-semi-bold">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </button>
            </div>
            <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-5xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow-sm ">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t  border-gray-200">
                            <h3 class="text-4xl font-semibold text-blue-900 uppercase">
                                Create New tumbler
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center " data-modal-toggle="crud-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form class="p-4 md:p-5" action="{{ route('tumbler.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf <!-- Add CSRF token for security -->
                            <div class="grid gap-4 mb-4 grid-cols-2">
                                <div class="col-span-2">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                                    <input type="text" name="tumbler_name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type Product Name" required>
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                                    <select id="category" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                        <option selected="">Select category</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="model" class="block mb-2 text-sm font-medium text-gray-900">Model</label>
                                    <select id="model" name="model_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                        <option selected="">Select Model</option>
                                        @foreach($models as $model)
                                        <option value="{{$model->id}}">{{$model->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Price</label>
                                    <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5" placeholder="Type Price" required>
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="stock" class="block mb-2 text-sm font-medium text-gray-900">Stock</label>
                                    <input type="number" name="stock" id="stock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5" placeholder="Type Stock" required>
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="color_input" class="block mb-2 text-sm font-medium text-gray-900">Add Available Colors</label>
                                    <div class="mb-2">
                                        <div class="flex items-center space-x-3 mb-3">
                                            <div class="relative">
                                                <input type="color" id="color_picker" value="#3B82F6"
                                                    class="h-10 w-10 cursor-pointer rounded-lg border border-gray-300 p-0 shadow-sm">
                                                <div class="absolute inset-0 rounded-lg pointer-events-none border border-white"></div>
                                            </div>
                                            <div class="flex-grow">
                                                <input type="text" id="color_input" placeholder="Enter color code (e.g., #FF0000)"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                            </div>
                                            <button type="button" onclick="addColor()"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                                </svg>
                                                Add
                                            </button>
                                        </div>
                                    </div>

                                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-3">
                                        <p class="text-xs text-gray-500 mb-2">Selected colors:</p>
                                        <input type="hidden" name="colors[]" id="colors_json">
                                        <div id="color_display" class="flex flex-wrap items-center gap-2 min-h-10"></div>
                                    </div>

                                    <div class="mt-2">
                                        <p class="text-xs text-gray-500">Click on a color to remove it</p>
                                    </div>
                                </div>

                                <div class="col-span-2 sm:col-span-1">
                                    <label for="sizes_input" class="block mb-2 text-sm font-medium text-gray-900">Add Available Size</label>
                                    <div class="flex space-x-2">
                                        <input type="number" id="size_input" placeholder="Enter item size available (e.g.2l,3l)" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                        <button type="button" onclick="addSize()" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5">Add Size</button>
                                    </div>
                                    <input type="hidden" name="sizes[]" id="sizes_json">
                                    <div id="size_display" class="mt-4 flex flex-wrap items-center gap-2 text-sm justify-start item-content-center place-item-center"></div>
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="is_available" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                                    <select id="is_available" name="is_available" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                        <option selected="">In Stock</option>
                                        <option value="1">Available</option>
                                        <option value="0">sold out</option>
                                    </select>
                                </div>
                                <div class="col-span-2">
                                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Product Description</label>
                                    <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Write product description here"></textarea>
                                </div>
                                <div class="col-span-2">
                                    <label for="thumbnails" class="block mb-2 text-sm font-medium text-gray-900">Upload Product Images</label>
                                    <div class="w-full relative border-2 border-gray-300 border-dashed rounded-lg p-6 transition-all duration-300 hover:border-blue-500" id="dropzone">
                                        <input type="file" name="thumbnails[]" class="absolute inset-0 w-full h-full opacity-0 z-50 cursor-pointer" id="file-upload" multiple accept="image/*">
                                        <div class="text-center" id="upload-prompt">
                                            <div class="mx-auto flex items-center justify-center w-14 h-14 rounded-full bg-blue-50">
                                                <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>
                                            <h3 class="mt-4 text-sm font-medium text-gray-900">
                                                <label for="file-upload" class="relative cursor-pointer">
                                                    <span>Drag and drop your images</span>
                                                    <span class="text-blue-600"> or click to browse</span>
                                                </label>
                                            </h3>
                                            <p class="mt-2 text-xs text-gray-500">
                                                PNG, JPG, GIF up to 10MB each
                                            </p>
                                        </div>

                                        <div id="preview-container" class="mt-6 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4"></div>

                                        <div class="mt-4 flex justify-between items-center" id="upload-stats" style="display: none;">
                                            <div class="text-sm text-gray-500">
                                                <span id="upload-count">0</span> images selected
                                            </div>
                                            <button type="button" id="clear-uploads" class="text-sm text-red-600 hover:text-red-800">
                                                Clear all
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                </svg>
                                Add new Tumbler
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div id="modelConfirm" class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 ">
                <div class="relative top-40 mx-auto shadow-xl rounded-md bg-white max-w-md">

                    <div class="flex justify-end p-2">
                        <button onclick="closeModal('modelConfirm')" type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

        </section>
        <section>
            <div class="flex flex-col">
                <div class=" overflow-x-auto">
                    <div class="min-w-full inline-block align-middle">
                        <div class="overflow-hidden ">
                            <table class=" min-w-full rounded-xl">
                                <thead>
                                    <tr class="bg-gray-50">
                                        <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-500 capitalize rounded-t-xl">ID</th>
                                        <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-500 capitalize">Product Name</th>
                                        <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-500 capitalize">Category Name</th>
                                        <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-500 capitalize">Model Name</th>
                                        <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-500 capitalize">Price</th>
                                        <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-500 capitalize">Stock</th>
                                        <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-500 capitalize">Color Available</th>
                                        <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-500 capitalize">Size Available</th>
                                        <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-500 capitalize rounded-t-xl"> Actions </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-300 ">
                                    @foreach($tumblers as $tumbler)
                                    <tr class="bg-white transition-all duration-500 hover:bg-gray-50">
                                        <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 ">{{$tumbler->id}}</td>
                                        <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> {{$tumbler->tumbler_name}}</td>
                                        <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">{{$tumbler->category->name}}</td>
                                        <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">{{$tumbler->model->name}}</td>
                                        <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">{{$tumbler->price}}</td>
                                        <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">{{$tumbler->stock}}</td>
                                        <td class="p-5 whitespace-nowrap text-sm leading-6">
                                            <div class="flex flex-wrap gap-2">
                                                @php
                                                try {
                                                // Get the raw color data
                                                $colorsRaw = $tumbler->colors;
                                                $colors = [];

                                                // Debug the raw data
                                                // echo "<!-- Raw for tumbler {$tumbler->id}: " . htmlspecialchars(json_encode($colorsRaw)) . " -->";

                                                // Handle different formats
                                                if (is_string($colorsRaw)) {
                                                // Try to decode the JSON string
                                                $decoded = json_decode($colorsRaw, true);

                                                // If decoded successfully and it's an array
                                                if (is_array($decoded)) {
                                                foreach ($decoded as $item) {
                                                if (is_string($item)) {
                                                // Check if it's a nested JSON string
                                                if (strpos($item, '[') === 0 || strpos($item, '{') === 0) {
                                                $nestedDecoded = json_decode($item, true);
                                                if (is_array($nestedDecoded)) {
                                                foreach ($nestedDecoded as $nestedItem) {
                                                $colors[] = $nestedItem;
                                                }
                                                } else {
                                                $colors[] = $item;
                                                }
                                                } else {
                                                $colors[] = $item;
                                                }
                                                } else if (is_array($item)) {
                                                // If it's already an array, merge it
                                                $colors = array_merge($colors, $item);
                                                }
                                                }
                                                } else {
                                                // If it's not a valid JSON, try to split by comma
                                                $colors = array_map('trim', explode(',', $colorsRaw));
                                                }
                                                } else if (is_array($colorsRaw)) {
                                                // If it's already an array, use it directly
                                                $colors = $colorsRaw;
                                                }

                                                // Debug the processed colors
                                                // echo "<!-- Processed for tumbler {$tumbler->id}: " . htmlspecialchars(json_encode($colors)) . " -->";
                                                } catch (Exception $e) {
                                                // Log the error
                                                // echo "<!-- Error for tumbler {$tumbler->id}: " . $e->getMessage() . " -->";
                                                $colors = [];
                                                }
                                                @endphp

                                                @if(!empty($colors) && count($colors) > 0)
                                                @foreach($colors as $color)
                                                @php
                                                // Clean the color code - remove any extra quotes or brackets
                                                $cleanColor = is_string($color) ? trim($color, '"[]\\') : '';

                                                // If it's an RGB format like rgb(255,0,0), use it directly
                                                if (strpos($cleanColor, 'rgb') === 0) {
                                                // It's already in a valid format
                                                }
                                                // If it's a hex color without #, add it
                                                else if (!empty($cleanColor) && $cleanColor[0] !== '#' && ctype_xdigit(str_replace(' ', '', $cleanColor))) {
                                                $cleanColor = '#' . $cleanColor;
                                                }

                                                // Final check to ensure we have a valid color
                                                if (empty($cleanColor)) {
                                                $cleanColor = '#cccccc'; // Default to gray if empty
                                                }
                                                @endphp

                                                <div class="w-6 h-6 rounded-full border border-gray-300"
                                                    style="background-color: {{$cleanColor}};"
                                                    title="{{$cleanColor}}">
                                                </div>
                                                @endforeach
                                                @else
                                                <span class="text-gray-500">No colors available</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="p-5 whitespace-nowrap text-sm leading-6">
                                            <div class="flex flex-wrap gap-2">
                                                @php
                                                $sizes = json_decode($tumbler->sizes) ?? [];
                                                $sizes = is_array($sizes) ? $sizes : [];
                                                @endphp

                                                @forelse($sizes as $size)
                                                <span class="px-3 py-1 rounded-full text-xs bg-gray-100 text-gray-700 hover:bg-gray-200 transition-colors">
                                                    {{ $size }}
                                                </span>
                                                @empty
                                                <span class="text-gray-500">No sizes available</span>
                                                @endforelse
                                            </div>
                                        </td>
                                        <td class=" p-5 ">
                                            <div class="flex items-center gap-1">
                                                <button data-modal-target="edit-modal{{$tumbler->id}}" data-modal-toggle="edit-modal{{$tumbler->id}}" class="p-2  rounded-full  group transition-all duration-500  flex item-center" type="button">
                                                    <svg class="cursor-pointer" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path class="fill-indigo-500 " d="M9.53414 8.15675L8.96459 7.59496L8.96459 7.59496L9.53414 8.15675ZM13.8911 3.73968L13.3215 3.17789V3.17789L13.8911 3.73968ZM16.3154 3.75892L15.7367 4.31126L15.7367 4.31127L16.3154 3.75892ZM16.38 3.82658L16.9587 3.27423L16.9587 3.27423L16.38 3.82658ZM16.3401 6.13595L15.7803 5.56438L16.3401 6.13595ZM11.9186 10.4658L12.4784 11.0374L11.9186 10.4658ZM11.1223 10.9017L10.9404 10.1226V10.1226L11.1223 10.9017ZM9.07259 10.9951L8.52556 11.5788L8.52556 11.5788L9.07259 10.9951ZM9.09713 8.9664L9.87963 9.1328V9.1328L9.09713 8.9664ZM9.05721 10.9803L8.49542 11.5498H8.49542L9.05721 10.9803ZM17.1679 4.99458L16.368 4.98075V4.98075L17.1679 4.99458ZM15.1107 2.8693L15.1171 2.06932L15.1107 2.8693ZM9.22851 8.51246L8.52589 8.12992L8.52452 8.13247L9.22851 8.51246ZM9.22567 8.51772L8.52168 8.13773L8.5203 8.1403L9.22567 8.51772ZM11.5684 10.7654L11.9531 11.4668L11.9536 11.4666L11.5684 10.7654ZM11.5669 10.7662L11.9507 11.4681L11.9516 11.4676L11.5669 10.7662ZM11.3235 3.30005C11.7654 3.30005 12.1235 2.94188 12.1235 2.50005C12.1235 2.05822 11.7654 1.70005 11.3235 1.70005V3.30005ZM18.3 9.55887C18.3 9.11705 17.9418 8.75887 17.5 8.75887C17.0582 8.75887 16.7 9.11705 16.7 9.55887H18.3ZM3.47631 16.5237L4.042 15.9581H4.042L3.47631 16.5237ZM16.5237 16.5237L15.958 15.9581L15.958 15.9581L16.5237 16.5237ZM10.1037 8.71855L14.4606 4.30148L13.3215 3.17789L8.96459 7.59496L10.1037 8.71855ZM15.7367 4.31127L15.8013 4.37893L16.9587 3.27423L16.8941 3.20657L15.7367 4.31127ZM15.7803 5.56438L11.3589 9.89426L12.4784 11.0374L16.8998 6.70753L15.7803 5.56438ZM10.9404 10.1226C10.3417 10.2624 9.97854 10.3452 9.72166 10.3675C9.47476 10.3888 9.53559 10.3326 9.61962 10.4113L8.52556 11.5788C8.9387 11.966 9.45086 11.9969 9.85978 11.9615C10.2587 11.9269 10.7558 11.8088 11.3042 11.6807L10.9404 10.1226ZM8.31462 8.8C8.19986 9.33969 8.09269 9.83345 8.0681 10.2293C8.04264 10.6393 8.08994 11.1499 8.49542 11.5498L9.619 10.4107C9.70348 10.494 9.65043 10.5635 9.66503 10.3285C9.6805 10.0795 9.75378 9.72461 9.87963 9.1328L8.31462 8.8ZM9.61962 10.4113C9.61941 10.4111 9.6192 10.4109 9.619 10.4107L8.49542 11.5498C8.50534 11.5596 8.51539 11.5693 8.52556 11.5788L9.61962 10.4113ZM15.8013 4.37892C16.0813 4.67236 16.2351 4.83583 16.3279 4.96331C16.4073 5.07234 16.3667 5.05597 16.368 4.98075L17.9678 5.00841C17.9749 4.59682 17.805 4.27366 17.6213 4.02139C17.451 3.78756 17.2078 3.53522 16.9587
 3.27423L15.8013 4.37892ZM16.8998 6.70753C17.1578 6.45486 17.4095 6.21077 17.5876 5.98281C17.7798 5.73698 17.9607 5.41987 17.9678 5.00841L16.368 4.98075C16.3693 4.90565 16.4103 4.8909 16.327 4.99749C16.2297 5.12196 16.0703 5.28038 15.7803 5.56438L16.8998 6.70753ZM14.4606 4.30148C14.7639 3.99402 14.9352 3.82285 15.0703 3.71873C15.1866 3.62905 15.1757 3.66984 15.1044 3.66927L15.1171 2.06932C14.6874 2.06591 14.3538 2.25081 14.0935 2.45151C13.8518 2.63775 13.5925 2.9032 13.3215 3.17789L14.4606 4.30148ZM16.8941 3.20657C16.6279 2.92765 16.373 2.65804 16.1345 2.46792C15.8774 2.26298 15.5468 2.07273 15.1171 2.06932L15.1044 3.66927C15.033 3.66871 15.0226 3.62768 15.1372 3.71904C15.2704 3.82522 15.4387 3.999 15.7367 4.31126L16.8941 3.20657ZM8.96459 7.59496C8.82923 7.73218 8.64795 7.90575 8.5259 8.12993L9.93113 8.895C9.92075 8.91406 9.91465 8.91711 9.93926 8.88927C9.97002 8.85445 10.0145 8.80893 10.1037 8.71854L8.96459 7.59496ZM9.87963 9.1328C9.9059 9.00925 9.91925 8.94785 9.93124 8.90366C9.94073 8.86868 9.94137 8.87585 9.93104 8.89515L8.5203 8.1403C8.39951 8.36605 8.35444 8.61274 8.31462 8.8L9.87963 9.1328ZM8.52452 8.13247L8.52168 8.13773L9.92967 8.89772L9.9325 8.89246L8.52452 8.13247ZM11.3589 9.89426C11.27 9.98132 11.2252 10.0248 11.1909 10.055C11.1635 10.0791 11.1658 10.0738 11.1832 10.0642L11.9536 11.4666C12.1727 11.3462 12.3427 11.1703 12.4784 11.0374L11.3589 9.89426ZM11.3042 11.6807C11.4912 11.6371 11.7319 11.5878 11.9507 11.4681L11.1831 10.0643C11.2007 10.0547 11.206 10.0557 11.1697 10.0663C11.1248 10.0793 11.0628 10.0941 10.9404 10.1226L11.3042 11.6807ZM11.1837 10.064L11.1822 10.0648L11.9516 11.4676L11.9531 11.4668L11.1837 10.064ZM16.399 6.10097L13.8984 3.60094L12.7672 4.73243L15.2677 7.23246L16.399 6.10097ZM10.8333 16.7001H9.16667V18.3001H11.0003V16.7001ZM3.3 10.8334V9.16672H1.7V10.8334H3.3ZM9.16667 3.30005H11.3235V1.70005H9.16667V3.30005ZM16.7 9.55887V10.8334H18.3V9.55887H16.7ZM9.16667 16.7001C7.5727 16.7001 6.45771 16.6984 5.61569 16.5851C4.79669 16.475 4.35674 16.2728 4.042 15.9581L2.91063 17.0894C3.5722 17.751 4.40607 18.0979 5.4025 18.2013C6.89702 18.3017 7.84442 18.3 9.00031 18.3V16.7001ZM1.7 10.8334C1.7 12.3821 1.6983 13.6241 1.82917 14.5976C1.96314 15.594 2.24905 16.4279 2.91063 17.0894L4.042 15.9581C3.72726 15.6433 3.52502 15.2034 3.41491 14.3844C3.3017 13.5423 3.3 12.4273 3.3 10.8334H1.7ZM10.8333 18.3001C12.3821 18.3001 13.6241 18.3018 14.5975 18.1709C15.5939 18.0369 16.4278 17.751 17.0894 17.0894L15.958 15.9581C15.6433 16.2728 15.2033 16.475 14.3843 16.5851C13.5423 16.6984 12.4273 16.7001 11.0003 16.7001V18.3001ZM16.7 10.8334C16.7 12.4274 16.6983 13.5423 16.5851 14.3844C16.475 15.2034 16.2727 15.6433 15.958 15.9581L17.0894 17.0894C17.7509 16.4279 18.0369 15.594 18.1708 14.5976C18.3017 13.6241 18.3 12.3821 18.3 10.8334H16.7ZM3.3 9.16672C3.3 7.57275 3.3017 6.45776 3.41491 5.61574C3.52502 4.79674 3.72726 4.35679 4.042 4.04205L2.91063 2.91068C2.24905 3.57225 1.96314 4.40612 1.82917 5.40255C1.6983 6.37596 1.7 7.61798 1.7 9.16672H3.3ZM9.16667 1.70005C7.61793 1.70005 6.37591 1.69835 5.4025 1.82922C4.40607 1.96319 3.5722 2.24911 2.91063 2.91068L4.042 4.04205C4.35674 3.72731 4.79669 3.52507 5.61569 3.41496C6.45771 3.30175 7.5727 3.30005 9.16667 3.30005V1.70005Z" fill="#818CF8"></path>
                                                    </svg>
                                                </button>


                                                <a href="{{ route('Admin.delete.tumbler', $tumbler->id) }}" onclick="return confirm('Are you sure you want to delete this tumbler?');">
                                                    <button class="p-2 rounded-full group transition-all duration-500 flex item-center">
                                                        <svg class="" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path class="fill-red-600" d="M4.00031 5.49999V4.69999H3.20031V5.49999H4.00031ZM16.0003 5.49999H16.8003V4.69999H16.0003V5.49999ZM17.5003 5.49999L17.5003 6.29999C17.9421 6.29999 18.3003 5.94183 18.3003 5.5C18.3003 5.05817 17.9421 4.7 17.5003 4.69999L17.5003 5.49999ZM9.30029 9.24997C9.30029 8.80814 8.94212 8.44997 8.50029 8.44997C8.05847 8.44997 7.70029 8.80814 7.70029 9.24997H9.30029ZM7.70029 13.75C7.70029 14.1918 8.05847 14.55 8.50029 14.55C8.94212 14.55 9.30029 14.1918 9.30029 13.75H7.70029ZM12.3004 9.24997C12.3004 8.80814 11.9422 8.44997 11.5004 8.44997C11.0585 8.44997 10.7004 8.80814 10.7004 9.24997H12.3004ZM10.7004 13.75C10.7004 14.1918 11.0585 14.55 11.5004 14.55C11.9422 14.55 12.3004 14.1918 12.3004 13.75H10.7004ZM4.00031 6.29999H16.0003V4.69999H4.00031V6.29999ZM15.2003 5.49999V12.5H16.8003V5.49999H15.2003ZM11.0003 16.7H9.00031V18.3H11.0003V16.7ZM4.80031 12.5V5.49999H3.20031V12.5H4.80031ZM9.00031 16.7C7.79918 16.7 6.97882 16.6983 6.36373 16.6156C5.77165 16.536 5.49093 16.3948 5.29823 16.2021L4.16686 17.3334C4.70639 17.873 5.38104 18.0979 6.15053 18.2013C6.89702 18.3017 7.84442 18.3 9.00031 18.3V16.7001ZM3.20031 12.5C3.20031 13.6559 3.19861 14.6033 3.29897 15.3498C3.40243 16.1193 3.62733 16.7939 4.16686 17.3334L5.29823 16.2021C5.10553 16.0094 4.96431 15.7286 4.88471 15.1366C4.80201 14.5215 4.80031 13.7011 4.80031 12.5H3.20031ZM15.2003 12.5C15.2003 13.7011 15.1986 14.5215 15.1159 15.1366C15.0363 15.7286 14.8951 16.0094 14.7024 16.2021L15.8338 17.3334C16.3733 16.7939 16.5982 16.1193 16.7016 15.3498C16.802 14.6033 16.8003 13.6559 16.8003 12.5H15.2003ZM11.0003 18.3C12.1562 18.3 13.1036 18.3017 13.8501 18.2013C14.6196 18.0979 15.2942 17.873 15.8338 17.3334L14.7024 16.2021C14.5097 16.3948 14.229 16.536 13.6369 16.6156C13.0218 16.6983 12.2014 16.7 11.0003 16.7V18.3Z" fill="#F87171"></path>
                                                        </svg>
                                                    </button>
                                                </a>
                                                <button class="p-2 rounded-full  group transition-all duration-500  flex item-center">
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path class="stroke-black " d="M10.0161 14.9897V15.0397M10.0161 9.97598V10.026M10.0161 4.96231V5.01231" stroke="black" stroke-width="2.5" stroke-linecap="round"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div id="edit-modal{{$tumbler->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative p-4 w-full max-w-5xl max-h-full">
                                                    <!-- Modal content -->
                                                    <div class="relative bg-white rounded-lg shadow">
                                                        <!-- Modal header -->
                                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                                            <h3 class="text-lg font-semibold text-gray-900">Update Model</h3>
                                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="edit-modal{{$tumbler->id}}">
                                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                </svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                        </div>
                                                        <!-- Modal body -->
                                                        <form class="p-4 md:p-5" method="POST" action="{{ route('update.tumbler', $tumbler->id) }}" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="grid gap-4 mb-4 grid-cols-2">
                                                                <div class="col-span-2">
                                                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                                                                    <input type="text" name="title" id="edit_name_{{$tumbler->id}}" value="{{ $tumbler->tumbler_name}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type model name" required>
                                                                </div>
                                                                <div class="col-span-2 sm:col-span-1">
                                                                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                                                                    <select id="edit_category_{{$tumbler->id}}" name="categories_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                                                        @foreach($categories as $category)
                                                                        <option value="{{ $category->id }}" {{ $tumbler->category_id == $category->id ? 'selected' : '' }}>
                                                                            {{ $category->name }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-span-2 sm:col-span-1">
                                                                    <label for="model" class="block mb-2 text-sm font-medium text-gray-900">Model</label>
                                                                    <select id="edit_model_{{$tumbler->id}}" name="model_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                                                        @foreach($models as $model)
                                                                        <option value="{{ $model->id }}" {{ $tumbler->model_id == $model->id ? 'selected' : '' }}>
                                                                            {{ $model->name }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-span-2 sm:col-span-1">
                                                                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Price</label>
                                                                    <input type="text" name="price" id="edit_price_{{$tumbler->id}}" value="{{ $tumbler->price}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type price" required>
                                                                </div>
                                                                <div class="col-span-2 sm:col-span-1">
                                                                    <label for="stock" class="block mb-2 text-sm font-medium text-gray-900">Stock</label>
                                                                    <input type="text" name="stock" id="edit_stock_{{$tumbler->id}}" value="{{ $tumbler->stock}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type stock" required>
                                                                </div>
                                                                <div class="col-span-2 sm:col-span-1">
                                                                    <label class="block mb-2 text-sm font-medium text-gray-900">Edit/Add Colors</label>
                                                                    <div class="mb-2 flex items-center space-x-3">
                                                                        <input type="color" id="edit_color_picker_{{$tumbler->id}}" value="#3B82F6" class="h-10 w-10 cursor-pointer rounded-lg border border-gray-300 p-0 shadow-sm">
                                                                        <input type="text" id="edit_color_input_{{$tumbler->id}}" placeholder="Enter color code (e.g., #FF0000)" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-32 p-2.5">
                                                                        <button type="button" onclick="addEditColor({{$tumbler->id}})" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 flex items-center">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                                                            </svg>
                                                                            Add
                                                                        </button>
                                                                    </div>
                                                                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-3">
                                                                        <p class="text-xs text-gray-500 mb-2">Selected colors:</p>
                                                                        <input type="hidden" name="colors" id="edit_colors_json_{{$tumbler->id}}">
                                                                        <div id="edit_color_display_{{$tumbler->id}}" class="flex flex-wrap items-center gap-2 min-h-10"></div>
                                                                    </div>
                                                                    <div class="mt-2">
                                                                        <p class="text-xs text-gray-500">Click on a color to remove it</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-span-2 sm:col-span-1">
                                                                    <label class="block mb-2 text-sm font-medium text-gray-900">Edit/Add Sizes</label>
                                                                    <div class="flex space-x-2 mb-2">
                                                                        <input type="text" id="edit_size_input_{{$tumbler->id}}" placeholder="Enter size (e.g. 2L, 3L)" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-32 p-2.5">
                                                                        <button type="button" onclick="addEditSize({{$tumbler->id}})" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5">Add Size</button>
                                                                    </div>
                                                                    <input type="hidden" name="sizes" id="edit_sizes_json_{{$tumbler->id}}">
                                                                    <div id="edit_size_display_{{$tumbler->id}}" class="flex flex-wrap items-center gap-2 min-h-10"></div>
                                                                    <div class="mt-2 text-xs text-gray-500">Enter sizes separated by commas (e.g., 2L,3L,4L)</div>
                                                                </div>
                                                                <div class="col-span-2">
                                                                    <label for="thumbnail" class="block mb-2 text-sm font-medium">Change Model Image</label>
                                                                    <div class="w-[370px] relative border-2 border-gray-300 border-dashed rounded-lg p-6">
                                                                        <input type="file" name="thumbnail" class="absolute inset-0 w-full h-full opacity-0 z-50" id="edit_file_upload_{{$tumbler->id}}">
                                                                        <div class="text-center">
                                                                            <img id="edit_preview_img_{{$tumbler->id}}" class="mx-auto h-24 w-24" src="{{ Storage::url($tumbler->Thumbnail ?? $model->Thumbnail) }}" alt="Current Thumbnail">
                                                                            <h3 class="mt-2 text-sm font-medium text-gray-900">
                                                                                <label for="edit_file_upload_{{$tumbler->id}}" class="relative cursor-pointer">
                                                                                    <span>Drag and drop</span>
                                                                                    <span class="text-indigo-600"> or browse</span>
                                                                                    <span>to upload</span>
                                                                                </label>
                                                                            </h3>
                                                                            <p class="mt-1 text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button type="submit" class="text-white mt-5 inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                                Update
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>
<script>
    // Enhanced file upload handling with proper browser compatibility
    document.addEventListener('DOMContentLoaded', function() {
        const dropzone = document.getElementById('dropzone');
        const fileUpload = document.getElementById('file-upload');
        const previewContainer = document.getElementById('preview-container');
        const uploadPrompt = document.getElementById('upload-prompt');
        const uploadStats = document.getElementById('upload-stats');
        const uploadCount = document.getElementById('upload-count');
        const clearUploads = document.getElementById('clear-uploads');

        if (!dropzone || !fileUpload) return; // Exit if elements don't exist

        // Track selected files
        let selectedFiles = [];

        // Handle drag events
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropzone.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        // Highlight dropzone when dragging files over it
        ['dragenter', 'dragover'].forEach(eventName => {
            dropzone.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropzone.addEventListener(eventName, unhighlight, false);
        });

        function highlight() {
            dropzone.classList.add('border-blue-500', 'bg-blue-50');
        }

        function unhighlight() {
            dropzone.classList.remove('border-blue-500', 'bg-blue-50');
        }

        // Handle dropped files
        dropzone.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            handleFiles(files);
        }

        // Handle selected files from file input
        fileUpload.addEventListener('change', function() {
            handleFiles(this.files);
        });

        // Process the files
        function handleFiles(files) {
            if (!files.length) return;

            // Convert FileList to Array and filter for images
            const newFiles = Array.from(files).filter(file => file.type.startsWith('image/'));

            // Add new files to our tracked files
            selectedFiles = [...selectedFiles, ...newFiles];

            // Update UI
            updatePreviews();
        }

        // Update the preview area with thumbnails
        function updatePreviews() {
            // Clear existing previews
            previewContainer.innerHTML = '';

            // Show/hide elements based on if we have files
            if (selectedFiles.length > 0) {
                uploadPrompt.style.display = 'none';
                uploadStats.style.display = 'flex';
                uploadCount.textContent = selectedFiles.length;
            } else {
                uploadPrompt.style.display = 'block';
                uploadStats.style.display = 'none';
            }

            // Create preview for each file
            selectedFiles.forEach((file, index) => {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const preview = document.createElement('div');
                    preview.className = 'relative group';

                    // Create the image preview
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'h-24 w-full object-cover rounded-lg shadow-sm';
                    img.alt = file.name;

                    // Create the remove button
                    const removeBtn = document.createElement('button');
                    removeBtn.className = 'absolute top-1 right-1 bg-white rounded-full p-1 shadow-md opacity-0 group-hover:opacity-100 transition-opacity duration-200';
                    removeBtn.innerHTML = '<svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>';
                    removeBtn.title = 'Remove image';

                    // Add click handler to remove this file
                    removeBtn.addEventListener('click', function(e) {
                        e.preventDefault(); // Prevent form submission
                        selectedFiles.splice(index, 1);
                        updatePreviews();
                        updateFormFiles(); // Update the form files when a file is removed
                    });

                    // Create the file name label
                    const label = document.createElement('div');
                    label.className = 'mt-1 text-xs text-gray-500 truncate';
                    label.textContent = file.name;

                    // Assemble the preview
                    preview.appendChild(img);
                    preview.appendChild(removeBtn);
                    preview.appendChild(label);
                    previewContainer.appendChild(preview);
                };

                reader.readAsDataURL(file);
            });
        }

        // Clear all selected files
        if (clearUploads) {
            clearUploads.addEventListener('click', function(e) {
                e.preventDefault(); // Prevent form submission
                selectedFiles = [];
                fileUpload.value = ''; // Reset the file input
                updatePreviews();
                updateFormFiles(); // Update the form files when all files are cleared
            });
        }

        // Handle form submission
        const form = dropzone.closest('form');
        if (form) {
            form.addEventListener('submit', function(e) {
                // No need to prevent default - the files are already attached to the input
                // Just ensure the file input has all the selected files
                updateFormFiles();
            });
        }
    });

    var dropzone = document.getElementById('dropzone');
    dropzone.addEventListener('dragover', e => {
        e.preventDefault();
        dropzone.classList.add('border-indigo-600');
    });

    dropzone.addEventListener('dragleave', e => {
        e.preventDefault();
        dropzone.classList.remove('border-indigo-600');
    });

    dropzone.addEventListener('drop', e => {
        e.preventDefault();
        dropzone.classList.remove('border-indigo-600');
        var files = e.dataTransfer.files;
        displayPreviews(files);
    });

    var input = document.getElementById('file-upload');

    input.addEventListener('change', e => {
        var files = e.target.files;
        displayPreviews(files);
    });

    function displayPreviews(files) {
        var previewContainer = document.getElementById('preview-container');
        previewContainer.innerHTML = ''; // Clear previous previews

        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = () => {
                var img = document.createElement('img');
                img.src = reader.result;
                img.classList.add('max-h-40', 'mx-auto', 'mt-2');
                previewContainer.appendChild(img);
            };
        }
    }

    function isValidColor(color) {
        // Check for HEX color format (#FFFFFF or #FFF)
        const hexRegex = /^#([0-9A-F]{3}){1,2}$/i;
        // Check for RGB color format (rgb(255, 255, 255))
        const rgbRegex = /^rgb\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*\)$/i;

        return hexRegex.test(color) || rgbRegex.test(color);
    }

    function addColor() {
        // Get the elements from the current context
        const colorInput = document.getElementById('color_input');
        const colorDisplay = document.getElementById('color_display');
        const colorsJson = document.getElementById('colors_json');
        const colorPicker = document.getElementById('color_picker');

        // If we're in an edit modal, we need to find the specific elements
        let modalId = null;
        if (document.activeElement) {
            const modal = document.activeElement.closest('[id^="edit-modal"]');
            if (modal) {
                modalId = modal.id.replace('edit-modal', '');
                // Use the specific elements for this modal
                const modalColorInput = document.getElementById(`edit_color_input_${modalId}`);
                const modalColorPicker = document.getElementById(`edit_color_picker_${modalId}`);
                if (modalColorInput && modalColorPicker) {
                    // We're in an edit modal, use these elements instead
                    colorInput = modalColorInput;
                    colorPicker = modalColorPicker;
                    // Find the color display in this modal
                    const modalColorDisplay = modal.querySelector('[id^="edit_color_display_"]');
                    if (modalColorDisplay) {
                        colorDisplay = modalColorDisplay;
                    }
                    // Find the hidden input in this modal
                    const modalColorsJson = modal.querySelector('[id^="edit_colors_json_"]');
                    if (modalColorsJson) {
                        colorsJson = modalColorsJson;
                    }
                }
            }
        }

        const color = colorInput.value || colorPicker.value; // Use input text or picker value

        if (color && isValidColor(color)) {
            // Create color circle display with animation
            const colorElement = document.createElement('div');
            colorElement.className = 'w-10 h-10 rounded-lg border border-gray-300 relative group cursor-pointer transition-all duration-200 transform hover:scale-110 hover:shadow-md';
            colorElement.style.backgroundColor = color;
            colorElement.title = color;

            // Add a subtle checkmark overlay
            const overlay = document.createElement('div');
            overlay.className = 'absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-200';
            overlay.innerHTML = '<svg class="w-5 h-5 text-white drop-shadow-md" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>';

            colorElement.appendChild(overlay);

            // Add click event to remove the color
            colorElement.addEventListener('click', function() {
                // Add a fade-out animation
                this.classList.add('scale-0', 'opacity-0');
                setTimeout(() => {
                    this.remove();
                    updateColorsJson();
                }, 200);
            });

            // Add a fade-in animation
            colorElement.style.opacity = '0';
            colorElement.style.transform = 'scale(0.8)';
            colorDisplay.appendChild(colorElement);

            // Trigger animation
            setTimeout(() => {
                colorElement.style.opacity = '1';
                colorElement.style.transform = 'scale(1)';
            }, 10);

            // Update hidden input with JSON array
            updateColorsJson();

            // Reset input with animation
            colorInput.value = '';
            colorInput.style.backgroundColor = 'rgba(59, 130, 246, 0.1)';
            setTimeout(() => {
                colorInput.style.backgroundColor = '';
            }, 300);

            // Flash the color picker to indicate success
            const originalColor = colorPicker.value;
            colorPicker.value = '#3B82F6';
            setTimeout(() => {
                colorPicker.value = originalColor;
            }, 300);
        } else if (color) {
            // Shake animation for invalid color
            colorInput.classList.add('animate-shake');
            setTimeout(() => {
                colorInput.classList.remove('animate-shake');
            }, 500);
        }

        function updateColorsJson() {
            const colorElements = colorDisplay.querySelectorAll('div[style^="background-color"]');
            const colors = Array.from(colorElements).map(el => el.style.backgroundColor);
            colorsJson.value = JSON.stringify(colors);

            // Show/hide the "no colors" message
            if (colors.length === 0) {
                const noColorsMsg = document.createElement('p');
                noColorsMsg.className = 'text-sm text-gray-400 italic';
                noColorsMsg.textContent = 'No colors added yet';
                colorDisplay.appendChild(noColorsMsg);
            } else {
                const existingMsg = colorDisplay.querySelector('p.text-gray-400');
                if (existingMsg) existingMsg.remove();
            }
        }

        // Initialize with empty state if needed
        if (colorDisplay.children.length === 0) {
            updateColorsJson();
        }
    }

    function addSize() {
        const sizeInput = document.getElementById('size_input');
        const sizeDisplay = document.getElementById('size_display');
        const sizesJson = document.getElementById('sizes_json');

        const size = sizeInput.value;
        if (size) {
            const sizeElement = document.createElement('div');
            sizeElement.className = 'p-2 rounded bg-gray-200';
            sizeElement.innerText = size;
            sizeDisplay.appendChild(sizeElement);

            // Update hidden input with JSON array
            const sizes = sizesJson.value ? JSON.parse(sizesJson.value) : [];
            sizes.push(size);
            sizesJson.value = JSON.stringify(sizes);

            sizeInput.value = '';
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const colorPicker = document.getElementById('color_picker');
        const colorInput = document.getElementById('color_input');

        // Update text input when color picker changes with visual feedback
        colorPicker.addEventListener('input', function() {
            colorInput.value = this.value;
            colorInput.style.borderColor = this.value;
            setTimeout(() => {
                colorInput.style.borderColor = '';
            }, 500);
        });

        // Update color picker when text input changes (if valid color)
        colorInput.addEventListener('input', function() {
            if (isValidColor(this.value)) {
                colorPicker.value = this.value;
                this.style.borderColor = this.value;
            } else {
                this.style.borderColor = '';
            }
        });

        // Add keypress event to allow adding color with Enter key
        colorInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                addColor();
            }
        });

        // Initialize the color display
        const colorDisplay = document.getElementById('color_display');
        if (colorDisplay.children.length === 0) {
            const noColorsMsg = document.createElement('p');
            noColorsMsg.className = 'text-sm text-gray-400 italic';
            noColorsMsg.textContent = 'No colors added yet';
            colorDisplay.appendChild(noColorsMsg);
        }

        // Add this CSS for the shake animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes shake {
                0%, 100% { transform: translateX(0); }
                10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
                20%, 40%, 60%, 80% { transform: translateX(5px); }
            }
            .animate-shake {
                animation: shake 0.5s cubic-bezier(.36,.07,.19,.97) both;
            }
        `;
        document.head.appendChild(style);
    });

// --- Add this script after your main script section or at the bottom of the file ---

// Helper: Convert color to hex if needed
function toHexColor(color) {
    if (!color) return '';
    if (color.startsWith('#')) return color;
    // Try to convert rgb to hex
    if (color.startsWith('rgb')) {
        let rgb = color.match(/\d+/g);
        if (rgb && rgb.length === 3) {
            return "#" + rgb.map(x => ("0" + parseInt(x).toString(16)).slice(-2)).join('');
        }
    }
    return color;
}

// --- Color Edit Logic ---
window.addEditColor = function(id) {
    const colorInput = document.getElementById('edit_color_input_' + id);
    const colorPicker = document.getElementById('edit_color_picker_' + id);
    const colorDisplay = document.getElementById('edit_color_display_' + id);
    const colorsJson = document.getElementById('edit_colors_json_' + id);

    let color = colorInput.value || colorPicker.value;
    color = toHexColor(color);

    if (!color) return;

    // Prevent duplicate
    let currentColors = [];
    try { currentColors = JSON.parse(colorsJson.value); } catch {}
    if (currentColors.includes(color)) return;

    // Create color element
    const colorElement = document.createElement('div');
    colorElement.className = 'w-10 h-10 rounded-lg border border-gray-300 relative group cursor-pointer transition-all duration-200 transform hover:scale-110 hover:shadow-md';
    colorElement.style.backgroundColor = color;
    colorElement.title = color;
    colorElement.onclick = function() {
        colorElement.remove();
        updateEditColorsJson(id);
    };
    colorDisplay.appendChild(colorElement);

    updateEditColorsJson(id);

    colorInput.value = '';
};

window.updateEditColorsJson = function(id) {
    const colorDisplay = document.getElementById('edit_color_display_' + id);
    const colorsJson = document.getElementById('edit_colors_json_' + id);
    const colors = [];
    colorDisplay.querySelectorAll('div[style^="background-color"]').forEach(el => {
        colors.push(toHexColor(el.style.backgroundColor));
    });
    colorsJson.value = JSON.stringify(colors);
};

// --- Size Edit Logic ---
window.addEditSize = function(id) {
    const sizeInput = document.getElementById('edit_size_input_' + id);
    const sizeDisplay = document.getElementById('edit_size_display_' + id);
    const sizesJson = document.getElementById('edit_sizes_json_' + id);

    let size = sizeInput.value.trim();
    if (!size) return;

    // Prevent duplicate
    let currentSizes = [];
    try { currentSizes = JSON.parse(sizesJson.value); } catch {}
    if (currentSizes.includes(size)) return;

    // Create size element
    const sizeElement = document.createElement('span');
    sizeElement.className = 'px-3 py-1 rounded-full text-xs bg-gray-100 text-gray-700 hover:bg-gray-200 transition-colors cursor-pointer';
    sizeElement.innerText = size;
    sizeElement.onclick = function() {
        sizeElement.remove();
        updateEditSizesJson(id);
    };
    sizeDisplay.appendChild(sizeElement);

    updateEditSizesJson(id);

    sizeInput.value = '';
};

window.updateEditSizesJson = function(id) {
    const sizeDisplay = document.getElementById('edit_size_display_' + id);
    const sizesJson = document.getElementById('edit_sizes_json_' + id);
    const sizes = [];
    sizeDisplay.querySelectorAll('span').forEach(el => {
        sizes.push(el.innerText);
    });
    sizesJson.value = JSON.stringify(sizes);
};

// --- Image Preview Logic ---
document.querySelectorAll('input[type="file"][id^="edit_file_upload_"]').forEach(input => {
    input.addEventListener('change', function(e) {
        const id = this.id.replace('edit_file_upload_', '');
        const preview = document.getElementById('edit_preview_img_' + id);
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function(ev) {
                preview.src = ev.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        }
    });
});

// --- Initialize edit modals with current colors and sizes ---
document.addEventListener('DOMContentLoaded', function() {
    @foreach($tumblers as $tumbler)
        // Colors
        (function() {
            const id = {{ $tumbler->id }};
            const colorDisplay = document.getElementById('edit_color_display_' + id);
            const colorsJson = document.getElementById('edit_colors_json_' + id);
            let colors = [];
            @php
                $colorsRaw = $tumbler->colors;
                $colors = [];
                if (is_string($colorsRaw)) {
                    $decoded = json_decode($colorsRaw, true);
                    if (is_array($decoded)) {
                        foreach ($decoded as $item) {
                            if (is_string($item)) {
                                if (strpos($item, '[') === 0 || strpos($item, '{') === 0) {
                                    $nestedDecoded = json_decode($item, true);
                                    if (is_array($nestedDecoded)) {
                                        foreach ($nestedDecoded as $nestedItem) {
                                            $colors[] = $nestedItem;
                                        }
                                    } else {
                                        $colors[] = $item;
                                    }
                                } else {
                                    $colors[] = $item;
                                }
                            } else if (is_array($item)) {
                                $colors = array_merge($colors, $item);
                            }
                        }
                    }
                }
            @endphp
            colors = @json($colors);
            colorDisplay.innerHTML = '';
            colors.forEach(function(color) {
                color = toHexColor(color);
                const colorElement = document.createElement('div');
                colorElement.className = 'w-10 h-10 rounded-lg border border-gray-300 relative group cursor-pointer transition-all duration-200 transform hover:scale-110 hover:shadow-md';
                colorElement.style.backgroundColor = color;
                colorElement.title = color;
                colorElement.onclick = function() {
                    colorElement.remove();
                    updateEditColorsJson(id);
                };
                colorDisplay.appendChild(colorElement);
            });
            colorsJson.value = JSON.stringify(colors.map(toHexColor));
        })();

        // Sizes
        (function() {
            const id = {{ $tumbler->id }};
            const sizeDisplay = document.getElementById('edit_size_display_' + id);
            const sizesJson = document.getElementById('edit_sizes_json_' + id);
            let sizes = [];
            @php
                $sizesRaw = $tumbler->sizes;
                $sizes = [];
                if (is_string($sizesRaw)) {
                    $decoded = json_decode($sizesRaw, true);
                    if (is_array($decoded)) {
                        $sizes = $decoded;
                    }
                }
            @endphp
            sizes = @json($sizes);
            sizeDisplay.innerHTML = '';
            sizes.forEach(function(size) {
                const sizeElement = document.createElement('span');
                sizeElement.className = 'px-3 py-1 rounded-full text-xs bg-gray-100 text-gray-700 hover:bg-gray-200 transition-colors cursor-pointer';
                sizeElement.innerText = size;
                sizeElement.onclick = function() {
                    sizeElement.remove();
                    updateEditSizesJson(id);
                };
                sizeDisplay.appendChild(sizeElement);
            });
            sizesJson.value = JSON.stringify(sizes);
        })();
    @endforeach
});
</script>
@endsection