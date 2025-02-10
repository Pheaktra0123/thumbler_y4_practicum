@extends('Component.header')
@include('TailwindCssLink.style')

@section('title', 'Customize Tumbler')

@section('contents')
<div class="w-full p-6 mt-20 bg-white shadow-lg">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

        <div class="flex flex-col items-center relative">
            <div class="h-[560px] w-[350px] flex items-center justify-center mt-12 p-4">
                <img class="w-full h-full object-cover rounded-lg" src="https://picresize.com/images/tstandley-back.png?101065" alt="Tumbler" id="tumblerImage">
                <!-- Overlay Text -->
                <div id="textOverlay" class="absolute text-white text-3xl font-bold"></div>
                <!-- Upload Image Overlay -->
                <img id="uploadedImage" class="absolute hidden" style="max-width: 100px; max-height: 100px; object-fit: contain;" alt="Uploaded Image">
            </div>
        </div>


        <!-- Customization Section -->
        <div class="w-full p-4">
            <h1 class="text-2xl font-bold text-gray-800">THE HOLIDAY QUENCHER H2.0 FLOWSTATE TUMBLER | 40 OZ</h1>

            <!-- Size & Color Selection -->
            <div class="mt-6 border p-6 rounded-lg shadow-md bg-gray-50">
                <div class="flex items-center justify-between">
                    <!-- Size Selection -->
                    <div class="flex flex-col items-center space-y-2">
                        <span class="text-gray-700 font-semibold text-lg">Size</span>
                        <div
                            class="w-24 h-24 border-4 border-black flex items-center justify-center text-2xl font-bold rounded-full">
                            40 OZ
                        </div>
                    </div>

                    <!-- Vertical Line (Properly Centered) -->
                    <div class="w-[3px] h-16 bg-gray-300 rounded-full"></div>

                    <!-- Color Selection -->
                    <div class="flex flex-col items-center">
                        <span class="font-semibold text-gray-700 text-lg dark:text-gray-300 mb-2">Choose Color</span>
                        <div class="flex items-center space-x-2">
                            <button
                                class="color-btn w-8 h-8 rounded-full bg-gray-800 border-2 border-transparent hover:border-gray-500 focus:border-gray-700"></button>
                            <button
                                class="color-btn w-8 h-8 rounded-full bg-red-500 border-2 border-transparent hover:border-red-500 focus:border-red-700"></button>
                            <button
                                class="color-btn w-8 h-8 rounded-full bg-blue-500 border-2 border-transparent hover:border-blue-500 focus:border-blue-700"></button>
                            <button
                                class="color-btn w-8 h-8 rounded-full bg-pink-500 border-2 border-transparent hover:border-pink-500 focus:border-pink-700"></button>
                            <button
                                class="color-btn w-8 h-8 rounded-full bg-black border-2 border-transparent hover:border-black focus:border-gray-400"></button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Engraving Section -->
            <div class="mt-6 border p-4 rounded-lg">
                <label class="text-lg font-semibold text-gray-700">Engraving <span class="text-gray-500">+
                        $10</span></label>
                <div class="mt-3 flex items-center gap-4">
                    <input type="text" id="engravingText" placeholder="5 Letters only!" class="border p-3 rounded-lg text-center w-44">

                    <select class="border p-3 rounded-lg w-44">
                        <option selected disabled>Select Font</option>
                        <option value="serif">Serif</option>
                        <option value="sans-serif">Sans-Serif</option>
                        <option value="cursive">Cursive</option>
                    </select>
                    <div class="w-[3px] h-12 bg-gray-300 rounded-full"></div>

                    <!-- Upload Button (Aligned Properly) -->
                    <input type="file" id="uploadImage" class="hidden" accept="image/*">
                    <label for="uploadImage"
                        class="border p-3 rounded-lg text-center border-black cursor-pointer font-semibold text-gray-700 w-44">
                        UPLOAD IMAGE
                    </label>
                    <!-- <button id="deleteImageBtn" class="mt-3 p-2 bg-red-500 text-white rounded-lg hidden">Delete Image</button> -->
                    <button id="deleteImageBtn" class="mt-2 p-1 bg-red-500 text-white rounded text-xs w-20 h-8 hidden">Delete</button>


                </div>
            </div>
            <!-- Quantity Selection -->
            <div class="mt-6">
                <label class="text-lg font-semibold text-gray-700">Quantity</label>
                <div class="mt-2 border p-4 rounded-lg flex justify-between items-center">
                    <select class="border p-2 rounded-lg w-20">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                    <button class="bg-black text-white px-40 py-3 font-bold rounded-lg hover:bg-gray-800 transition">
                        $42.00 - ADD TO CART
                    </button>
                </div>
            </div>

            <!-- Share Button -->
            <div class="mt-6">
                <button class="border p-3 w-full rounded-lg text-center hover:bg-gray-100">SHARE</button>
            </div>

        </div>
    </div>
</div>
<!-- <script>
    document.querySelectorAll(".color-btn").forEach(button => {
        button.addEventListener("click", function () {
            const newImage = this.getAttribute("data-image");
            document.getElementById("tumblerImage").src = newImage;
        });
    });
    document.getElementById("uploadImage").addEventListener("change", function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const uploadedImage = document.getElementById("uploadedImage");
                uploadedImage.src = e.target.result;
                uploadedImage.classList.remove("hidden");
                document.getElementById("deleteImageBtn").classList.remove("hidden");

            };
            reader.readAsDataURL(file);
        }
    });
    document.getElementById("deleteImageBtn").addEventListener("click", function () {
    const uploadedImage = document.getElementById("uploadedImage");
    uploadedImage.src = ""; // Remove image source
    uploadedImage.classList.add("hidden"); // Hide image

    // Hide delete button
    this.classList.add("hidden");

    // Clear the input file selection (optional)
    document.getElementById("uploadImage").value = "";
});

    document.getElementById('engravingText').addEventListener('input', function() {
        const text = this.value;
        const textOverlay = document.getElementById('textOverlay');

        // Set the text overlay content
        textOverlay.textContent = text;

        // Position the text overlay on the image (you can adjust the position as needed)
        textOverlay.style.top = '50%';
        textOverlay.style.left = '50%'; // Adjust the horizontal position
        textOverlay.style.transform = 'translate(-50%, -50%)';  // Center the text
    });
</script> -->
<script>
    const uploadImage = document.getElementById("uploadImage");
    const engravingText = document.getElementById("engravingText");
    const fontSelect = document.querySelector("select");
    const uploadedImage = document.getElementById("uploadedImage");
    const deleteImageBtn = document.getElementById("deleteImageBtn");
    const textOverlay = document.getElementById("textOverlay");

    // Handle Image Upload
    uploadImage.addEventListener("change", function (event) {
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                uploadedImage.src = e.target.result;
                uploadedImage.classList.remove("hidden");
                deleteImageBtn.classList.remove("hidden");

                // Disable engraving text and font selection
                engravingText.disabled = true;
                fontSelect.disabled = true;
                engravingText.classList.add("bg-gray-200", "cursor-not-allowed");
                fontSelect.classList.add("bg-gray-200", "cursor-not-allowed");

                // Clear text overlay when image is uploaded
                textOverlay.textContent = "";
            };
            reader.readAsDataURL(file);
        }
    });

    // Handle Delete Image
    deleteImageBtn.addEventListener("click", function () {
        uploadedImage.src = "";
        uploadedImage.classList.add("hidden");
        this.classList.add("hidden");

        // Enable engraving text and font selection
        engravingText.disabled = false;
        fontSelect.disabled = false;
        engravingText.classList.remove("bg-gray-200", "cursor-not-allowed");
        fontSelect.classList.remove("bg-gray-200", "cursor-not-allowed");

        // Clear file input
        uploadImage.value = "";
    });

    // Handle Engraving Text Input
    engravingText.addEventListener("input", function () {
        textOverlay.textContent = this.value; // Update text overlay on image

        // Position the text overlay (Center it)
        textOverlay.style.position = "absolute";
        textOverlay.style.top = "40%";
        textOverlay.style.left = "48%";
        textOverlay.style.transform = "translate(-50%, -50%)";
        textOverlay.style.fontSize = "3rem";
        textOverlay.style.fontWeight = "bold";

        // Disable Upload Image if text is entered
        if (this.value.trim() !== "") {
            uploadImage.disabled = true;
            uploadImage.classList.add("cursor-not-allowed", "opacity-50");
        } else {
            uploadImage.disabled = false;
            uploadImage.classList.remove("cursor-not-allowed", "opacity-50");
        }
    });

    // Handle Font Selection
    fontSelect.addEventListener("change", function () {
        // Apply selected font to text overlay
        textOverlay.style.fontFamily = this.value;

        // Disable Upload Image if a font is selected
        if (this.value !== "Select Font") {
            uploadImage.disabled = true;
            uploadImage.classList.add("cursor-not-allowed", "opacity-50");
        } else {
            uploadImage.disabled = false;
            uploadImage.classList.remove("cursor-not-allowed", "opacity-50");
        }
    });
</script>

@endsection
