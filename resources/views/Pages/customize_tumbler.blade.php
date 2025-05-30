@extends('Component.header')
@include('TailwindCssLink.style')

@section('title', 'Customize Tumbler')

@section('contents')
    <div class="w-full p-6 mt-20 bg-white shadow-lg">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <div class="flex flex-col items-center relative">
                <div class="h-[560px] w-[350px] flex items-center justify-center mt-12 p-4">
                    <img class="w-full h-full  object-cover rounded-lg" src="black-nobg.png" alt="Tumbler"
                        id="tumblerImage">
                    <!-- Overlay Text -->
                    <div id="textOverlay" class="absolute text-neutral-400 text-3xl font-bold"></div>
                    <!-- Upload Image Overlay -->
                    <img id="uploadedImage" class="absolute hidden"
                        style="max-width: 100px; max-height: 100px; object-fit: contain;" alt="Uploaded Image">
                </div>
            </div>


            <!-- Customization Section -->
            <div class="w-full p-4">
                <h1 class="text-2xl font-bold text-gray-800">THE HOLIDAY QUENCHER H2.0 FLOWSTATE TUMBLER | 40 OZ</h1>

                <!-- Size & Color Selection -->
                <div class="mt-6 border p-6 rounded-lg shadow-md bg-gray-50">
                    <div class="flex items-center justify-between">
                        <!-- Size Selection -->
                        <div class="flex flex-col items-center space-x-2">
                            <span class="text-gray-700 font-semibold text-lg">Size</span>
                            <div
                                class="w-24 h-24 border-4 border-black flex items-center justify-center text-2xl font-bold rounded-full">
                                40 OZ
                            </div>
                        </div>

                        <!-- Vertical Line (Properly Centered) -->
                        <div class="w-[3px] h-16 bg-gray-300 rounded-full"></div>

                        <!-- Color Selection -->
                        <div class="flex flex-col space-x-6 space-y-2 items-center">
                            <span class="font-semibold text-gray-700 text-lg dark:text-gray-300 mb-2">Choose Color</span>
                            <div class="flex items-center space-x-2">
                                <button
                                    class="color-btn w-8 h-8 rounded-full bg-pink-500 border-2 border-transparent hover:border-pink-500 focus:border-gray-700"
                                    data-color="hotpink"></button>
                                <button
                                    class="color-btn w-8 h-8 rounded-full bg-sky-600 border-2 border-transparent hover:border-sky-600 focus:border-gray-700"
                                    data-color="skyblue"></button>
                                <button
                                    class="color-btn w-8 h-8 rounded-full bg-blue-500 border-2 border-transparent hover:border-blue-500 focus:border-gray-700"
                                    data-color="blue"></button>
                                <button
                                    class="color-btn w-8 h-8 rounded-full bg-pink-500 border-2 border-transparent hover:border-pink-500 focus:border-gray-700"
                                    data-color="pink"></button>
                                <button
                                    class="color-btn w-8 h-8 rounded-full bg-black border-2 border-transparent hover:border-black focus:border-gray-700"
                                    data-color="black"></button>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Engraving Section -->
                <div class="mt-6 border p-4 rounded-lg">
                    <label class="text-lg font-semibold text-gray-700">Engraving <span class="text-gray-500">+
                            $10</span></label>
                    <div class="mt-3 flex items-center gap-4">
                        <input type="text" id="engravingText" placeholder="6 Letters only!" maxlength="6"
                            class="border p-3 rounded-lg text-center w-44 smalllcase">
                        <select id="fontSelect" class="border p-3 rounded-lg w-44">
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

                        <!-- Upload Button (Aligned Properly) -->
                        <input type="file" id="uploadImage" class="hidden" accept="image/*">
                        <label for="uploadImage"
                            class="border p-3 rounded-lg text-center border-black cursor-pointer font-semibold text-gray-700 w-40">
                            UPLOAD IMAGE
                        </label>
                        <!-- <button id="deleteImageBtn" class="mt-3 p-2 bg-red-500 text-white rounded-lg hidden">Delete Image</button> -->
                        <button id="deleteImageBtn"
                            class="mt-2 p-1 bg-red-500 text-white rounded text-xs w-18 h-10 hidden">Delete</button>
                        <!-- Custom Modal for Image Size Error -->
                        <div id="imageSizeModal"
                            class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
                            <div class="bg-white p-6 rounded-lg max-w-md w-full">
                                <h2 class="text-xl font-bold text-red-600">Image Size Exceeds Limit!</h2>
                                <p class="text-gray-700 mt-2">Your image is too large! The maximum file size allowed is 1MB.
                                </p>
                                <p class="text-gray-700 mt-2">You can convert your image size here:</p>
                                <a href="https://www.iloveimg.com/resize-image" target="_blank"
                                    class="text-blue-500 underline mt-2 block">Convert your image size here</a>
                                <button id="closeModalBtn"
                                    class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-500">Close</button>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- Quantity Selection -->
                <div class="mt-6">
                    <label class="text-lg font-semibold text-gray-700">Quantity</label>
                    <div class="mt-2 border p-4 rounded-lg flex justify-between items-center">
                        <select id="quantitySelect" class="border p-2 rounded-lg w-20">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                        <button id="addToCartBtn"
                            class="bg-black text-white px-40 py-3 font-bold rounded-lg hover:bg-gray-800 transition">
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
                // Check file size (1MB = 1048576 bytes)
                if (file.size > 1048576) {
                    // Show the modal
                    document.getElementById("imageSizeModal").classList.remove("hidden");

                    // Clear the file input
                    uploadImage.value = "";
                    return;
                }

                const reader = new FileReader();
                reader.onload = function (e) {
                    // Remove previous image if any
                    uploadedImage.src = "";
                    uploadedImage.classList.add("hidden");

                    // Display new image
                    uploadedImage.src = e.target.result;
                    uploadedImage.classList.remove("hidden");
                    deleteImageBtn.classList.remove("hidden");

                    // Adjust size
                    uploadedImage.style.maxWidth = "98px";
                    uploadedImage.style.maxHeight = "100px";
                    uploadedImage.style.objectFit = "contain";

                    // Position the image
                    uploadedImage.style.position = "absolute";
                    uploadedImage.style.top = "46%";
                    uploadedImage.style.left = "50%";
                    uploadedImage.style.transform = "translate(-50%, -50%)";

                    // Disable engraving text and font selection
                    engravingText.disabled = true;
                    fontSelect.disabled = true;
                    engravingText.classList.add("bg-gray-200", "cursor-not-allowed");
                    fontSelect.classList.add("bg-gray-200", "cursor-not-allowed");

                    // Clear text overlay when an image is uploaded
                    textOverlay.textContent = "";
                };
                reader.readAsDataURL(file);
            }
        });

        // Close the modal when the "Close" button is clicked
        document.getElementById("closeModalBtn").addEventListener("click", function () {
            document.getElementById("imageSizeModal").classList.add("hidden");
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
            textOverlay.style.top = "44%";
            textOverlay.style.left = "49%";
            textOverlay.style.transform = "translate(-50%, -50%)";
            textOverlay.style.fontSize = "1.5rem";
            textOverlay.style.fontWeight = "bold";

            if (this.value.trim() !== "") {
                // Disable Upload Image if text is entered
                uploadImage.disabled = true;
                uploadImage.classList.add("cursor-not-allowed", "opacity-50");

                // Change Upload Label Button Style
                document.querySelector("label[for='uploadImage']").classList.add("bg-gray-300", "cursor-not-allowed", "text-gray-500");
            } else {
                // Enable Upload Image if text is cleared
                uploadImage.disabled = false;
                uploadImage.classList.remove("cursor-not-allowed", "opacity-50");

                // Restore Upload Label Button Style
                document.querySelector("label[for='uploadImage']").classList.remove("bg-gray-300", "cursor-not-allowed", "text-gray-500");
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
        // Select all color buttons
       document.addEventListener("DOMContentLoaded", function () {
    const colorButtons = document.querySelectorAll('.color-btn');
    const tumblerImage = document.getElementById('tumblerImage');

    // Function to change the tumbler image based on color
    function changeTumblerColor(color) {
        if (color === "hotpink") {
            tumblerImage.src = "pinkTumbler.png";
        } else if (color === "skyblue") {
            tumblerImage.src = "blueTumbler.png";
        } else if (color === "blue") {
            tumblerImage.src = "https://picresize.com/images/tblue-gray-removebg-preview.png?467171";
        } else if (color === "pink") {
            tumblerImage.src = "https://picresize.com/images/thotpink-red-removebg-preview.png?459703";
        } else if (color === "black") {
            tumblerImage.src = "https://picresize.com/images/tstandley-back.png?400016";
        }
    }

    // Select the first color button by default
    const defaultColorBtn = colorButtons[0];
    defaultColorBtn.classList.add("border-gray-700"); // Highlight the selected color
    changeTumblerColor(defaultColorBtn.getAttribute("data-color")); // Apply first color automatically

    // Event listener for color buttons
    colorButtons.forEach(button => {
        button.addEventListener("click", function () {
            // Remove border from all buttons
            colorButtons.forEach(btn => btn.classList.remove("border-gray-700"));

            // Add border to the selected button
            this.classList.add("border-gray-700");

            // Change tumbler image
            const selectedColor = this.getAttribute("data-color");
            changeTumblerColor(selectedColor);
        });
    });
});

        const quantitySelect = document.getElementById("quantitySelect");
        const addToCartBtn = document.getElementById("addToCartBtn");
        const basePrice = 42.00; // Base price for one tumbler

        quantitySelect.addEventListener("change", function () {
            const quantity = parseInt(this.value); // Get selected quantity
            const totalPrice = (basePrice * quantity).toFixed(2); // Calculate total price

            // Update Add to Cart button with the new price
            addToCartBtn.textContent = `$${totalPrice} - ADD TO CART`;
        });

        document.addEventListener("DOMContentLoaded", function () {
    const colorButtons = document.querySelectorAll('.color-btn');
    const tumblerImage = document.getElementById('tumblerImage');

    // Function to change the tumbler image based on color
    function changeTumblerColor(color) {
        if (color === "hotpink") {
            tumblerImage.src = "pinkTumbler.png";
        } else if (color === "skyblue") {
            tumblerImage.src = "blueTumbler.png";
        } else if (color === "blue") {
            tumblerImage.src = "https://picresize.com/images/tblue-gray-removebg-preview.png?467171";
        } else if (color === "pink") {
            tumblerImage.src = "https://picresize.com/images/thotpink-red-removebg-preview.png?459703";
        } else if (color === "black") {
            tumblerImage.src = "https://picresize.com/images/tstandley-back.png?400016";
        }
    }

    // Select the first color button by default
    const defaultColorBtn = colorButtons[0];
    defaultColorBtn.classList.add("border-gray-700"); // Highlight the selected color
    changeTumblerColor(defaultColorBtn.getAttribute("data-color")); // Apply first color automatically

    // Event listener for color buttons
    colorButtons.forEach(button => {
        button.addEventListener("click", function () {
            // Remove border from all buttons
            colorButtons.forEach(btn => btn.classList.remove("border-gray-700"));

            // Add border to the selected button
            this.classList.add("border-gray-700");

            // Change tumbler image
            const selectedColor = this.getAttribute("data-color");
            changeTumblerColor(selectedColor);
        });
    });
});

    </script>

@endsection
