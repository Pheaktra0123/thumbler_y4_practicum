@extends("TailwindCssLink.style")
@extends("Component.Nav_Dashbord")
@section('contents')
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Products</title>
</head>

<body>
    <main>
        <section>
            <div class="flex gap-2 p-5">
                <h1 class="text-3xl font-bold text-gray-700">Products</h1>
                <span class="bg-gray-200 text-sm text-red-900 content-center px-2 font-medium rounded-xl">3 Models</span>
            </div>
            <div class="flex justify-between px-5 item-center">
                <p class="text-lg content-center font-bold">All</p>
                <div>
                    <input placeholder="Find products" type="text" name="" id="" class="outline-none bg-gray-200 p-2 w-[300px] rounded-md">
                    <select id="selection" class="py-2 px-4 bg-gray-200 rounded-md outline-none text-gray-400">
                        <option class="outline-none " value="Status">Status</option>
                        <option value="now" class="outline-none">now</option>
                    </select>
                </div>
                <button id="showNew" class="bg-blue-500 text-white text-sm p-2 rounded-md" onclick="openModal('modelConfirm')">New Product</button>
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

                    <div class="p-6 pt-0 text-center w-11/12 mx-auto">
                        <div class="container mx-auto p-4">
                            <!-- Page Title -->
                            <h1 class="text-3xl font-bold text-[black] mb-6">Create Product</h1>

                            <form action="">
                                <div class="flex  gap-4">
                                    <input type="text" placeholder="Product Name" class="w-full p-2 border border-gray-200 rounded-lg mb-4 outline-none">
                                    <input type="text" placeholder="Product Description" class="w-full p-2 border border-gray-200 rounded-lg mb-4 outline-none">
                                </div>
                            </form>

                        </div>
                        <a href="#" onclick="closeModal('modelConfirm')"
                            class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2">
                            Create
                        </a>
                        <a href="#" onclick="closeModal('modelConfirm')"
                            class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center"
                            data-modal-toggle="delete-user-modal">
                            Cancel
                        </a>
                    </div>

                </div>
            </div>

        </section>
    </main>
</body>

</html>
<script>
    window.openModal = function(modalId) {
        document.getElementById(modalId).style.display = 'block'
        document.getElementsByTagName('body')[0].classList.add('overflow-y-hidden')
    }

    window.closeModal = function(modalId) {
        document.getElementById(modalId).style.display = 'none'
        document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
    }

    // Close all modals when press ESC
    document.onkeydown = function(event) {
        event = event || window.event;
        if (event.keyCode === 27) {
            document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
            let modals = document.getElementsByClassName('modal');
            Array.prototype.slice.call(modals).forEach(i => {
                i.style.display = 'none'
            })
        }
    };
</script>
@endsection