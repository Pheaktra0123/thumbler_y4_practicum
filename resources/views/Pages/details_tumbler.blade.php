@extends('Component.header')
@include('TailwindCssLink.style')

@section('title', 'details_tumbler')

@section('contents')

<main>
    <style>
        /* Image Gallery Styles */
        .image-gallery {
            position: relative;
            overflow: hidden;
        }
        
        .gallery-container {
            display: flex;
            transition: transform 0.5s ease;
            height: 500px;
        }
        
        .gallery-slide {
            min-width: 100%;
            position: relative;
        }
        
        .gallery-slide img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        
        .gallery-nav {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
            padding: 0 1rem;
            z-index: 10;
        }
        
        .gallery-btn {
            background: rgba(255, 255, 255, 0.7);
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .gallery-btn:hover {
            background: rgba(255, 255, 255, 0.9);
        }
        
        .thumbnail-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 0.75rem;
            margin-top: 1rem;
        }
        
        .thumbnail-btn {
            aspect-ratio: 1/1;
            background-color: #f3f4f6;
            border-radius: 0.5rem;
            overflow: hidden;
            border: 2px solid transparent;
            transition: all 0.2s ease;
            cursor: pointer;
        }
        
        .thumbnail-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .thumbnail-btn.active {
            border-color: #000;
            box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.2);
        }
        
        .thumbnail-btn img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        /* Color Selection */
        .color-btn {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 0.5rem;
            border: 1px solid #e5e7eb;
            transition: all 0.2s ease;
            cursor: pointer;
        }
        
        .color-btn:hover {
            transform: scale(1.1);
        }
        
        .color-btn.active {
            box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.3);
        }
        
        /* Animations */
        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
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
        
        /* Quantity Selector */
        .quantity-btn {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 9999px;
            background-color: #6b7280;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
            border: none;
            cursor: pointer;
        }
        
        .quantity-btn:hover {
            background-color: #1f2937;
        }
        
        /* Action Buttons */
        .action-btn {
            transition: all 0.2s ease;
        }
        
        .action-btn:hover {
            transform: translateY(-2px);
        }
        
        /* Rating Stars */
        .star-rating {
            display: flex;
            align-items: center;
        }
        
        .star {
            width: 1.25rem;
            height: 1.25rem;
            color: #d1d5db; /* gray-300 */
        }
        
        .star.filled {
            color: #f59e0b; /* yellow-400 */
        }
        
        .star.half-filled {
            position: relative;
        }
        
        .star.half-filled::after {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 50%;
            height: 100%;
            background-color: #f59e0b; /* yellow-400 */
            z-index: 1;
        }
    </style>

    <!-- Product Section -->
    <div class="py-0 mx-auto p-4 sm:p-10 fade-in">
        <div class="mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row -mx-4 slide-up">
                <!-- Image Gallery Column -->
                <div class="md:flex-1 px-4">
                    <div class="image-gallery rounded-lg overflow-hidden mb-4">
                        <div class="gallery-container">
                            @if($tumbler->thumbnails && count($tumbler->thumbnails) > 0)
                                @foreach($tumbler->thumbnails as $thumb)
                                <div class="gallery-slide">
                                    <img src="{{ asset('storage/' . $thumb) }}" alt="Tumbler Image" loading="lazy">
                                </div>
                                @endforeach
                            @else
                                <div class="gallery-slide">
                                    <img src="{{ asset('images/default-placeholder.png') }}" alt="Default Tumbler Image" loading="lazy">
                                </div>
                            @endif
                        </div>
                        
                        @if($tumbler->thumbnails && count($tumbler->thumbnails) > 1)
                        <div class="gallery-nav">
                            <button class="gallery-btn prev-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>
                            <button class="gallery-btn next-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                        @endif
                    </div>
                    
                    @if($tumbler->thumbnails && count($tumbler->thumbnails) > 1)
                    <div class="thumbnail-container">
                        @foreach($tumbler->thumbnails as $index => $thumb)
                        <button class="thumbnail-btn {{ $index === 0 ? 'active' : '' }}" 
                                data-index="{{ $index }}">
                            <img src="{{ asset('storage/' . $thumb) }}" 
                                 alt="Tumbler Thumbnail {{ $index + 1 }}" 
                                 loading="lazy">
                        </button>
                        @endforeach
                    </div>
                    @endif
                </div>

                <!-- Product Info Column -->
                <div class="w-full md:w-1/2 px-4 content-center slide-up" style="animation-delay: 0.1s">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3">
                        {{ $tumbler->tumbler_name }} |
                        @php
                        $sizes = json_decode($tumbler->sizes, true) ?? [];
                        $firstSize = is_array($sizes) && !empty($sizes) ? trim($sizes[0], '"[]\\') : 'N/A';
                        echo $firstSize;
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
                        
                        <div class="star-rating mr-2">
                            @for($i = 0; $i < $fullStars; $i++)
                                <svg class="star filled" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            @endfor
                            
                            @if($halfStar)
                                <svg class="star half-filled" fill="#e5e7eb" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            @endif
                            
                            @for($i = 0; $i < $emptyStars; $i++)
                                <svg class="star" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            @endfor
                        </div>
                        
                        <span class="text-gray-800 font-semibold">{{ number_format($rating, 1) }} 
                            <span class="text-gray-500 font-normal">out of 5</span>
                        </span>
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
                    <p id="price" class="text-black font-bold text-2xl my-4">
                        ${{ number_format($tumbler->price, 2) }}
                    </p>

                    <!-- Quantity -->
                    <div class="mb-6">
                        <span class="block font-bold text-gray-500 mb-2">Quantity</span>
                        <div class="flex items-center gap-3">
                            <button id="decrement" class="quantity-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14" />
                                </svg>
                            </button>
                            <div id="quantity" class="text-gray-700 text-xl font-medium w-10 text-center">1</div>
                            <button id="increment" class="quantity-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Color Selection -->
                    <div class="mb-6">
                        <span class="block font-bold text-gray-700 mb-2">Select Color</span>
                        <div class="flex flex-wrap gap-3">
                            @foreach($tumbler->colors as $index => $color)
                            @php
                            $cleanColor = is_string($color) ? trim($color, '"[]\\') : '';
                            if (strpos($cleanColor, 'rgb') === 0) {
                                // valid rgb format
                            } elseif (!empty($cleanColor) && $cleanColor[0] !== '#' && ctype_xdigit(str_replace(' ', '', $cleanColor))) {
                                $cleanColor = '#' . $cleanColor;
                            }
                            if (empty($cleanColor)) $cleanColor = '#cccccc';
                            @endphp
                            <button type="button"
                                class="color-btn {{ $index === 0 ? 'active' : '' }}"
                                style="background-color: {{ $cleanColor }}"
                                data-color="{{ $cleanColor }}"
                                title="Color {{ $index + 1 }}">
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
                            <button type="submit" class="action-btn w-full bg-gray-900 text-white py-3 px-6 rounded-lg font-bold hover:bg-gray-800 transition-colors">
                                Add to Cart
                            </button>
                        </form>
                        @else
                        <button class="flex-1 bg-gray-400 text-white py-3 px-6 rounded-lg font-bold cursor-not-allowed" disabled>
                            Out of Stock
                        </button>
                        @endif

                        <a id="customizeLink" href="{{ route('customize.tumbler', ['id' => $tumbler->id, 'color' => (isset($tumbler->colors[0]) && is_string($tumbler->colors[0])) ? trim($tumbler->colors[0], '"[]\\') : '']) }}" class="flex-1">
                            <button class="action-btn w-full text-black py-3 px-6 border-2 border-gray-300 rounded-lg font-bold hover:border-gray-400 hover:bg-gray-50 transition-colors">
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
                                            <label class="cursor-pointer">
                                                <input type="radio" name="rating" value="{{ $i }}" class="hidden peer" required>
                                                <svg class="w-9 h-9 text-gray-300 peer-checked:text-yellow-400 hover:text-yellow-300 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </label>
                                        @endfor
                                    </div>
                                </div>
                                <div>
                                    <label for="comment" class="block font-bold mb-2 text-gray-700">Your Review (optional):</label>
                                    <textarea name="comment" id="comment" rows="3" class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Share your thoughts about this product..."></textarea>
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
        // Image Gallery Functionality
        const galleryContainer = document.querySelector('.gallery-container');
        const slides = document.querySelectorAll('.gallery-slide');
        const thumbnails = document.querySelectorAll('.thumbnail-btn');
        const prevBtn = document.querySelector('.prev-btn');
        const nextBtn = document.querySelector('.next-btn');
        let currentSlide = 0;
        
        if (slides.length > 1) {
            // Navigation functions
            function goToSlide(index) {
                currentSlide = (index + slides.length) % slides.length;
                galleryContainer.style.transform = `translateX(-${currentSlide * 100}%)`;
                
                // Update active thumbnail
                thumbnails.forEach((thumb, i) => {
                    thumb.classList.toggle('active', i === currentSlide);
                });
            }
            
            // Button event listeners
            if (prevBtn) {
                prevBtn.addEventListener('click', () => goToSlide(currentSlide - 1));
            }
            
            if (nextBtn) {
                nextBtn.addEventListener('click', () => goToSlide(currentSlide + 1));
            }
            
            // Thumbnail click handlers
            thumbnails.forEach((thumb, index) => {
                thumb.addEventListener('click', () => goToSlide(index));
            });
        }
        
        // Quantity Selector
        let quantity = 1;
        const quantityDisplay = document.getElementById("quantity");
        const decrementBtn = document.getElementById("decrement");
        const incrementBtn = document.getElementById("increment");
        const priceDisplay = document.getElementById("price");
        const basePrice = parseFloat(priceDisplay.textContent.replace('$', '').replace(',', ''));
        const cartQuantityInput = document.getElementById("cartQuantity");

        function updateQuantity(change) {
            quantity += change;
            if (quantity < 1) quantity = 1;
            quantityDisplay.textContent = quantity;
            priceDisplay.textContent = '$' + (basePrice * quantity).toFixed(2);
            if (cartQuantityInput) cartQuantityInput.value = quantity;
        }

        if (decrementBtn) decrementBtn.addEventListener("click", function(e) {
            e.preventDefault();
            updateQuantity(-1);
        });

        if (incrementBtn) incrementBtn.addEventListener("click", function(e) {
            e.preventDefault();
            updateQuantity(1);
        });

        // Color Selection
        const colorButtons = document.querySelectorAll(".color-btn");
        const cartColorInput = document.getElementById("cartColor");
        const customizeLink = document.getElementById("customizeLink");

        function selectColor(button) {
            colorButtons.forEach(btn => {
                btn.classList.remove("active");
            });
            button.classList.add("active");

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
                        alert('Failed to add to cart!');
                    });
            });
        }

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

                        alert(msg);
                    })
                    .catch(() => {
                        loadingIcon.classList.add('hidden');
                        submitBtn.disabled = false;
                        alert('Failed to submit rating.');
                    });
            });
        }
    });
</script>

<style>
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