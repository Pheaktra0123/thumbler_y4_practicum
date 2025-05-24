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
        <div class=" py-0 mt-24 mx-auto  p-10">
            <div class=" mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row -mx-4">
                    <div class=" md:flex-1 px-4">
                        <div class="h-[480px] flex items-center justify-center rounded-lg mb-4">
                            <!-- Product Images -->
                            <div class="space-y-4">
                                <div class="aspect-square bg-gray-100 rounded-xl overflow-hidden flex items-center justify-center">
                                    @if(!empty($tumbler->thumbnails))
                                        <img src="{{ asset('storage/' . $tumbler->thumbnails[0]) }}" alt="Tumbler" class="w-full h-full object-cover"/>
                                    @else
                                        <img src="{{ asset('images/default-placeholder.png') }}" alt="Default Image" class="w-full h-full object-cover"/>
                                    @endif
                                </div>
                                @if(!empty($tumbler->thumbnails) && count($tumbler->thumbnails) > 1)
                                <div class="grid grid-cols-4 gap-4">
                                    @foreach($tumbler->thumbnails as $thumb)
                                        <button class="aspect-square bg-gray-100 rounded-lg overflow-hidden border-2 border-primary">
                                            <img src="{{ asset('storage/' . $thumb) }}" alt="Thumbnail" class="w-full h-full object-cover"/>
                                        </button>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="w-1/2 px-4 content-center">
                        <h2 class="text-4xl font-bold text-gray-800 text-gray-200 mb-4">
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
                            <span class="text-black-500">★★★★★</span>
                            <span class="text-gray-600 ml-2">3.9 out of 5 stars</span>
                        </div>
                        <div class="flex mb-4">
                            <div>
                                <span class="font-bold text-gray-700 text-gray-300">Availability:</span>
                                <span class="text-gray-600 text-gray-300">{{$tumbler->is_available?"In Stock":"Out Stock"}}</span>
                            </div>
                        </div>
                        <p id="price" class="text-black text-black font-bold text-2xl mt-2">{{$tumbler->price}}$</p>
                        <div class="flex items-center mb-4 mt-5">
                            <span class="mt-2 px-2 py-1 text-gray-700 text-gray-300">Qty</span>
                            <button id="decrement"
                                class="border w-8 h-8 flex items-center justify-center rounded-full bg-black text-white text-sm">-</button>
                            <span id="quantity" class="mx-7 text-gray-700 text-gray-300">1</span>
                            <button id="increment"
                                class="border w-8 h-8 flex items-center justify-center rounded-full bg-black text-white text-sm">+</button>
                        </div>

                        <div class="mb-4">
                            <span class="font-bold text-gray-700 text-gray-300">Select Color</span>
                            <div class="flex gap-2 mt-2">
                                @php
                                    $colorsRaw = $tumbler->colors ?? [];
                                    if (is_string($colorsRaw)) {
                                        $colorsArr = json_decode($colorsRaw, true);
                                        if (!is_array($colorsArr)) {
                                            // Try comma-separated fallback
                                            $colorsArr = array_filter(array_map('trim', explode(',', $colorsRaw)));
                                        }
                                    } elseif (is_array($colorsRaw)) {
                                        $colorsArr = $colorsRaw;
                                    } else {
                                        $colorsArr = [];
                                    }
                                @endphp
                                @forelse($colorsArr as $color)
                                    <button class="color-btn w-6 h-6 rounded-full" style="background-color: {{ $color }}" data-color="{{ $color }}">
                                    </button>
                                @empty
                                    <span class="text-gray-500">No colors available</span>
                                @endforelse
                            </div>
                        </div>

                        <div class="flex gap-4 mb-4 w-full">
                            @if($tumbler->is_available)
                                <form method="POST" action="{{ route('add.to.cart', $tumbler->id) }}" class="flex-1" id="addToCartForm">
                                    @csrf
                                    <input type="hidden" name="quantity" id="cartQuantity" value="1">
                                    <input type="hidden" name="color" id="cartColor" value="{{ isset($colorsArr[0]) ? $colorsArr[0] : '' }}">
                                    <button
                                        type="submit"
                                        class="w-full bg-gray-900 text-white py-3 px-6 rounded-full font-bold hover:bg-gray-800">
                                        Add to Cart
                                    </button>
                                </form>
                            @else
                                <button
                                    class="flex-1 bg-gray-400 text-white py-3 px-6 rounded-full font-bold cursor-not-allowed" 
                                    disabled>
                                    Out of Stock
                                </button>
                            @endif
                            <button id="customizeButton"
                                class="flex-1 bg-gray-200 text-gray-800 py-3 px-6 rounded-full font-bold hover:bg-gray-300">
                                Customize
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Details -->
            <div class="bg-gray-100 p-6 w-full mx-auto mt-0">
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
                            <img class="w-100 h-100 object-cover rounded-lg product-image" src="1.png" alt="Product Image">
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
            const basePrice = parseFloat(priceDisplay.textContent.replace('$', ''));
            const productImage = document.querySelector(".product-image");

            // Mapping colors to image sources
            const colorImageMap = {
                "gray": "1.png",
                "red": "2.png",
                "blue": "3.png",
                "pink": "3.png",
                "black": "1.png"
            };

            // Update quantity and total price
            function updateQuantity(change) {
                quantity += change;
                if (quantity < 1) quantity = 1;
                quantityDisplay.textContent = quantity;
                priceDisplay.textContent = `$${(basePrice * quantity).toFixed(2)}`;
            }

            const cartQuantityInput = document.getElementById("cartQuantity");
            const cartColorInput = document.getElementById("cartColor");

            // Update hidden quantity input when quantity changes
            function updateCartQuantity() {
                if (cartQuantityInput) cartQuantityInput.value = quantity;
            }
            decrementBtn.addEventListener("click", function () {
                updateQuantity(-1);
                updateCartQuantity();
            });
            incrementBtn.addEventListener("click", function () {
                updateQuantity(1);
                updateCartQuantity();
            });

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

            // Update hidden color input when color changes
            function updateCartColor(selectedColor) {
                if (cartColorInput) cartColorInput.value = selectedColor;
            }
            colorButtons.forEach(button => {
                button.addEventListener("click", function () {
                    selectColor(this);
                    updateCartColor(this.getAttribute("data-color"));
                });
            });
            // Set default color on load
            if (colorButtons.length > 0) {
                selectColor(colorButtons[0]);
                updateCartColor(colorButtons[0].getAttribute("data-color"));
            }

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

        document.addEventListener("DOMContentLoaded", function () {
            const addToCartForm = document.getElementById('addToCartForm');
            if (addToCartForm) {
                addToCartForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const formData = new FormData(addToCartForm);
                    fetch(addToCartForm.action, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                            'X-Requested-With': 'XMLHttpRequest', // <-- Add this line
                            'Accept': 'application/json'
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.cartCount !== undefined) {
                            document.querySelectorAll('.cart-badge').forEach(el => {
                                el.textContent = data.cartCount;
                            });
                        }
                        Swal.fire('Added to cart!', '', 'success');
                    })
                    .catch(() => Swal.fire('Failed to add to cart!', '', 'error'));
                });
            }
        });
    </script>
@endsection
