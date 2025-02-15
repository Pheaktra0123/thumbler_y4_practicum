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

                                    <!-- Input for color code -->
                                    <div class="flex space-x-2">
                                        <input type="text" id="color_input" name="colors" value="#" placeholder="Enter color code (e.g., #FF0000)" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                        <button type="button" onclick="addColor()" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Add Color</button>
                                    </div>

                                    <!-- Hidden input to store JSON data for colors -->
                                    <input type="hidden" name="colors" id="colors_json">

                                    <!-- Display area for added colors -->
                                    <div id="color_display" name="colors" class="mt-4 flex flex-wrap items-center gap-2 text-sm justify-start item-content-center place-item-center">
                                        <!-- Colors will be dynamically added here -->
                                    </div>
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="sizes_input" class="block mb-2 text-sm font-medium text-gray-900">Add Available Size</label>

                                    <!-- Input for Size number -->
                                    <div class="flex space-x-2">
                                        <input type="number" id="size_input" name="size" placeholder="Enter item size available (e.g.2l,3l)" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                        <button type="button" onclick="addSize()" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5">Add Size</button>
                                    </div>

                                    <!-- Display area for added size -->
                                    <div id="size_display"  name="sizes" class="mt-4  flex flex-wrap items-center gap-2 text-sm justify-start item-content-center place-item-center">
                                        <!-- Sizes will be dynamically added here -->
                                    </div>
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
                                    <label for="thumbnails" class="block mb-2 text-sm font-medium">Upload Category Images</label>
                                    <div class="w-[370px] relative border-2 border-gray-300 border-dashed rounded-lg p-6" id="dropzone">
                                        <input type="file" name="thumbnails[]" class="absolute inset-0 w-full h-full opacity-0 z-50" id="file-upload" multiple>
                                        <div class="text-center">
                                            <img class="mx-auto h-10 w-10" src="https://www.svgrepo.com/show/357902/image-upload.svg" alt="">
                                            <h3 class="mt-2 text-sm font-medium text-gray-900">
                                                <label for="file-upload" class="relative cursor-pointer">
                                                    <span>Drag and drop</span>
                                                    <span class="text-indigo-600"> or browse</span>
                                                    <span>to upload</span>
                                                </label>
                                            </h3>
                                            <p class="mt-1 text-xs text-gray-500">
                                                PNG, JPG, GIF up to 10MB
                                            </p>
                                        </div>
                                        <div id="preview-container" class="mt-4"></div>
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
                                        <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-500 capitalize">Point Rate</th>
                                        <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-500 capitalize">Amount</th>
                                        <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-500 capitalize">Color Available</th>
                                        <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-500 capitalize">Size Available</th>
                                        <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-500 capitalize"> Thumbnail</th>
                                        <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-500 capitalize rounded-t-xl"> Actions </th>
                                    </tr>
                                </thead>

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
        const colorInput = document.getElementById('color_input');
        const colorCode = colorInput.value.trim();

        // Validate the color code
        if (!isValidColor(colorCode)) {
            alert('Please enter a valid color code (e.g., #FF0000 or rgb(255, 0, 0)).');
            return;
        }

        // Create a container for the color display and remove button
        const colorContainer = document.createElement('div');
        colorContainer.className = 'flex items-center space-x-2';

        // Create a color display box
        const colorBox = document.createElement('div');
        colorBox.className = 'w-8 h-8 rounded-lg border border-gray-300';
        colorBox.style.backgroundColor = colorCode;

        // Create a text element to show the color code
        const colorText = document.createElement('span');
        colorText.textContent = colorCode;
        colorText.className = 'text-sm text-gray-900';

        // Create a remove button
        const removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.textContent = 'Remove';
        removeButton.className = 'text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-1';
        removeButton.onclick = function() {
            colorContainer.remove();
            updateColorsJson();
        };

        // Append elements to the container
        colorContainer.appendChild(colorBox);
        colorContainer.appendChild(colorText);
        colorContainer.appendChild(removeButton);

        // Append the container to the display area
        document.getElementById('color_display').appendChild(colorContainer);

        // Clear the input field
        colorInput.value = '';

        // Update the hidden input with JSON data
        updateColorsJson();
    }

    function updateColorsJson() {
        // Get all color text elements
        const colors = Array.from(document.querySelectorAll('#color_display span')).map(span => span.textContent);
        // Update the hidden input with JSON data
        document.getElementById('colors_json').value = JSON.stringify(colors);
    }

    function addSize() {
        const sizeInput = document.getElementById('size_input');
        const sizeValue = sizeInput.value.trim();

        if (!sizeValue) {
            alert('Please enter a valid size value.');
            return;
        }

        const sizeContainer = document.createElement('div');
        sizeContainer.className = 'flex items-center space-x-2';

        const sizeBox = document.createElement('div');
        sizeBox.className = 'px-3 py-1.5 bg-gray-100 text-gray-900 rounded-lg';
        sizeBox.textContent = sizeValue;

        const removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.textContent = 'Remove';
        removeButton.className = 'text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-1';
        removeButton.onclick = function() {
            sizeContainer.remove();
            updateSizesJson();
        };

        sizeContainer.appendChild(sizeBox);
        sizeContainer.appendChild(removeButton);

        document.getElementById('size_display').appendChild(sizeContainer);
        sizeInput.value = '';
        updateSizesJson();
    }

    function updateSizesJson() {
        const sizes = Array.from(document.querySelectorAll('#size_display div')).map(div => div.textContent);
        document.getElementById('sizes_json').value = JSON.stringify(sizes);
    }
</script>
@endsection