@extends("TailwindCssLink.style")
@include("TailwindCssLink.fontStyle")
@include("Component.header")
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script defer src="home.js"></script> -->
</head>
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
<body>
<div class=" w-full ">
        <div id="cartDialog" class=" p-4 fixed z-50 hidden flex right-0 top-28 transform -translate-y-1/2">
            <div class="bg-white w-80 h-70 rounded-lg shadow-lg p-4 relative">

                <!-- Close Button -->
                <button id="closeCartDialog" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <!-- Dialog Content -->
                <h3 class="text-xl font-bold mb-4">Your Cart</h3>
                <p class="text-gray-600 text-center justify-center">Your cart is currently empty.</p>
                <!-- <button class="mt-4 w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Continue
            Shopping</button> -->
            </div>
        </div>

        <div>
            <section class="relative h-screen flex justify-center text-center text-white ">
                <div class="video-docker absolute top-0 left-0 w-full h-full overflow-hidden">
                    <video class="min-w-full min-h-full absolute object-cover" src="tumbler.mp4" type="video/mp4"
                        autoplay muted loop></video>
                </div>
                <div class=" space-y-7 video-content z-10 mt-36">
                    <h1 class=" font-bold text-7xl">Built By TumblerHaven </h1>
                    <h3 class="font-light text-5xl">Created By You</h3>
                </div>
            </section>
        </div>
    <div class="flex-column">
        <section class="w-full py-16 bg-black text-white">
            <h1 class="w-1/2 mx-auto text-bold mb-4 text-center font-sans text-4xl font-medium ">
                Bring your imagination—customize
            </h1>
            <p class="font-normal text-md text-center">
                    your favorite
                    TumblerHaven bottles, tumblers, and barware.
                </p>
            <div class="p-2 flex flex-wrap items-center justify-center ">
                <div class="flex-shrink-0 m-8 relative overflow-hidden bg-white/15 rounded-lg max-w-sm shadow-lg group">
                    <div
                        class="relative pt-14 px-14 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <div class="block absolute w-64 h-64 bottom-0 left-0 -mb-28 ml-4"
                             style="background: radial-gradient(black, transparent 60%); transform: rotate3d(0, 0, 1, 20deg) scale3d(1, 0.6, 1); opacity: 0.2;">
                        </div>
                        <img class="relative w-56" src="1.png" alt="">
                    </div>
                    <div class="relative text-white px-8 pb-8 mt-8">
                        <span class="block opacity-75 -mb-0 font-sans">Quencher</span>
                        <div class="flex justify-between">
                            <span class="block font-semibold text-2xl">Peace Lily</span>
                            <span
                                class="block bg-white rounded-full text-black text-sm font-bold px-4 py-3 leading-none flex items-center">$36.00</span>
                        </div>
                    </div>
                </div>
                <div class="flex-shrink-0 m-8 relative overflow-hidden bg-white/15 rounded-lg max-w-sm shadow-lg group">
                    <div
                        class="relative pt-14 px-14 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <div class="block absolute w-64 h-64 bottom-0 left-0 -mb-28 ml-4"
                             style="background: radial-gradient(black, transparent 60%); transform: rotate3d(0, 0, 1, 20deg) scale3d(1, 0.6, 1); opacity: 0.2;">
                        </div>
                        <img class="relative w-56" src="2.png" alt="">
                    </div>
                    <div class="relative text-white px-8 pb-8 mt-8">
                        <span class="block opacity-75 -mb-0 font-sans">Hydrate</span>
                        <div class="flex justify-between">
                            <span class="block font-semibold text-2xl">Monstera</span>
                            <span
                                class="block bg-white rounded-full text-black text-sm font-bold px-4 py-3 leading-none flex items-center">$45.00</span>
                        </div>
                    </div>
                </div>
                <div class="flex-shrink-0 m-8 relative overflow-hidden bg-white/15 rounded-lg max-w-sm shadow-lg group">
                    <div
                        class="relative pt-14 px-14 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <div class="block absolute w-64 h-64 bottom-0 left-0 -mb-28 ml-4"
                             style="background: radial-gradient(black, transparent 60%); transform: rotate3d(0, 0, 1, 20deg) scale3d(1, 0.6, 1); opacity: 0.2;">
                        </div>
                        <img class="relative w-56" src="3.png" alt="">
                    </div>
                    <div class="relative text-white px-8 pb-8 mt-8">
                        <span class="block opacity-75 -mb-0 font-sans">Bottle</span>
                        <div class="flex justify-between">
                            <span class="block font-semibold text-2xl">Oak Tree</span>
                            <span
                                class="block bg-white rounded-full text-black text-sm font-bold px-4 py-3 leading-none flex items-center">$68.50</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" text-center">
                <h1 class="mb-0 mt-6 text-center text-3xl font-bold font-serif ">Grab yours now!!</h1>
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
                        class="mt-3 text-base item-content-center font-family text-black sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-l lg:mx-0">
                        Founded in 1913 by inventor William Stanley Jr., Stanley has been there for generations of
                        adventures. We're built on invention, innovation and inspiration with a timeless spirit that
                        complements your wild imagination.
                    </p>
                </div>
                <div class="lg:inset-y-0 lg:right-0 lg:w-1/2 my-4">
                    <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="aboutus1.png" alt="">
                </div>
            </div>

            <div
                class="mt-40 my-10 mx-auto max-w-7xl px-4 sm:px-6 md:px-8 lg:px-10 flex flex-col lg:flex-row items-center lg:items-start gap-8">
                <div class="lg:w-1/2">
                    <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="aboutus2.png"
                         alt="About Us">
                </div>
                <div class="lg:w-1/2">
                    <h1 class="text-4xl tracking-tight font-extrabold text-gray-800 sm:text-5xl md:text-4xl">
                        <span class="block xl:inline">SUSTAINABILITY AT Tumbler Haven</span>
                    </h1>
                    <p class="mt-3 text-base text-black sm:mt-5 sm:text-lg md:mt-5 lg:mt-6">
                        The most sustainable products are the kind that never need to be thrown away or replaced.
                        Stanley has created reusable, Built For Life™ products for over 100 years, reducing demand for
                        disposable products that end up in waste and water streams.
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

        @include('pages.footer')


    </div>
    </div>
</body>

</html>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get references to the elements
        const cartIcon = document.getElementById("cartIcon");
        const cartDialog = document.getElementById("cartDialog");
        const closeCartDialog = document.getElementById("closeCartDialog");

        // Add event listener to the cart icon to open the cart dialog
        cartIcon.addEventListener("click", function (e) {
            e.preventDefault(); // Prevent the default anchor behavior (/# redirection)
            cartDialog.classList.remove("hidden");
        });

        // Add event listener to the close button to hide the cart dialog
        closeCartDialog.addEventListener("click", function () {
            cartDialog.classList.add("hidden");
        });

        // Optional: Close the cart dialog when clicking outside of it
        cartDialog.addEventListener("click", function (e) {
            if (e.target === cartDialog) {
                cartDialog.classList.add("hidden");
            }
        });
    });
    function goesToAboutUs() {
        // Scroll smoothly to the About Us section
        document.getElementById('about-us').scrollIntoView({ behavior: 'smooth' });
    }
</script>
