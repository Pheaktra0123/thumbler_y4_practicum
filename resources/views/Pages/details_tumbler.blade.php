@extends('Component.header')
@include('TailwindCssLink.style')

@section('title', 'details_tumbler')

@section('contents')

<main>
    <style>
        .flex.gap-4 {
            display: flex;
            flex-direction: column;
            /* Stack buttons vertically */
            gap: 1rem;
            /* Add spacing between buttons */
        }

        .bg-white.p-6.shadow-lg {
            margin-bottom: 0 !important;
            padding-bottom: 0 !important;
        }
    </style>
    <!-- Product Section -->
    <div class=" py-0 mt-24 mx-auto lg:mt-48 md:mt-40 p-10">
        <div class=" mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row -mx-4">
                <div class=" md:flex-1 px-4">
                    <div class="h-[480px] flex items-center justify-center rounded-lg mb-4">
                        @if(!empty($tumbler->thumbnails))
                            <div id="image-carousel" class="relative w-full ">
                                <!-- Carousel wrapper -->
                                <div class="relative  overflow-hidden rounded-lg">
                                    @foreach($tumbler->thumbnails as $index => $thumbnail)
                                        <div class="{{ $index === 0 ? 'block' : 'hidden' }} duration-700 ease-in-out"
                                            data-carousel-item>
                                            <img class="w-full max-auto object-cover rounded-lg"
                                                src="{{ asset('storage/' . $thumbnail) }}" alt="Tumbler Image {{ $index + 1 }}">
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Slider controls -->
                                <button type="button"
                                    class="absolute top-1/2 left-0 z-30 flex items-center justify-center w-10 h-10 bg-gray-200/50 rounded-full hover:bg-gray-300 focus:outline-none transition"
                                    data-carousel-prev>
                                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                </button>
                                <button type="button"
                                    class="absolute top-1/2 right-0 z-30 flex items-center justify-center w-10 h-10 bg-gray-200/50 rounded-full hover:bg-gray-300 focus:outline-none transition"
                                    data-carousel-next>
                                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </button>
                            </div>
                        @else
                            <img class="w-100 h-100 mx-auto object-cover rounded-lg product-image"
                                src="{{ asset('images/default-placeholder.png') }}" alt="Default Image">
                        @endif
                    </div>
                </div>
                <div class="w-1/2 px-4 content-center">
                    <h2 class="text-5xl font-bold text-gray-800 text-gray-200 mb-4">
                        {{ $tumbler->tumbler_name }} | @php
                        $sizes = json_decode($tumbler->sizes, true);
                        if (is_array($sizes) && !empty($sizes)) {
                        // Clean and format the first size
                        $firstSize = trim(str_replace(['"', '[', ']'], '', $sizes[0]));
                        echo $firstSize;
                        } else {
                        echo 'N/A';
                        }
                        @endphp OZ
                    </h2>
                    <div class="flex items-center mt-2">
                        <span class="text-black-500 text-2xl">★★★★★</span>
                        <span class="text-gray-600 ml-2 text-2xl">3.9 out of 5 stars</span>
                    </div>
                    <div class="flex mb-4 mt-5">
                        <div>
                            <span class="font-bold text-gray-700 text-gray-300 text-xl">Availability:</span>
                            <span
                                class="text-gray-600 text-gray-300">{{$tumbler->is_available ? "In Stock" : "Out Stock"}}</span>
                        </div>
                    </div>
                    <p id="price" class="text-black text-black font-bold text-2xl mt-2">Price : {{$tumbler->price}}$</p>
                    <div class="flex items-center mb-4 mt-5">
                        <span class="mt-2 px-2 py-1 text-xl text-gray-700 text-gray-300">Qty</span>
                        <button id="decrement"
                            class="border w-10 h-10 flex items-center justify-center rounded-full bg-black text-white text-sm">-</button>
                        <span id="quantity" class="mx-7 text-2xl text-gray-700 text-gray-300">1</span>
                        <button id="increment"
                            class="border w-10 h-10 flex items-center justify-center rounded-full bg-black text-white text-sm">+</button>
                    </div>

                    <div class="mb-4">
                        <span class="font-bold text-gray-700 text-gray-300 text-xl">Select Color</span>
                        <div class="flex gap-2 mt-2">
                            @forelse($tumbler->colors as $color)
                                <button class="color-btn w-8 h-8 rounded-full" style="background-color: {{ $color }}"
                                    data-color="{{ $color }}">
                                </button>
                            @empty
                                <span class="text-gray-500">No colors available</span>
                            @endforelse
                        </div>
                    </div>

                    <div class="flex gap-4 mb-4 w-full">
                        @if($tumbler->is_available)
                            <button
                                class="flex-1 bg-gray-900 bg-gray-600 text-white py-3 px-6 rounded-2xl font-bold hover:bg-gray-800 hover:bg-gray-700">
                                Add to Cart
                            </button>
                            <button id="customizeButton"
                                class="flex-1 text-gray-800 py-3 px-6 rounded-2xl font-bold hover:bg-gray-300 border border-gray-500">
                                Customize
                            </button>
                        @else
                            <button class="flex-1 bg-gray-400 text-white py-3 px-6 rounded-2xl font-bold cursor-not-allowed"
                                disabled>
                                Out of Stock
                            </button>
                            <button id="customizeButton"
                                class="flex-1 text-gray-400 py-3 px-6 rounded-2xl font-bold border border-gray-300 cursor-not-allowed"
                                disabled>
                                Customize
                            </button>
                        @endif
                    </div>

                </div>
            </div>
        </div>

        <!-- Product Details -->
        <div class=" p-6 w-full mx-auto mt-24">
            <div class="max-w-7xl px-4 sm:px-6 lg:px-8">
                <h2 class="text-2xl font-bold text-gray-900">Details & Specifications</h2>
                <div class="flex flex-col md:flex-row justify-between items-start">
                    <div class="flex-1">
                        <p class="text-gray-700 mt-2 italic">
                            A band of iridescent shimmer defines the new Black Chroma Collection. The sleek prism effect
                            makes
                            each piece unique and adds a hint of sparkle next to the powdercoat matte finish.
                        </p>
                        <p class="text-gray-700 mt-2">
                            The 40-ounce Quencher H2.0 FlowState™ Tumbler in Black Chroma elevates everyday hydration.
                            Made with
                            recycled stainless steel, the 3-position lid and reusable straw provide sustainable sips.
                            Keeping
                            water ice cold for 2 days, double-wall vacuum insulation gives long-lasting hydration that
                            matches
                            your style.
                        </p>
                        <p class="text-gray-700 mt-2 text-sm">*Each item is unique. Iridescent color may vary. Maximum
                            of 2
                            units allowed per order.</p>

                        <h3 class="text-lg font-bold mt-4 text-gray-900">Specifications:</h3>
                        <ul class="list-disc pl-6 mt-2 text-gray-700">
                            <li>18/8 recycled stainless steel, BPA-free</li>
                            <li>Double-wall vacuum insulation</li>
                            <li>Chromatic base layer finish</li>
                            <li>FlowState™ screw-on 3-position lid</li>
                            <li>Reusable straw</li>
                            <li>Comfort-grip handle</li>
                            <li>Car cup holder compatible (base diameter: 3.1 inches)</li>
                            <li>Dishwasher safe</li>
                        </ul>
                        <p class="mt-4 text-gray-700"><strong>Weight:</strong> 1.18 lb.</p>
                        <p class="text-gray-700"><strong>Dimensions:</strong> 3.54 × 5.43 × 11.02 in.</p>
                    </div>
                    <!-- Move Image to the Right & Push It Down -->
                    <div class="h-[270px] w-[200px] flex items-center justify-center rounded-lg   ml-auto mt-44">
                        <div id="image-carousel-bottom" class="relative w-full">
                            <div class="relative overflow-hidden rounded-lg">
                                @foreach($tumbler->thumbnails as $index => $thumbnail)
                                    <div class="{{ $index === 0 ? 'block' : 'hidden' }} duration-700 ease-in-out"
                                        data-carousel-item-bottom>
                                        <img class="w-fit min-h-fit max-auto object-cover rounded-lg"
                                            src="{{ asset('storage/' . $thumbnail) }}" alt="Tumbler Image {{ $index + 1 }}">
                                    </div>
                                @endforeach
                            </div>

                            <button type="button"
                                class="absolute top-1/2 left-0 z-30 flex items-center justify-center w-10 h-10 bg-gray-200/50 rounded-full hover:bg-gray-300 focus:outline-none transition"
                                data-carousel-prev-bottom>
                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </button>
                            <button type="button"
                                class="absolute top-1/2 right-0 z-30 flex items-center justify-center w-10 h-10 bg-gray-200/50 rounded-full hover:bg-gray-300 focus:outline-none transition"
                                data-carousel-next-bottom>
                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</main>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let quantity = 1;
        const quantityDisplay = document.getElementById("quantity");
        const decrementBtn = document.getElementById("decrement");
        const incrementBtn = document.getElementById("increment");
        const priceDisplay = document.getElementById("price");
        const productImage = document.querySelector(".product-image");

        // Correctly parse the numeric part of the price
        const basePrice = parseFloat(priceDisplay.textContent.replace(/[^\d.]/g, ''));

        function updatePriceAndQty() {
            const totalPrice = (basePrice * quantity).toFixed(2);
            priceDisplay.textContent = `Price : ${totalPrice}$`;
            quantityDisplay.textContent = quantity;
        }

        incrementBtn.addEventListener("click", () => {
            quantity++;
            updatePriceAndQty();
        });

        decrementBtn.addEventListener("click", () => {
            if (quantity > 1) {
                quantity--;
                updatePriceAndQty();
            }
        });

        // Mapping colors to image sources
        const colorImageMap = {
            "gray": "1.png",
            "red": "2.png",
            "blue": "3.png",
            "pink": "3.png",
            "black": "1.png"
        };


        // Handle color selection
        const colorButtons = document.querySelectorAll(".color-btn");

        function selectColor(button) {
            // Remove border from all buttons
            colorButtons.forEach(btn => btn.classList.remove("border-4", "border-gray-400"));

            // Add border to the selected button
            button.classList.add("border-4", "border-gray-400");

            // Change product image based on selected color
            const selectedColor = button.getAttribute("data-color");
            if (colorImageMap[selectedColor]) {
                productImage.src = colorImageMap[selectedColor];
            }
        }

        // Auto-select the first color button on page load
        if (colorButtons.length > 0) {
            selectColor(colorButtons[0]);
        }

        // Add event listener to each color button
        colorButtons.forEach(button => {
            button.addEventListener("click", function () {
                selectColor(this);
            });
        });

        // Handle customize button click
        const customizeButton = document.getElementById("customizeButton");
        if (customizeButton) {
            customizeButton.addEventListener("click", function () {
                window.location.href = "/customize_tumbler";
            });
        }

        const carouselItems = document.querySelectorAll("[data-carousel-item]");
        const prevButton = document.querySelector("[data-carousel-prev]");
        const nextButton = document.querySelector("[data-carousel-next]");
        let currentIndex = 0;

        function showSlide(index) {
            carouselItems.forEach((item, i) => {
                item.classList.toggle("hidden", i !== index);
                item.classList.toggle("block", i === index);
            });
        }

        prevButton.addEventListener("click", function () {
            currentIndex = (currentIndex - 1 + carouselItems.length) % carouselItems.length;
            showSlide(currentIndex);
        });

        nextButton.addEventListener("click", function () {
            currentIndex = (currentIndex + 1) % carouselItems.length;
            showSlide(currentIndex);
        });

        // Initialize the first slide
        showSlide(currentIndex);
    });

</script>
@endsection
