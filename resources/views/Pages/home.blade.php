@extends("TailwindCssLink.style")
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class=" w-full ">
        <header
    class="bg-black text-white w-full sticky top-0 z-50 flex flex-col overflow-hidden px-5 py-5 lg:mx-auto lg:flex-row lg:items-center">
    <a href="" class="flex font-serif items-center whitespace-nowrap text-2xl font-bold text-white">
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
        <ul class=" flex w-full flex-col items-center space-y-2 lg:flex-row lg:justify-center lg:space-y-0">
            <li class="lg:mr-12 "><a class="text-white transition hover:opacity-70" href="">Home</a></li>
            <li class="lg:mr-12 "><a class="text-white transition hover:opacity-70" href="#about-us">About Us</a></li>
            <li class="lg:mr-12 "><a class="text-white transition hover:opacity-70" href="customize">Customize</a></li>
        </ul>
        <hr class="mt-4 w-full lg:hidden" />
        <div class="my-4 flex items-center space-x-6 space-y-2 lg:my-0 lg:ml-auto lg:space-x-8 lg:space-y-0">
            <a href="login" title="Login" class="font-bold text-white hover:opacity-70">Login</a>
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
                <div class=" space-y-7 video-content space-y-2 z-10">
                    <h1 class=" font-bold text-7xl">Built By TumblerHaven </h1>
                    <h3 class="font-light text-5xl">Created By You</h3>
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

                html {
                    scroll-behavior: smooth;
                }
            </style>
        </div>
    </div>

    <div class="flex-column">
        <section class="w-screen py-20 bg-black text-white">
            <h1 class=" text-bold mb-12 text-center font-sans text-3xl font-bold t ">Bring your imagination—customize your favorite
                TumblerHaven bottles, tumblers, and barware.</h1>
            <div class="p-1 flex flex-wrap items-center justify-center">
                <div class="flex-shrink-0 m-6 relative overflow-hidden bg-clack rounded-lg max-w-xs shadow-lg group ">
                    <!-- <svg class="absolute bottom-0 left-0 mb-8 scale-150 group-hover:scale-[1.65] transition-transform"
                        viewBox="0 0 375 283" fill="none" style="opacity: 0.1;">
                        <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)"
                            fill="white" />
                        <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)"
                            fill="white" />
                    </svg> -->
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


        <section id="about-us" class="sm:mt-6 lg:mt-8 mt-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="mb-12 text-center font-medium text-6xl font-bold t ">About Us</h1>
            <div
                class="my-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28 flex gap-3 lg:flex-justify lg:flex flex-col lg:flex-row">
                <div class="sm:text-center lg:text-left">
                    <h1 class="text-4xl tracking-tight font-extrabold text-gray-800 sm:text-5xl md:text-4xl">
                        <span class="block xl:inline">WHO WE ARE</span>
                        <!-- <span class="block text-indigo-600 xl:inline">online business</span> -->
                    </h1>
                    <p
                        class="mt-3 text-base font-family text-black sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-l lg:mx-0">
                        Founded in 1913 by inventor William Stanley Jr., Stanley has been there for generations of
                        adventures. We're built on invention, innovation and inspiration with a timeless spirit that
                        complements your wild imagination.
                        Over 100 years later, a steady stream of products continues to honor the Stanley legacy, keeping
                        your warms warm and your colds cold.
                        We're there for all your adventures so you can make the most of your world (whether you're
                        scaling a mountain or climbing an elm in your own backyard). We’ll be with you on your journey
                        as we have with generations past, helping to build a more sustainable, less disposable life and
                        world while opening the door to an awe-inspiring future.
                    </p>
                </div>

                <!--   Image Section     -->
                <div class="lg:inset-y-0 lg:right-0 lg:w-1/2 my-4">
                    <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="aboutus1.png" alt="">
                </div>
                <!--   End of Image Section     -->
            </div>

            <div
                class="mt-40 my-10 mx-auto max-w-7xl px-4 sm:px-6 md:px-8 lg:px-10 flex flex-col lg:flex-row items-center lg:items-start gap-8">
                <!-- Left Side: Image -->
                <div class="lg:w-1/2">
                    <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="aboutus2.png"
                        alt="About Us">
                </div>

                <!-- Right Side: Text -->
                <div class="lg:w-1/2">
                    <h1 class="text-4xl tracking-tight font-extrabold text-gray-800 sm:text-5xl md:text-4xl">
                        <span class="block xl:inline">SUSTAINABILITY AT Tumbler Haven</span>
                    </h1>
                    <p class="mt-3 text-base text-black sm:mt-5 sm:text-lg md:mt-5 lg:mt-6">
                        The most sustainable products are the kind that never need to be thrown away or replaced.
                        Stanley has created reusable, Built For Life™ products for over 100 years, reducing demand for
                        disposable products that end up in waste and water streams.
                        But it’s not just about what we make, it’s also about how we make it. Stanley is committed
                        to sustainable practices across our entire supply chain, from manufacturing to recycled
                        materials to packaging.
                        Learn more about Stanley and PMI's commitment to corporate social responsibility.
                    </p>
                </div>
            </div>

        </section>

        <div class="bg-black mx-auto py-10 grid max-w-screen-full text-black pl-6 pr-4 sm:px-20 ">
            <div class="text-center text-white">
                <p class="mb-12 mt-12 text-center text-xl font-bold font-serif">Don't see what you looking for?</p>
            </div>
            <div class="text-center mt-5 align-center">
                <button class=" align-center bg-white hover:opacity-70 text-black font-bold py-2 px-4 rounded">
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
