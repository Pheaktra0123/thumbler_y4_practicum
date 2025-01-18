<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"></script>
    <script>
        function toggleMenu() {
            const menu = document.getElementById("menu");
            menu.classList.toggle("hidden");
        }
    </script>
</head>
<body class="bg-gray-100">
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white/50 bg-opacity-90 backdrop-blur-md">
        <div class="max-w-9xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex-shrink-0">
                    <a href="/" class="text-black font-bold text-2xl">
                        TUMBLER SHOP
                    </a>
                </div>
                <div class="hidden md:block uppercase">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="#" class="text-sm font-medium text-gray-900 hover:text-gray-600 px-3 py-2 rounded-md transition-colors duration-300">Home</a>
                        <a href="#" class="text-sm font-medium text-gray-900 hover:text-gray-600 px-3 py-2 rounded-md transition-colors duration-300">Category</a>
                        <a href="#" class="text-sm font-medium text-gray-900 hover:text-gray-600 px-3 py-2 rounded-md transition-colors duration-300">Model</a>
                        <a href="#" class="text-sm font-medium text-gray-900 hover:text-gray-600 px-3 py-2 rounded-md transition-colors duration-300">New Trending</a>
                        <a href="#about-us" class="text-sm font-medium text-gray-900 hover:text-gray-600 px-3 py-2 rounded-md transition-colors duration-300">About Us</a>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center justify-center md:ml-6 gap-2">
                        <div class="relative flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path fill-rule="evenodd" d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
                            </svg>
                            <a href="#" class="text-sm font-medium text-gray-900 hover:text-gray-600 px-3 py-2 rounded-md transition-colors duration-300">Location</a>
                        </div>
                        <div class="relative flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path fill-rule="evenodd" d="M20.599 1.5c-.376 0-.743.111-1.055.32l-5.08 3.385a18.747 18.747 0 0 0-3.471 2.987 10.04 10.04 0 0 1 4.815 4.815 18.748 18.748 0 0 0 2.987-3.472l3.386-5.079A1.902 1.902 0 0 0 20.599 1.5Zm-8.3 14.025a18.76 18.76 0 0 0 1.896-1.207 8.026 8.026 0 0 0-4.513-4.513A18.75 18.75 0 0 0 8.475 11.7l-.278.5a5.26 5.26 0 0 1 3.601 3.602l.502-.278ZM6.75 13.5A3.75 3.75 0 0 0 3 17.25a1.5 1.5 0 0 1-1.601 1.497.75.75 0 0 0-.7 1.123 5.25 5.25 0 0 0 9.8-2.62 3.75 3.75 0 0 0-3.75-3.75Z" clip-rule="evenodd" />
                            </svg>
                            <a href="/customize" class="text-sm font-medium text-gray-900 hover:text-gray-600 px-3 py-2 rounded-md transition-colors duration-300">Customize</a>
                        </div>
                        <div id="cartIcon" class="relative flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z" clip-rule="evenodd" />
                            </svg>
                            <a href="#" class="text-sm font-medium text-gray-900 hover:text-gray-600 px-3 py-2 rounded-md transition-colors duration-300">Cart</a>
                        </div>
                        @if (Route::has('login'))
                        @auth
                        <div class="relative flex items-center place-items-center  justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                            </svg>
                            <div id="" class="text-sm font-medium text-gray-900  px-3 rounded-md transition-colors duration-300">{{auth()->user()->username}}</div>
                        </div>
                        @else
                        <div class="relative flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                            </svg>
                            <a href="/login" class="text-sm font-medium text-gray-900 hover:text-gray-600 px-3 py-2 rounded-md transition-colors duration-300">Login</a>
                        </div>
                        @endauth
                        @endif
                    </div>
                </div>
                <div class="md:hidden">
                    <button onclick="toggleMenu()" class="inline-flex items-center justify-center p-2 rounded-md text-gray-900 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                        <span class="sr-only">Open main menu</span>
                        <svg id="menu-icon" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 12h18M3 6h18M3 18h18"></path>
                        </svg>
                        <svg id="close-icon" class="h-6 w-6 hidden" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div id="menu" class="md:hidden hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="#" class="text-sm block font-medium text-gray-900 hover:text-gray-600 px-3 py-2 rounded-md transition-colors duration-300">Home</a>
                <a href="#" class="text-sm block font-medium text-gray-900 hover:text-gray-600 px-3 py-2 rounded-md transition-colors duration-300">Category</a>
                <a href="#" class="text-sm block font-medium text-gray-900 hover:text-gray-600 px-3 py-2 rounded-md transition-colors duration-300">Model</a>
                <a href="#" class="text-sm block font-medium text-gray-900 hover:text-gray-600 px-3 py-2 rounded-md transition-colors duration-300">New Trending</a>
                <a href="#about-us" class="text-sm block font-medium text-gray-900 hover:text-gray-600 px-3 py-2 rounded-md transition-colors duration-300">About Us</a>
            </div>
            <hr class="border-gray-300 w-full">
            <div class="flex item-center justify-center gap-2 py-2">
                <div class="relative flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd" d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
                    </svg>
                    <a href="#" class="text-sm font-medium text-gray-900 hover:text-gray-600 px-3 py-2 rounded-md transition-colors duration-300">Location</a>
                </div>
                <div class="relative flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd" d="M20.599 1.5c-.376 0-.743.111-1.055.32l-5.08 3.385a18.747 18.747 0 0 0-3.471 2.987 10.04 10.04 0 0 1 4.815 4.815 18.748 18.748 0 0 0 2.987-3.472l3.386-5.079A1.902 1.902 0 0 0 20.599 1.5Zm-8.3 14.025a18.76 18.76 0 0 0 1.896-1.207 8.026 8.026 0 0 0-4.513-4.513A18.75 18.75 0 0 0 8.475 11.7l-.278.5a5.26 5.26 0 0 1 3.601 3.602l.502-.278ZM6.75 13.5A3.75 3.75 0 0 0 3 17.25a1.5 1.5 0 0 1-1.601 1.497.75.75 0 0 0-.7 1.123 5.25 5.25 0 0 0 9.8-2.62 3.75 3.75 0 0 0-3.75-3.75Z" clip-rule="evenodd" />
                    </svg>
                    <a href="#" class="text-sm font-medium text-gray-900 hover:text-gray-600 px-3 py-2 rounded-md transition-colors duration-300">Customize</a>
                </div>
                <div class="relative flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z" clip-rule="evenodd" />
                    </svg>
                    <a href="#" class="text-sm font-medium text-gray-900 hover:text-gray-600 px-3 py-2 rounded-md transition-colors duration-300">Cart</a>
                </div>
                <div class="relative flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                    </svg>
                    <a href="/login" class="text-sm font-medium text-gray-900 hover:text-gray-600 px-3 py-2 rounded-md transition-colors duration-300">Login</a>
                </div>
            </div>
        </div>
    </nav>
    <main>
        <div class="max-w-7xl mx-auto ">
            <div>@yield('contents')</div>
        </div>
    </main>
</body>

</html>