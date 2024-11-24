@extends("TailwindCssLink.style")
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class=" w-full">
        <header
            class="bg-black text-white w-full relative flex flex-col overflow-hidden px-4 py-4 lg:mx-auto lg:flex-row lg:items-center">
            <a href="#" class="flex font-serif items-center whitespace-nowrap text-2xl font-bold text-white">
                Tumbler Haven
            </a>
            <input type="checkbox" class="peer hidden" id="navbar-open" />
            <label class="absolute top-5 right-5 cursor-pointer lg:hidden" for="navbar-open">
                <span class="sr-only">Toggle Navigation</span>
                <svg class="h-7 w-7 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </label>
            <nav aria-label="Header Navigation"
                class="peer-checked:pt-8 peer-checked:max-h-60 flex max-h-0 w-full flex-col items-center overflow-hidden transition-all lg:ml-24 lg:max-h-full lg:flex-row">
                <ul class="flex w-full flex-col items-center space-y-2 lg:flex-row lg:justify-center lg:space-y-0">
                    <li class="lg:mr-12"><a class="text-white transition hover:opacity-70" href="#">Home</a></li>
                    <li class="lg:mr-12"><a class="text-white transition hover:opacity-70" href="#">About Us</a></li>
                    <li class="lg:mr-12"><a class="text-white transition hover:opacity-70" href="#">Customize</a></li>
                </ul>
                <hr class="mt-4 w-full lg:hidden" />
                <div class="my-4 flex items-center space-x-6 space-y-2 lg:my-0 lg:ml-auto lg:space-x-8 lg:space-y-0">
                    <a href="#" title="Login" class="font-bold text-white hover:opacity-70">Login</a>
                    <a href="#" title="Cart" class="text-white hover:opacity-70"><svg class="h-8 w-8" fill="none"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h11l4-8H5.4M7 13L5.4 5M7 13l-1.4-2M10 21a1 1 0 100-2 1 1 0 000 2zm7 0a1 1 0 100-2 1 1 0 000 2z" />
                        </svg></a>
                </div>
            </nav>
        </header>

        <!-- forked from: https://codepen.io/cuonoj/pen/JjPmMaB -->
        <div>
            <section class="relative h-screen flex flex-col items-center justify-center text-center text-white ">
                <div class="video-docker absolute top-0 left-0 w-full h-full overflow-hidden">
                    <video class="min-w-full min-h-full absolute object-cover" src="Download.mp4" type="video/mp4"
                        autoplay muted loop></video>
                </div>
                <div class="video-content space-y-2 z-10">
                    <h1 class="font-light text-6xl">Built By TumblerHaven </h1>
                    <h3 class="font-light text-3xl">Created By You</h3>
                </div>
            </section>

            <style>
                .video-docker video {
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                }

                .video-docker::after {
                    content: "";
                    position: absolute;
                    width: 100%;
                    height: 100%;
                    top: 0;
                    left: 0;
                    background: rgba(0, 0, 0, 0.6);
                    z-index: 1;
                }
            </style>
        </div>
    </div>

    <div class="flex-column">
        <section class="w-screen py-20 bg-black text-white">
            <h1 class="mb-12 text-center font-sans text-3xl font-bold t ">Bring your imagination—customize your favorite
                TumblerHaven bottles, tumblers, and barware.</h1>
            <div class="p-1 flex flex-wrap items-center justify-center">
                <div class="flex-shrink-0 m-6 relative overflow-hidden bg-clack rounded-lg max-w-xs shadow-lg group">
                    <svg class="absolute bottom-0 left-0 mb-8 scale-150 group-hover:scale-[1.65] transition-transform"
                        viewBox="0 0 375 283" fill="none" style="opacity: 0.1;">
                        <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)"
                            fill="white" />
                        <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)"
                            fill="white" />
                    </svg>
                    <div
                        class="relative pt-10 px-10 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <div class="block absolute w-48 h-48 bottom-0 left-0 -mb-24 ml-3"
                            style="background: radial-gradient(black, transparent 60%); transform: rotate3d(0, 0, 1, 20deg) scale3d(1, 0.6, 1); opacity: 0.2;">
                        </div>
                        <img class="relative w-40" src="1.png" alt="">
                    </div>
                    <div class="relative text-white px-6 pb-6 mt-6">
                        <span class="block opacity-75 -mb-1">Indoor</span>
                        <div class="flex justify-between">
                            <span class="block font-semibold text-xl">Peace Lily</span>
                            <span
                                class="block bg-white rounded-full text-orange-500 text-xs font-bold px-3 py-2 leading-none flex items-center">$36.00</span>
                        </div>
                    </div>
                </div>
                <div class="flex-shrink-0 m-6 relative overflow-hidden bg-black rounded-lg max-w-xs shadow-lg group">
                    <svg class="absolute bottom-0 left-0 mb-8 scale-150 group-hover:scale-[1.65] transition-transform"
                        viewBox="0 0 375 283" fill="none" style="opacity: 0.1;">
                        <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)"
                            fill="white" />
                        <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)"
                            fill="white" />
                    </svg>
                    <div
                        class="relative pt-10 px-10 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <div class="block absolute w-48 h-48 bottom-0 left-0 -mb-24 ml-3"
                            style="background: radial-gradient(black, transparent 60%); transform: rotate3d(0, 0, 1, 20deg) scale3d(1, 0.6, 1); opacity: 0.2;">
                        </div>
                        <img class="relative w-40" src="2.png" alt="">
                    </div>
                    <div class="relative text-white px-6 pb-6 mt-6">
                        <span class="block opacity-75 -mb-1">Outdoor</span>
                        <div class="flex justify-between">
                            <span class="block font-semibold text-xl">Monstera</span>
                            <span
                                class="block bg-white rounded-full text-teal-500 text-xs font-bold px-3 py-2 leading-none flex items-center">$45.00</span>
                        </div>
                    </div>
                </div>
                <div class="flex-shrink-0 m-6 relative overflow-hidden bg-black rounded-lg max-w-xs shadow-lg group">
                    <svg class="absolute bottom-0 left-0 mb-8 scale-150 group-hover:scale-[1.65] transition-transform"
                        viewBox="0 0 375 283" fill="none" style="opacity: 0.1;">
                        <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)"
                            fill="white" />
                        <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)"
                            fill="white" />
                    </svg>
                    <div
                        class="relative pt-10 px-10 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <div class="block absolute w-48 h-48 bottom-0 left-0 -mb-24 ml-3"
                            style="background: radial-gradient(black, transparent 60%); transform: rotate3d(0, 0, 1, 20deg) scale3d(1, 0.6, 1); opacity: 0.2;">
                        </div>
                        <img class="relative w-40" src="3.png" alt="">
                    </div>
                    <div class="relative text-white px-6 pb-6 mt-6">
                        <span class="block opacity-75 -mb-1">Outdoor</span>
                        <div class="flex justify-between">
                            <span class="block font-semibold text-xl">Oak Tree</span>
                            <span
                                class="block bg-white rounded-full text-purple-500 text-xs font-bold px-3 py-2 leading-none flex items-center">$68.50</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class=" text-center">
                <h1 class="mb-12 mt-12 text-center text-3xl font-bold font-serif ">Grab yours now!!</h1>
            </div>
        </section>

        <div class="bg-gray-100 mx-auto py-10 grid max-w-screen-full text-black pl-6 pr-4 sm:px-20 ">
            <div class="text-center">
                <p class="mb-12 mt-12 text-center text-xl font-bold font-serif">Don't see what you looking for?</p>
            </div>
            <div class="text-center mt-5 align-center">
                <button class=" align-center bg-black hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Contact us
                </button>
            </div>
        </div>


        <footer class="px-3 pt-4 lg:px-9  bg-gray-50">
            <div class="grid gap-10 row-gap-6 mb-8 sm:grid-cols-2 lg:grid-cols-4">

                <div class="sm:col-span-2">
                    <a href="#" class="inline-flex items-center">
                        <span class="ml-2 text-xl font-bold tracking-wide text-gray-800">BE THE FIRST TO KNOW
                        </span>
                    </a>
                    <div class="mt-6 lg:max-w-xl">
                        <p class="text-sm text-gray-800">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi felis mi, faucibus dignissim
                            lorem
                            id, imperdiet interdum mauris. Vestibulum ultrices sed libero non porta. Vivamus malesuada
                            urna eu
                            nibh malesuada, non finibus massa laoreet. Nunc nisi velit, feugiat a semper quis, pulvinar
                            id
                            libero. Vivamus mi diam, consectetur non orci ut, tincidunt pretium justo. In vehicula porta
                            molestie. Suspendisse potenti.
                        </p>
                    </div>
                </div>

                <div class="flex flex-col gap-2 text-sm">
                    <p class="text-base font-bold tracking-wide text-gray-900">Popular Courses</p>
                    <a href="#">UPSC - Union Public Service Commission</a>
                    <a href="#">General Knowledge</a>
                    <a href="#">MBA</a>
                    <p class="text-base font-bold tracking-wide text-gray-900">Popular Topics</p>
                    <a href="#">Human Resource Management</a>
                    <a href="#">Operations Management</a>
                    <a href="#">Marketing Management</a>
                </div>

                <div class="w-full h-full">
                    <p class=" font-bold tracking-wide text-gray-900 text-center font-serif">Tumbler Haven </p>
                    <img src="footer.png" alt="">
                </div>

            </div>

            <div class="flex flex-col-reverse justify-between pt-5 pb-10 border-t lg:flex-row">
                <p class="text-sm text-gray-600">© Copyright 2023 Company. All rights reserved.</p>
                <ul class="flex flex-col mb-3 space-y-2 lg:mb-0 sm:space-y-0 sm:space-x-5 sm:flex-row">
                    <li>
                        <a href="#"
                            class="text-sm text-gray-600 transition-colors duration-300 hover:text-deep-purple-accent-400">Privacy
                            &amp; Cookies Policy
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="text-sm text-gray-600 transition-colors duration-300 hover:text-deep-purple-accent-400">Disclaimer
                        </a>
                    </li>
                </ul>
            </div>

        </footer>

</body>

</html>
