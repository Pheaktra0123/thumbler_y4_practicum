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
                    <div class="h-[500px] flex items-center justify-center rounded-lg mb-4">
                        <!-- Product Images -->
                        <div class="space-y-4">
                            <div class="aspect-square bg-gray-100 rounded-xl overflow-hidden flex items-center justify-center object-cover ">
                                @if(!empty($tumbler->thumbnails))
                                <img src="{{ asset('storage/' . $tumbler->thumbnails[0]) }}" alt="Tumbler" class="w-[500px] h-full " />
                                @else
                                <img src="{{ asset('images/default-placeholder.png') }}" alt="Default Image" class="w-full h-full object-cover" />
                                @endif
                            </div>
                            @if(!empty($tumbler->thumbnails) && count($tumbler->thumbnails) > 1)
                            <div class="grid grid-cols-4 gap-4">
                                @foreach($tumbler->thumbnails as $thumb)
                                <button class="aspect-square bg-gray-100 rounded-lg overflow-hidden border-2 border-primary">
                                    <img src="{{ asset('storage/' . $thumb) }}" alt="Thumbnail" class="w-full h-full object-cover" />
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
                        <span class="ml-2 text-sm text-gray-500">({{ $ratingCount }} ratings)</span>
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
                                class="color-btn w-6 h-6 rounded-full border-2 {{ $idx === 0 ? 'border-gray-400 border-4' : '' }}"
                                style="background-color: {{ $cleanColor }}"
                                data-color="{{ $cleanColor }}">
                            </button>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex gap-4 mb-4 w-full">
                        @if($tumbler->is_available)
                        <form method="POST" action="{{ route('add.to.cart', $tumbler->id) }}" class="flex-1" id="addToCartForm">
                            @csrf
                            <input type="hidden" name="quantity" id="cartQuantity" value="1">
                            <input type="hidden" name="color" id="cartColor" value="{{ isset($tumbler->colors[0]) ? (is_string($tumbler->colors[0]) ? trim($tumbler->colors[0], '"[]\\') : '') : '' }}">
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
        <div class="bg-gray-100 p-6 w-full mx-auto mt-10 mb-32">
            <div class="max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row items-start gap-8">
                    <div class="flex-1">
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Product Details</h3>
                        <p class="text-gray-600 mb-4">{!! $tumbler->description !!}</p>

                    </div>

                    <!-- Move Image to the Right & Push It Down -->
                    <div class="h-[100px] w-[200px] flex items-center justify-center rounded-lg   ml-24 mt-44 mb-24">
                        {{-- Rating Form Section --}}
                    @if(auth()->check())
                    <form id="ratingForm" action="{{ route('tumbler.rate', $tumbler->id) }}" method="POST" class="my-8 bg-white rounded-lg shadow p-6 ">
                         <img class="w-100 h-100 object-cover rounded-lg product-image" src="{{ asset('storage/' . $tumbler->thumbnails[0]) }}" alt="Product Image">
                        @csrf
                        <label for="rating" class="block font-bold mb-2 text-lg text-gray-700">Your Rating:</label>
                        <div class="flex items-center mb-4 space-x-2 justify-center">
                            @for($i = 1; $i <= 5; $i++)
                                <label class="cursor-pointer transition-transform transform hover:scale-125">
                                <input type="radio" name="rating" value="{{ $i }}" class="hidden peer" required {{ old('rating') == $i ? 'checked' : '' }}>
                                <svg class="w-9 h-9 transition-colors duration-200 peer-checked:text-yellow-400 text-gray-300 hover:text-yellow-300" fill="currentColor" viewBox="0 0 20 20">
                                    <polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.9 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 " />
                                </svg>
                                </label>
                                @endfor
                        </div>
                        <textarea name="comment" class="w-full border rounded p-2 mb-4" placeholder="Leave a comment (optional)">{{ old('comment') }}</textarea>
                        <button id="submitRatingBtn" type="submit" class="bg-blue-600 text-white px-6 py-2 rounded font-bold flex items-center justify-center gap-2">
                            <span>Submit Rating</span>
                            <svg id="ratingLoading" class="w-5 h-5 animate-spin hidden" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                            </svg>
                        </button>
                    </form>
                    @else
                    <p class="text-sm text-gray-500 text-center">Please <a href="{{ route('login') }}" class="text-blue-600 underline">login</a> to rate this tumbler.</p>
                    @endif
                    </div>

                </div>
            </div>
        </div>

    </div>

</main>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Quantity
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
        }
        if (decrementBtn) decrementBtn.addEventListener("click", function(e) {
            e.preventDefault();
            updateQuantity(-1);
        });
        if (incrementBtn) incrementBtn.addEventListener("click", function(e) {
            e.preventDefault();
            updateQuantity(1);
        });

        // Color selection
        const colorButtons = document.querySelectorAll(".color-btn");
        const cartColorInput = document.getElementById("cartColor");
        const productImage = document.querySelector(".product-image");
        const colorImageMap = {
            "gray": "1.png",
            "red": "2.png",
            "blue": "3.png",
            "pink": "3.png",
            "black": "1.png"
        };

        function selectColor(button) {
            colorButtons.forEach(btn => btn.classList.remove("border-4", "border-gray-400"));
            button.classList.add("border-4", "border-gray-400");
            const selectedColor = button.getAttribute("data-color");
            if (cartColorInput) cartColorInput.value = selectedColor;
            if (colorImageMap[selectedColor]) {
                productImage.src = colorImageMap[selectedColor];
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

        // Customize button
        const customizeButton = document.getElementById("customizeButton");
        if (customizeButton) {
            customizeButton.addEventListener("click", function() {
                window.location.href = "/customize_tumbler";
            });
        }

        // Add to cart form (unchanged)
        const addToCartForm = document.getElementById('addToCartForm');
        if (addToCartForm) {
            addToCartForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(addToCartForm);
                fetch(addToCartForm.action, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                            'X-Requested-With': 'XMLHttpRequest',
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Live star highlight
        const starRadios = document.querySelectorAll('input[name="rating"]');
        const starLabels = document.querySelectorAll('input[name="rating"] + svg');

        function updateStars() {
            let checkedValue = null;
            starRadios.forEach((radio, idx) => {
                if (radio.checked) checkedValue = radio.value;
            });
            starRadios.forEach((radio, idx) => {
                if (radio.value <= checkedValue) {
                    starLabels[idx].classList.add('text-yellow-400');
                    starLabels[idx].classList.remove('text-gray-300');
                } else {
                    starLabels[idx].classList.remove('text-yellow-400');
                    starLabels[idx].classList.add('text-gray-300');
                }
            });
        }
        starRadios.forEach(radio => {
            radio.addEventListener('change', updateStars);
        });
        updateStars();

        // AJAX submit with loading and popup
        const ratingForm = document.getElementById('ratingForm');
        const submitBtn = document.getElementById('submitRatingBtn');
        const loadingIcon = document.getElementById('ratingLoading');
        if (ratingForm) {
            ratingForm.addEventListener('submit', function(e) {
                e.preventDefault();
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
                            // Try to parse JSON, fallback to success if not JSON
                            try {
                                const data = await response.json();
                                if (data.success) {
                                    Swal.fire('Thank you!', 'Your rating has been submitted.', 'success').then(() => {
                                        window.location.reload();
                                    });
                                    return;
                                }
                            } catch (e) {
                                // Not JSON, but still ok
                                Swal.fire('Thank you!', 'Your rating has been submitted.', 'success').then(() => {
                                    window.location.reload();
                                });
                                return;
                            }
                        }
                        // If not ok, try to show error
                        let msg = 'Failed to submit rating.';
                        if (response.status === 422) {
                            const data = await response.json();
                            if (data.errors) {
                                msg = Object.values(data.errors).flat().join('\n');
                            }
                        }
                        Swal.fire('Error', msg, 'error');
                    })
                    .catch(() => {
                        loadingIcon.classList.add('hidden');
                        submitBtn.disabled = false;
                        Swal.fire('Error', 'Failed to submit rating.', 'error');
                    });
            });
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Live star highlight
        const starRadios = document.querySelectorAll('input[name="rating"]');
        const starLabels = document.querySelectorAll('input[name="rating"] + svg');

        function updateStars() {
            let checkedValue = null;
            starRadios.forEach((radio, idx) => {
                if (radio.checked) checkedValue = radio.value;
            });
            starRadios.forEach((radio, idx) => {
                if (radio.value <= checkedValue) {
                    starLabels[idx].classList.add('text-yellow-400');
                    starLabels[idx].classList.remove('text-gray-300');
                } else {
                    starLabels[idx].classList.remove('text-yellow-400');
                    starLabels[idx].classList.add('text-gray-300');
                }
            });
        }
        starRadios.forEach(radio => {
            radio.addEventListener('change', updateStars);
        });
        updateStars();

        // AJAX submit with loading and popup
        const ratingForm = document.getElementById('ratingForm');
        const submitBtn = document.getElementById('submitRatingBtn');
        const loadingIcon = document.getElementById('ratingLoading');
        if (ratingForm) {
            ratingForm.addEventListener('submit', function(e) {
                e.preventDefault();
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
                            // Try to parse JSON, fallback to success if not JSON
                            try {
                                const data = await response.json();
                                if (data.success) {
                                    Swal.fire('Thank you!', 'Your rating has been submitted.', 'success').then(() => {
                                        window.location.reload();
                                    });
                                    return;
                                }
                            } catch (e) {
                                // Not JSON, but still ok
                                Swal.fire('Thank you!', 'Your rating has been submitted.', 'success').then(() => {
                                    window.location.reload();
                                });
                                return;
                            }
                        }
                        // If not ok, try to show error
                        let msg = 'Failed to submit rating.';
                        if (response.status === 422) {
                            const data = await response.json();
                            if (data.errors) {
                                msg = Object.values(data.errors).flat().join('\n');
                            }
                        }
                        Swal.fire('Error', msg, 'error');
                    })
                    .catch(() => {
                        loadingIcon.classList.add('hidden');
                        submitBtn.disabled = false;
                        Swal.fire('Error', 'Failed to submit rating.', 'error');
                    });
            });
        }
    });
</script>
