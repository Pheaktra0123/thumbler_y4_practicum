@extends('TailwindCssLink.style')
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    <title>Document</title>
</head>
<style>
    #toggle-logout-active {
        z-index: 50;
    }

    /* Transparent backdrop with blur */
    #backdrop {
        z-index: 40;
        backdrop-filter: blur(4px);
        /* Apply the blur effect */
    }
</style>
<body id="body">
    <header class="shadow-lg">
        <nav class="flex justify-between item-center bg-blue-900 p-3">
            <div class="text-xl text-gray-200 font-bold uppercase">
                Tumbler Haven
            </div>
            <div class="place-content-center">
                <ul class="flex gap-1">
                    <li class=" p-2 text-gray-300 rounded-full  hover:bg-gray-600 delay-600 hover:transition hover:duration-500 hover:ease-in-out ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                        </svg>
                    </li>
                    <li class=" p-2 text-gray-300 rounded-full   hover:bg-gray-600 delay-600 hover:transition hover:duration-500 hover:ease-in-out ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                    </li>
                    <li id="toggle-logout" class=" p-2 text-gray-300 rounded-full  hover:bg-gray-600 delay-600 hover:transition hover:duration-500 hover:ease-in-out ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                        </svg>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div id="toggle-logout-active" tabindex="-1" class="hidden absolute z-10 max-w-full left-[45%] top-[40%] w-1/4 h-1/3 bg-gray-200 flex-col justify-center place-content-center rounded-md shadow-gray-100 drop-shadow-lg transition duration-600 delay-600">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-16 h-16 mx-auto text-red-600">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
        </svg>
        <p class="text-2xl font-semi-bold text-center text-gray-600 py-3">Do you want to logout ?</p>
        <div class="flex-col w-full mt-6">
            <div class="flex justify-center">
                <button id="cancel-button" type="button" class="border-2 w-1/3 border-gray-400 rounded-3xl text-md text-gray-900 px-4 py-2 mx-4 hover:bg-gray-400 hover:text-white">Cancel</button>
                <a href="/logout" class="bg-red-600 w-1/3 text-md text-white text-center rounded-3xl px-4 py-2 mr-4 hover:bg-red-700 hover:text-gray-100">
                    <button type="button">Logout</button>
                </a>
            </div>
        </div>
    </div>
    <div id="backdrop" class="hidden fixed inset-0 bg-black bg-opacity-30 backdrop-blur-sm"></div>
    <div class=" flex bg-gray-100 ">
        <!-- sidebar -->
        <div class="max-w-full w-1/4 flex flex-col bg-sky-900 rounded-br-lg">
            <div class="flex flex-col mt-2">
                <nav class="text-sm text-gray-300 [&::-webkit-scrollbar]:w-2
            [&::-webkit-scrollbar-track]:bg-gray-100
            [&::-webkit-scrollbar-track]:rounded-sm
            [&::-webkit-scrollbar-thumb]:bg-gray-300
            [&::-webkit-scrollbar-thumb]:rounded-full
            [&::-webkit-scrollbar-thumb]:
                     mx-2">
                    <ul class="flex flex-col">
                        <li name="active" data-id="dashboard" class="px-4 cursor-pointer mx-1 rounded-md hover:bg-gray-700  hover:text-white active:bg-gray-900 ">
                            <a class="py-3 flex items-center" href="/Admin/Dashboard">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-4 mr-3">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                                </svg>

                                Dashboard
                            </a>
                        </li>
                        <li class="px-4 py-2 text-xs uppercase tracking-wider mx-1 rounded-md text-gray-500 font-bold">USER MANAGEMENT</li>
                        <li name="active" data-id="user" class="px-4 cursor-pointer mx-1 rounded-md hover:bg-gray-700">
                            <a class="py-3 flex items-center" href="/Admin/customer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-4 mr-3">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                </svg>
                                Users
                            </a>
                        </li>
                        <li name="active" data-id="roles" class="px-4 cursor-pointer mx-1 rounded-md hover:bg-gray-700">
                            <a class="py-3 flex items-center" href="{{ route('admin.users.role') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-4 mr-3">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 0 1 1.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.559.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.894.149c-.424.07-.764.383-.929.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 0 1-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.398.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 0 1-.12-1.45l.527-.737c.25-.35.272-.806.108-1.204-.165-.397-.506-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.108-1.204l-.526-.738a1.125 1.125 0 0 1 .12-1.45l.773-.773a1.125 1.125 0 0 1 1.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                                Roles
                            </a>
                        </li>
                        <li class="px-4 py-2 text-xs uppercase tracking-wider mx-1 rounded-md text-gray-500 font-bold">PRODUCT MANAGEMENT</li>
                        <li name="active" data-id="categories" class="px-4 cursor-pointer hover:bg-gray-700 mx-1 rounded-md">
                            <a class="py-3 flex items-center" href="/Admin/Categories">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-4 mr-3">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6 6.878V6a2.25 2.25 0 0 1 2.25-2.25h7.5A2.25 2.25 0 0 1 18 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 0 0 4.5 9v.878m13.5-3A2.25 2.25 0 0 1 19.5 9v.878m0 0a2.246 2.246 0 0 0-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0 1 21 12v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6c0-.98.626-1.813 1.5-2.122" />
                                </svg>

                                Categories
                            </a>
                        </li>
                        <li name="active" data-id="model" class="px-4 cursor-pointer hover:bg-gray-700 mx-1 rounded-md">
                            <a class="py-3 flex items-center" href="/Admin/Model">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 mr-3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                                </svg>
                                Model
                            </a>
                        </li>
                        <li name="active" data-id="trending" class="px-4 cursor-pointer hover:bg-gray-700 mx-1 rounded-md">
                            <a class="py-3 flex items-center" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 mr-3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                                </svg>

                                New Trending
                            </a>
                        </li>
                        <li name="active" data-id="products" class="px-4 cursor-pointer hover:bg-gray-700 mx-1 rounded-md">
                            <a class="py-3 flex items-center" href="{{ route('Admin.view.tumbler')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-4 mr-3">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 11.25v8.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5v-8.25M12 4.875A2.625 2.625 0 1 0 9.375 7.5H12m0-2.625V7.5m0-2.625A2.625 2.625 0 1 1 14.625 7.5H12m0 0V21m-8.625-9.75h18c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125h-18c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                </svg>

                                Products
                            </a>
                        </li>
                        <li class="px-4 py-2 text-xs uppercase tracking-wider text-gray-500 font-bold mx-1 rounded-md">ecommerce</li>
                        <li name="active" data-id="orders" class="px-4 hover:bg-gray-700 mx-1 rounded-md">
                            <a href="#" class="py-3 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-4 mr-3">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                </svg>
                                Orders
                            </a>
                        </li>
                        <li name="active" data-id="payment" class="px-4 hover:bg-gray-700 mx-1 rounded-md">
                            <a href="#" class="py-3 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-4 mr-3">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                                </svg>
                                Payments
                            </a>
                        </li>
                        <li class="px-4 py-2 text-xs uppercase tracking-wider text-gray-500 font-bold mx-1 rounded-md">INFORMATION MANAGEMENT</li>
                        <li name="active" data-id="report" class="px-4 hover:bg-gray-700">
                            <a href="#" class="py-3 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 mr-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
                                </svg>
                                Reports
                                <span class="ml-auto text-xs bg-red-500 px-2 py-1 rounded-sm">0</span>
                            </a>
                        </li>
                        <li class="px-4 py-2 mt-2 text-xs uppercase tracking-wider text-gray-500 font-bold mx-1 rounded-md">Apps</li>
                        <li name="active" data-id="message" class="px-4 cursor-pointer hover:bg-gray-700 mx-1 rounded-md">
                            <a href="#" class="py-2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 mr-3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 3.75H6.912a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H15M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859M12 3v8.25m0 0-3-3m3 3 3-3" />
                                </svg>

                                Messages
                                <span class="ml-auto text-xs bg-red-500 px-2 py-1 rounded-sm">0</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- Main content -->
        <div class="flex flex-col w-full max-h-screen overflow-y-auto relative ">
            <div class="">@yield('contents')</div>
        </div>
    </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const toggleButton = document.getElementById("toggle-logout");
        const modal = document.getElementById("toggle-logout-active");
        const backdrop = document.getElementById("backdrop");
        const cancelButton = document.getElementById("cancel-button");

        // Show the modal and backdrop
        toggleButton.addEventListener("click", function() {
            modal.classList.remove("hidden");
            backdrop.classList.remove("hidden");
        });

        // Hide the modal and backdrop
        cancelButton.addEventListener("click", function() {
            modal.classList.add("hidden");
            backdrop.classList.add("hidden");
        });
    });

    const activeItems = document.getElementsByName("active");
    document.addEventListener("DOMContentLoaded", function() {
        const ButtonToggle = document.getElementById("toggle-logout");
        ButtonToggle.addEventListener("click", function() {
            this.classList.add("active-toggle");
        });
    })
    let isToggled = false;
    // Load the active item from localStorage
    const savedActiveId = localStorage.getItem("activeItemId");
    const saveActiveName = localStorage.getItem("activeItemName");
    if (savedActiveId) {
        const activeItem = document.querySelector(`[data-id="${savedActiveId}"]`);
        if (activeItem) {
            setActiveItem(activeItem);
        }
    }

    // Add click event listeners
    activeItems.forEach(function(item) {
        item.addEventListener('click', function() {
            // Save the clicked item's ID to localStorage
            const itemId = item.getAttribute("data-id");
            localStorage.setItem("activeItemId", itemId);

            // Set the clicked item as active
            setActiveItem(item);
            const route = item.querySelector("a");
            if (route) {
                window.location.href = route.href
            }
        });
    });

    // Helper function to set the active item
    function setActiveItem(item) {
        // Reset styles for all items
        activeItems.forEach(function(i) {
            i.style.background = '';
            i.classList.remove("bg-gray-500", "text-white");
        });

        // Set the active style
        item.style.background = '#6b7280';
        item.classList.add("bg-gray-500", "text-white");
    }
</script>

</html>