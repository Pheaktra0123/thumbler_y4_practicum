@extends('Component.header')
@include('TailwindCssLink.style')

@section('title', 'Customize Tumbler')

@section('contents')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="w-full p-6 mt-20 bg-white shadow-lg">
    <form id="customizeForm" action="{{ route('customize.tumbler.save', ['id' => $tumbler->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="flex flex-col items-center relative">
                <div class="h-[560px] w-[350px] flex items-center justify-center mt-12 p-4">
                    @php
                        $thumbs = is_array($tumbler->thumbnails) ? $tumbler->thumbnails : json_decode($tumbler->thumbnails, true);
                        $firstThumb = $thumbs[0] ?? 'black-nobg.png';
                    @endphp
                    <img class="w-full h-full object-cover rounded-lg" src="{{ asset('storage/' . $firstThumb) }}" alt="Tumbler" id="tumblerImage">
                    <div id="textOverlay" class="absolute text-neutral-400 text-3xl font-bold"></div>
                    <img id="uploadedImage" class="absolute hidden" style="max-width: 100px; max-height: 100px; object-fit: contain;" alt="Uploaded Image">
                </div>
            </div>
            <div class="w-full p-4">
                <h1 class="text-2xl font-bold text-gray-800">{{ $tumbler->tumbler_name ?? 'Tumbler' }} |
                    @php
                        $sizes = json_decode($tumbler->sizes, true);
                        echo is_array($sizes) && !empty($sizes) ? trim(str_replace(['"', '[', ']'], '', $sizes[0])) : '40';
                    @endphp OZ
                </h1>
                <div class="mt-6 border p-6 rounded-lg shadow-md bg-gray-50">
                    <div class="flex items-center justify-between">
                        <div class="flex flex-col items-center space-x-2">
                            <span class="text-gray-700 font-semibold text-lg">Size</span>
                            <div class="w-24 h-24 border-4 border-black flex items-center justify-center text-2xl font-bold rounded-full">
                                @php
                                    echo is_array($sizes) && !empty($sizes) ? trim(str_replace(['"', '[', ']'], '', $sizes[0])) : '40';
                                @endphp OZ
                            </div>
                        </div>
                        <div class="w-[3px] h-16 bg-gray-300 rounded-full"></div>
                        <div class="flex flex-col space-x-6 space-y-2 items-center">
                            <span class="font-semibold text-gray-700 text-lg dark:text-gray-300 mb-2">Choose Color</span>
                            <div class="flex items-center space-x-2">
                                @php
                                    $colors = is_array($tumbler->colors) ? $tumbler->colors : json_decode($tumbler->colors, true);
                                    $selectedColor = request('color') ?? (is_array($colors) && count($colors) ? trim($colors[0], '"[]\\') : '');
                                @endphp
                                @foreach($colors as $idx => $color)
                                    @php
                                        $cleanColor = is_string($color) ? trim($color, '"[]\\') : '';
                                        if (strpos($cleanColor, 'rgb') === 0) {
                                            // valid rgb
                                        } elseif (!empty($cleanColor) && $cleanColor[0] !== '#' && ctype_xdigit(str_replace(' ', '', $cleanColor))) {
                                            $cleanColor = '#' . $cleanColor;
                                        }
                                        if (empty($cleanColor)) $cleanColor = '#cccccc';
                                        $isSelected = $cleanColor == $selectedColor;
                                    @endphp
                                    <button
                                        class="color-btn w-8 h-8 rounded-full border-2 {{ $isSelected ? 'border-gray-700' : 'border-transparent' }} hover:border-gray-700 focus:border-gray-700"
                                        style="background-color: {{ $cleanColor }}"
                                        data-color="{{ $cleanColor }}">
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Engraving, Upload, Quantity, etc. (keep as is) -->
                <div class="mt-6 border p-4 rounded-lg">
                    <label class="text-lg font-semibold text-gray-700">Engraving <span class="text-gray-500">+ $10</span></label>
                    <div class="mt-3 flex items-center gap-4">
                        <input type="text" id="engravingText" placeholder="6 Letters only!" maxlength="6
                            class="border p-3 rounded-lg text-center w-44 smalllcase" name="engraving">
                        <select id="fontSelect" class="border p-3 rounded-lg w-44" name="font">
                            <option selected disabled>Select Font</option>
                            <option value="serif">Serif</option>
                            <option value="sans-serif">Sans-Serif</option>
                            <option value="cursive">Cursive</option>
                            <option value="monospace">Monospace</option>
                            <option value="fantasy">Fantasy</option>
                            <option value="Times New Roman">Times New Roman</option>
                            <option value="Arial">Arial</option>
                            <option value="Verdana">Verdana</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Courier New">Courier New</option>
                            <option value="Brush Script MT">Brush Script MT</option>
                            <option value="Lobster">Lobster</option>
                        </select>
                        <div class="w-[3px] h-12 bg-gray-300 rounded-full"></div>
                        <input type="file" id="uploadImage" class="hidden" accept="image/*" name="image">
                        <label for="uploadImage"
                            class="border p-3 rounded-lg text-center border-black cursor-pointer font-semibold text-gray-700 w-40">
                            UPLOAD IMAGE
                        </label>
                        <button id="deleteImageBtn"
                            class="mt-2 p-1 bg-red-500 text-white rounded text-xs w-18 h-10 hidden">Delete</button>
                        <div id="imageSizeModal"
                            class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
                            <div class="bg-white p-6 rounded-lg max-w-md w-full">
                                <h2 class="text-xl font-bold text-red-600">Image Size Exceeds Limit!</h2>
                                <p class="text-gray-700 mt-2">Your image is too large! The maximum file size allowed is 1MB.</p>
                                <p class="text-gray-700 mt-2">You can convert your image size here:</p>
                                <a href="https://www.iloveimg.com/resize-image" target="_blank"
                                    class="text-blue-500 underline mt-2 block">Convert your image size here</a>
                                <button id="closeModalBtn"
                                    class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-500">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-6">
                    <div class="mt-2 border p-4 rounded-lg gap-2 flex justify-between items-center">
                        <label class="text-lg font-semibold text-gray-700">Quantity</label>
                        @php
    $selectedQty = intval(request('quantity', 1));
    if ($selectedQty < 1) $selectedQty = 1;
@endphp
                        <div class="flex items-center">
                            <button type="button" id="decreaseQuantity"
                                class="bg-gray-200 p-2 rounded-l-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400">
                                -
                            </button>
                            <input type="number" id="quantityInput" name="quantity" value="{{ $selectedQty }}"
                                class="border-t border-b w-16 text-center focus:outline-none focus:ring-2 focus:ring-gray-400"
                                min="1" max="100">
                            <button type="button" id="increaseQuantity"
                                class="bg-gray-200 p-2 rounded-r-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400">
                                +
                            </button>
                        </div>
                        @php
    $basePrice = $tumbler->price;
    $customPrice = $basePrice;
    $hasEngraving = !empty(request('engraving'));
    $hasImage = !empty(request('image'));
    if ($hasEngraving || $hasImage) {
        $customPrice += 10;
    }
@endphp
                    </div>
                </div>
                <div class="mt-6 flex gap-4">
                    <button
                        type="button"
                        id="addToCartBtn"
                        class="w-full bg-gray-900 text-white py-3 px-6 rounded-xl font-bold hover:bg-gray-800">
                        <span id="addToCartPrice">${{ $customPrice }}</span> - ADD TO CART
                    </button>
                    <button
                        type="submit"
                        id="saveCustomizeBtn"
                        class="border p-3 w-full font-bold rounded-lg text-center hover:bg-gray-100">
                        Save Customize <span id="saveCustomizePrice">${{ $customPrice }}</span>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {
    // Color selection logic
    const colorButtons = document.querySelectorAll('.color-btn');
    const selectedColorInput = document.getElementById('selectedColor') || document.createElement('input');
    if (!selectedColorInput.id) {
        selectedColorInput.type = "hidden";
        selectedColorInput.name = "color";
        selectedColorInput.id = "selectedColor";
        document.body.appendChild(selectedColorInput);
    }

    // Find the selected color button
    let selectedBtn = Array.from(colorButtons).find(btn => btn.classList.contains('border-gray-700'));
    if (selectedBtn) {
        selectedColorInput.value = selectedBtn.getAttribute("data-color");
    } else if (colorButtons[0]) {
        selectedColorInput.value = colorButtons[0].getAttribute("data-color");
    }

    colorButtons.forEach(button => {
        button.addEventListener("click", function () {
            colorButtons.forEach(btn => btn.classList.remove("border-gray-700"));
            this.classList.add("border-gray-700");
            selectedColorInput.value = this.getAttribute("data-color");
        });
    });

    // Engraving text logic
    const engravingText = document.getElementById('engravingText');
    const fontSelect = document.getElementById('fontSelect');
    const textOverlay = document.getElementById('textOverlay');

    function updateTextOverlay() {
        if (engravingText && textOverlay) {
            textOverlay.textContent = engravingText.value;
            textOverlay.style.fontFamily = fontSelect.value !== "Select Font" ? fontSelect.value : "";
        }
    }

    if (engravingText) engravingText.addEventListener('input', updateTextOverlay);
    if (fontSelect) fontSelect.addEventListener('change', updateTextOverlay);

    // Image upload logic
    const uploadImage = document.getElementById('uploadImage');
    const uploadedImage = document.getElementById('uploadedImage');
    const deleteImageBtn = document.getElementById('deleteImageBtn');

    if (uploadImage && uploadedImage && deleteImageBtn) {
        uploadImage.addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                if (file.size > 1024 * 1024) { // 1MB
                    document.getElementById('imageSizeModal').classList.remove('hidden');
                    uploadImage.value = "";
                    return;
                }
                const reader = new FileReader();
                reader.onload = function (ev) {
                    uploadedImage.src = ev.target.result;
                    uploadedImage.classList.remove('hidden');
                    uploadedImage.style.display = "block";
                    deleteImageBtn.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        });

        deleteImageBtn.addEventListener('click', function (e) {
            e.preventDefault();
            uploadedImage.src = "";
            uploadedImage.classList.add('hidden');
            uploadedImage.style.display = "none";
            uploadImage.value = "";
            deleteImageBtn.classList.add('hidden');
        });
    }

    // Modal close logic
    const closeModalBtn = document.getElementById('closeModalBtn');
    if (closeModalBtn) {
        closeModalBtn.addEventListener('click', function () {
            document.getElementById('imageSizeModal').classList.add('hidden');
        });
    }

    // Price update logic
    const basePrice = {{ $basePrice }};
    const saveCustomizePrice = document.getElementById('saveCustomizePrice');
    const addToCartPrice = document.getElementById('addToCartPrice');

    function updatePrice() {
        let hasEngraving = engravingText && engravingText.value.trim().length > 0;
        let hasImage = uploadImage && uploadImage.files && uploadImage.files.length > 0;
        let price = basePrice;
        if (hasEngraving || hasImage) {
            price += 10;
        }
        if (saveCustomizePrice) saveCustomizePrice.textContent = '$' + price;
        if (addToCartPrice) addToCartPrice.textContent = '$' + price;
    }

    if (engravingText) engravingText.addEventListener('input', updatePrice);
    if (uploadImage) uploadImage.addEventListener('change', updatePrice);
    updatePrice(); // Initial call

    // Quantity buttons
    const quantityInput = document.getElementById('quantityInput');
    const increaseQuantity = document.getElementById('increaseQuantity');
    const decreaseQuantity = document.getElementById('decreaseQuantity');

    if (quantityInput && increaseQuantity && decreaseQuantity) {
        increaseQuantity.addEventListener('click', function() {
            quantityInput.value = parseInt(quantityInput.value) + 1;
        });
        decreaseQuantity.addEventListener('click', function() {
            if (parseInt(quantityInput.value) > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
            }
        });
    }

    // Add to Cart button
   // Add to Cart button
const addToCartBtn = document.getElementById('addToCartBtn');
const customizeForm = document.getElementById('customizeForm');

if (addToCartBtn && customizeForm) {
    addToCartBtn.addEventListener('click', async function (e) {
        e.preventDefault();
        
        try {
            // Create a new FormData object from the form
            const formData = new FormData(customizeForm);
            
            // Add the add_to_cart flag
            formData.append('add_to_cart', '1');

            // Get CSRF token from meta tag
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            const response = await fetch("{{ route('add.to.cart', $tumbler->id) }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: formData
            });

            const data = await response.json();

            if (!response.ok) {
                throw new Error(data.message || 'Failed to add to cart');
            }

            Swal.fire({
                icon: 'success',
                title: 'Added to Cart!',
                text: 'Your customized tumbler has been added to the cart.',
                confirmButtonColor: '#00b206'
            }).then(() => {
                window.location.href = "{{ route('user.viewCart') }}";
            });
        } catch (error) {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: error.message || 'Failed to add to cart. Please try again.'
            });
        }
    });
}
});
</script>
@endsection
