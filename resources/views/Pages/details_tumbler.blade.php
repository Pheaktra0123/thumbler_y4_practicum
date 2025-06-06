@extends('Component.header')
@include('TailwindCssLink.style')

@section('title', 'details_tumbler')

@section('contents')

<main>
    <style>
        .product-gallery {
            transition: all 0.3s ease;
        }

        .thumbnail-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .thumbnail-btn.active {
            border-color: #000;
            box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.2);
        }

        .color-btn {
            transition: all 0.2s ease;
        }

        .color-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .color-btn.active {
            box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.3);
        }

        .action-btn {
            transition: all 0.2s ease;
        }

        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .quantity-btn {
            transition: all 0.2s ease;
        }

        .quantity-btn:hover {
            background-color: #333;
            transform: scale(1.1);
        }

        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .slide-up {
            animation: slideUp 0.5s ease-out;
        }

        @keyframes slideUp {
            from {
                transform: translateY(20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>

    <!-- Product Section -->
    <div class="py-0 mt-24 mx-auto p-4 sm:p-10 fade-in">
        <div class="mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row -mx-4 slide-up">
                <div class="md:flex-1 px-4">
                    <div class="h-[500px] flex items-center justify-center rounded-lg mb-4 overflow-hidden">
                        <!-- Main Product Image -->
                        <div class="relative w-full h-full product-gallery">
                            @if(!empty($tumbler->thumbnails))
                            <img id="mainImage" src="{{ asset('storage/' . $tumbler->thumbnails[0]) }}" alt="Tumbler" class="w-full h-full object-contain transition-opacity duration-300" />
                            @else
                            <img src="{{ asset('images/default-placeholder.png') }}" alt="Default Image" class="w-full h-full object-contain" />
                            @endif
                        </div>
                    </div>

                    <!-- Thumbnails -->
                    @if(!empty($tumbler->thumbnails) && count($tumbler->thumbnails) > 1)
                    <div class="grid grid-cols-4 gap-3 mt-4">
                        @foreach($tumbler->thumbnails as $index => $thumb)
                        <button onclick="changeMainImage('{{ asset('storage/' . $thumb) }}', this)"
                            class="thumbnail-btn aspect-square bg-gray-100 rounded-lg overflow-hidden border-2 border-transparent transition-all duration-200 {{ $index === 0 ? 'active border-primary' : '' }}">
                            <img src="{{ asset('storage/' . $thumb) }}" alt="Thumbnail" class="w-full h-full object-cover" />
                        </button>
                        @endforeach
                    </div>
                    @endif
                </div>

                <!-- Product Info -->
                <div class="w-full md:w-1/2 px-4 content-center slide-up" style="animation-delay: 0.1s">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3">
                        {{ $tumbler->tumbler_name }} |
                        @php
                        $sizes = json_decode($tumbler->sizes, true);
                        if (is_array($sizes) && !empty($sizes)) {
                        $firstSize = trim(str_replace(['"', '[', ']'], '', $sizes[0]));
                        echo $firstSize;
                        } else {
                        echo 'N/A';
                        }
                        @endphp OZ
                    </h2>

                    <!-- Rating -->
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
                                <polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.9 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 " />
                                </svg>
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
                                    <polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.9 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 " />
                                    </svg>
                                    @endfor
                        </div>
                        <span class="text-gray-800 ml-2 font-semibold">{{ number_format($rating, 1) }} <span class="text-gray-500 font-normal">out of 5</span></span>
                        <span class="ml-2 text-sm text-gray-500">({{ $ratingCount }} ratings)</span>
                    </div>

                    <!-- Availability -->
                    <div class="flex items-center my-4">
                        <span class="font-bold text-gray-700 mr-2">Availability:</span>
                        <span class="{{ $tumbler->is_available ? 'text-green-600' : 'text-red-600' }} font-medium">
                            {{ $tumbler->is_available ? 'In Stock' : 'Out of Stock' }}
                        </span>
                    </div>

                    <!-- Price -->
                    <p id="price" class="text-black font-bold text-2xl my-4">{{ $tumbler->price }}$</p>

                    <!-- Quantity -->
                    <div class="mb-6">
                        <span class="block font-bold text-gray-500 mb-2">Quantity</span>
                        <div class="flex items-center content-center content-items-center gap-3">
                            <button id="decrement" class="quantity-btn border w-10 h-10 flex items-center justify-center rounded-full bg-gray-500 text-white text-sm hover:bg-gray-800">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                </svg>

                            </button>
                            <div id="quantity" class="flex items-center justify-center text-gray-700 text-xl font-medium w-10 h-10 text-center">1</div>
                            <button id="increment" class="quantity-btn border w-10 h-10 flex items-center justify-center rounded-full bg-gray-500 text-white text-sm hover:bg-gray-800">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>

                            </button>
                        </div>
                    </div>

                    <!-- Color Selection -->
                    <div class="mb-6">
                        <span class="block font-bold text-gray-700 mb-2">Select Color</span>
                        <div class="flex flex-wrap gap-3">
                            @foreach($tumbler->colors as $idx => $color)
                            @php
                            $cleanColor = is_string($color) ? trim($color, '"[]\\') : '';
                            if (strpos($cleanColor, 'rgb') === 0) {
                            // valid rgb
                            } elseif (!empty($cleanColor) && $cleanColor[0] !== '#' && ctype_xdigit(str_replace(' ', '', $cleanColor))) {
                            $cleanColor = '#' . $cleanColor;
                            }
                            if (empty($cleanColor)) $cleanColor = '#cccccc';
                            @endphp
                            <button type="button"
                                class="color-btn w-10 h-10 rounded-lg border-1 border-gray-100 {{ $idx === 0 ? 'active border-gray-400' : '' }}"
                                style="background-color: {{ $cleanColor }}"
                                data-color="{{ $cleanColor }}"
                                title="Color {{ $idx + 1 }}">
                            </button>
                            @endforeach
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 mb-6">
                        @if($tumbler->is_available)
                        <form method="POST" action="{{ route('add.to.cart', $tumbler->id) }}" class="flex-1" id="addToCartForm">
                            @csrf
                            <input type="hidden" name="quantity" id="cartQuantity" value="1">
                            <input type="hidden" name="color" id="cartColor" value="{{ isset($tumbler->colors[0]) && is_string($tumbler->colors[0]) ? trim($tumbler->colors[0], '"[]\\') : '' }}">
                            <button type="submit" class="action-btn w-full bg-gray-900 text-white py-3 px-6 rounded-lg font-bold hover:bg-gray-800 transition-all">
                                Add to Cart
                            </button>
                        </form>
                        @else
                        <button class="flex-1 bg-gray-400 text-white py-3 px-6 rounded-full font-bold cursor-not-allowed" disabled>
                            Out of Stock
                        </button>
                        @endif

                        @php
                        $selectedColor = isset($tumbler->colors[0]) ? (is_string($tumbler->colors[0]) ? trim($tumbler->colors[0], '"[]\\') : '') : '';
                        @endphp

                        <a id="customizeLink" href="{{ route('customize.tumbler', ['id' => $tumbler->id, 'color' => $selectedColor]) }}" class="flex-1">
                            <button id="customizeButton" class="action-btn w-full text-black py-3 px-6 border-2 border-gray-300 rounded-lg font-bold hover:border-gray-400 hover:bg-gray-50 transition-all">
                                Customize
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Details -->
        <div class="bg-gray-50 p-6 w-full mx-auto mt-10 mb-20 slide-up" style="animation-delay: 0.2s">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col lg:flex-row gap-8 lg:gap-16">
                    <!-- Details Text -->
                    <div class="flex-1">
                        <h3 class="text-2xl font-bold text-gray-800 mb-6 pb-2 border-b border-gray-200">Product Details</h3>
                        <div class="prose max-w-none text-gray-600">
                            {!! $tumbler->description !!}
                        </div>
                    </div>

                    <!-- Rating Section -->
                    <div class="lg:w-96">
                        @if(auth()->check())
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-4">Rate this product</h3>
                            <form id="ratingForm" action="{{ route('tumbler.rate', $tumbler->id) }}" method="POST" class="space-y-4">
                                @csrf
                                <div>
                                    <label class="block font-bold mb-2 text-gray-700">Your Rating:</label>
                                    <div class="flex items-center justify-center space-x-1" id="starRating">
                                        @for($i = 1; $i <= 5; $i++)
                                            <label class="cursor-pointer transition-transform hover:scale-125">
                                            <input type="radio" name="rating" value="{{ $i }}" class="hidden peer" required>
                                            <svg class="w-9 h-9 transition-colors duration-200 peer-checked:text-yellow-400 text-gray-300 hover:text-yellow-300" fill="currentColor" viewBox="0 0 20 20">
                                                <polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.9 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 " />
                                            </svg>
                                            </label>
                                            @endfor
                                    </div>
                                </div>
                                <div>
                                    <label for="comment" class="block font-bold mb-2 text-gray-700">Your Review (optional):</label>
                                    <textarea name="comment" id="comment" rows="3" class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all" placeholder="Share your thoughts about this product..."></textarea>
                                </div>
                                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg font-bold flex items-center justify-center gap-2 transition-colors">
                                    <span>Submit Review</span>
                                    <svg id="ratingLoading" class="w-5 h-5 animate-spin hidden" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                        @else
                        <div class="bg-white rounded-lg shadow-md p-6 text-center">
                            <p class="text-gray-600 mb-3">Want to rate this product?</p>
                            <a href="{{ route('login') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white py-2 px-6 rounded-lg font-bold transition-colors">
                                Login to Review
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Change main image when thumbnail is clicked
        function changeMainImage(src, element) {
            const mainImage = document.getElementById('mainImage');
            if (mainImage) {
                mainImage.style.opacity = 0;
                setTimeout(() => {
                    mainImage.src = src;
                    mainImage.style.opacity = 1;
                }, 300);
            }

            // Update active thumbnail
            document.querySelectorAll('.thumbnail-btn').forEach(btn => {
                btn.classList.remove('active', 'border-primary');
            });
            element.classList.add('active', 'border-primary');
        }

        // Quantity controls
        let quantity = 1;
        const quantityDisplay = document.getElementById("quantity");
        const decrementBtn = document.getElementById("decrement");
        const incrementBtn = document.getElementById("increment");
        const priceDisplay = document.getElementById("price");
        const basePrice = parseFloat(priceDisplay.textContent.replace('$', ''));
        const cartQuantityInput = document.getElementById("cartQuantity");

        function updateQuantity(change) {
            quantity += change;
            if (quantity < 1) quantity = 1;
            quantityDisplay.textContent = quantity;
            priceDisplay.textContent = `$${(basePrice * quantity).toFixed(2)}`;
            if (cartQuantityInput) cartQuantityInput.value = quantity;

            // Add animation to quantity change
            quantityDisplay.classList.add('scale-110');
            setTimeout(() => {
                quantityDisplay.classList.remove('scale-110');
            }, 200);
        }

        if (decrementBtn) decrementBtn.addEventListener("click", function(e) {
            e.preventDefault();
            updateQuantity(-1);
            // Button press animation
            this.classList.add('scale-90');
            setTimeout(() => this.classList.remove('scale-90'), 100);
        });

        if (incrementBtn) incrementBtn.addEventListener("click", function(e) {
            e.preventDefault();
            updateQuantity(1);
            // Button press animation
            this.classList.add('scale-90');
            setTimeout(() => this.classList.remove('scale-90'), 100);
        });

        // Color selection
        const colorButtons = document.querySelectorAll(".color-btn");
        const cartColorInput = document.getElementById("cartColor");
        const customizeLink = document.getElementById("customizeLink");

        function selectColor(button) {
            colorButtons.forEach(btn => {
                btn.classList.remove("active", "border-gray-400");
                btn.classList.add("border-gray-200");
            });
            button.classList.add("active", "border-gray-400");
            button.classList.remove("border-gray-200");

            const selectedColor = button.getAttribute("data-color");
            if (cartColorInput) cartColorInput.value = selectedColor;

            // Update customize link with selected color
            if (customizeLink) {
                const currentUrl = new URL(customizeLink.href);
                currentUrl.searchParams.set('color', encodeURIComponent(selectedColor));
                customizeLink.href = currentUrl.toString();
            }
        }

        colorButtons.forEach(button => {
            button.addEventListener("click", function() {
                selectColor(this);
                // Add bounce animation
                this.classList.add('animate-bounce');
                setTimeout(() => this.classList.remove('animate-bounce'), 1000);
            });
        });

        // Set default color on load
        if (colorButtons.length > 0) {
            selectColor(colorButtons[0]);
        }

        // Add to cart form submission
        const addToCartForm = document.getElementById('addToCartForm');
        if (addToCartForm) {
            addToCartForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const submitBtn = this.querySelector('button[type="submit"]');
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span class="animate-pulse">Adding...</span>';

                fetch(addToCartForm.action, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json'
                        },
                        body: new FormData(addToCartForm)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.cartCount !== undefined) {
                            document.querySelectorAll('.cart-badge').forEach(el => {
                                el.textContent = data.cartCount;
                            });
                        }

                        // Show success animation
                        submitBtn.innerHTML = '✓ Added!';
                        submitBtn.classList.remove('bg-gray-900', 'hover:bg-gray-800');
                        submitBtn.classList.add('bg-green-600');

                        setTimeout(() => {
                            submitBtn.innerHTML = 'Add to Cart';
                            submitBtn.classList.remove('bg-green-600');
                            submitBtn.classList.add('bg-gray-900', 'hover:bg-gray-800');
                            submitBtn.disabled = false;
                        }, 2000);
                    })
                    .catch(() => {
                        submitBtn.innerHTML = 'Add to Cart';
                        submitBtn.disabled = false;

                        // Show error animation
                        submitBtn.classList.add('animate-shake');
                        setTimeout(() => {
                            submitBtn.classList.remove('animate-shake');
                        }, 500);

                        Swal.fire('Error', 'Failed to add to cart!', 'error');
                    });
            });
        }

        // Star rating interaction
        const starRadios = document.querySelectorAll('input[name="rating"]');
        const starLabels = document.querySelectorAll('#starRating label');

        starLabels.forEach((label, index) => {
            label.addEventListener('mouseenter', () => {
                for (let i = 0; i <= index; i++) {
                    starLabels[i].querySelector('svg').classList.add('text-yellow-300');
                    starLabels[i].querySelector('svg').classList.remove('text-gray-300');
                }
            });

            label.addEventListener('mouseleave', () => {
                const checkedRadio = document.querySelector('input[name="rating"]:checked');
                if (!checkedRadio) {
                    starLabels.forEach(star => {
                        star.querySelector('svg').classList.remove('text-yellow-300');
                        star.querySelector('svg').classList.add('text-gray-300');
                    });
                } else {
                    const checkedIndex = Array.from(starRadios).indexOf(checkedRadio);
                    starLabels.forEach((star, i) => {
                        if (i <= checkedIndex) {
                            star.querySelector('svg').classList.add('text-yellow-400');
                            star.querySelector('svg').classList.remove('text-gray-300');
                        } else {
                            star.querySelector('svg').classList.remove('text-yellow-400');
                            star.querySelector('svg').classList.add('text-gray-300');
                        }
                    });
                }
            });
        });

        starRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                const index = Array.from(starRadios).indexOf(this);
                starLabels.forEach((star, i) => {
                    if (i <= index) {
                        star.querySelector('svg').classList.add('text-yellow-400');
                        star.querySelector('svg').classList.remove('text-gray-300', 'text-yellow-300');
                    } else {
                        star.querySelector('svg').classList.remove('text-yellow-400', 'text-yellow-300');
                        star.querySelector('svg').classList.add('text-gray-300');
                    }
                });
            });
        });

        // Rating form submission
        const ratingForm = document.getElementById('ratingForm');
        if (ratingForm) {
            ratingForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const submitBtn = this.querySelector('button[type="submit"]');
                const loadingIcon = document.getElementById('ratingLoading');

                submitBtn.disabled = true;
                loadingIcon.classList.remove('hidden');

                fetch(ratingForm.action, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                            'Accept': 'application/json'
                        },
                        body: new FormData(ratingForm)
                    })
                    .then(async response => {
                        loadingIcon.classList.add('hidden');
                        submitBtn.disabled = false;

                        if (response.ok) {
                            try {
                                const data = await response.json();
                                if (data.success) {
                                    // Show success animation
                                    submitBtn.innerHTML = '<span>✓ Submitted!</span>';
                                    submitBtn.classList.remove('bg-blue-600', 'hover:bg-blue-700');
                                    submitBtn.classList.add('bg-green-600');

                                    setTimeout(() => {
                                        window.location.reload();
                                    }, 1500);
                                    return;
                                }
                            } catch (e) {
                                // Not JSON, but still ok
                                window.location.reload();
                                return;
                            }
                        }

                        // Error handling
                        let msg = 'Failed to submit rating.';
                        if (response.status === 422) {
                            const data = await response.json();
                            if (data.errors) {
                                msg = Object.values(data.errors).flat().join('\n');
                            }
                        }

                        // Show error animation
                        submitBtn.classList.add('animate-shake');
                        setTimeout(() => {
                            submitBtn.classList.remove('animate-shake');
                        }, 500);

                        Swal.fire('Error', msg, 'error');
                    })
                    .catch(() => {
                        loadingIcon.classList.add('hidden');
                        submitBtn.disabled = false;

                        // Show error animation
                        submitBtn.classList.add('animate-shake');
                        setTimeout(() => {
                            submitBtn.classList.remove('animate-shake');
                        }, 500);

                        Swal.fire('Error', 'Failed to submit rating.', 'error');
                    });
            });
        }
    });
</script>

<style>
    @keyframes shake {

        0%,
        100% {
            transform: translateX(0);
        }

        20%,
        60% {
            transform: translateX(-5px);
        }

        40%,
        80% {
            transform: translateX(5px);
        }
    }

    .animate-shake {
        animation: shake 0.5s cubic-bezier(.36, .07, .19, .97) both;
    }

    .animate-bounce {
        animation: bounce 1s;
    }

    @keyframes bounce {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-10px);
        }
    }

    .prose ul {
        list-style-type: disc;
        padding-left: 1.5rem;
        margin-bottom: 1rem;
    }

    .prose li {
        margin-bottom: 0.5rem;
    }
</style>
@endsection