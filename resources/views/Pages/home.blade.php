@extends("TailwindCssLink.style")
@extends("TailwindCssLink.fontStyle")
@extends("Component.header")
@section('contents')
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
    .animate-typing {
    display: inline-block;
    border-right: 4px solid white;
    white-space: nowrap;
    overflow: hidden;
    animation: blink 0.7s step-end infinite;
}

@keyframes blink {
    from, to {
        border-color: transparent;
    }
    50% {
        border-color: white;
    }
}

</style>

<main>
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
            <section class="relative h-[500px] lg:min-h-screed md:min-h-screen flex justify-center item-center text-center text-white ">
                <div class="video-docker  opacity-80 absolute top-0 left-0 w-full h-full overflow-hidden">
                    <video class="min-w-full min-h-full absolute object-cover" src="tumbler.mp4" type="video/mp4"
                        autoplay muted loop></video>
                </div>
                <div class="space-y-3 lg:space-y-7 video-content z-10 place-content-center px-3">
                    <h1 class="text-3xl font-bold lg:text-7xl md:text-5xl">Built By <span class="animate-typing overflow-hidden whitespace-nowrap border-r-4 border-r-white pr-5 text-7xl text-white font-bold"></span></h1>
                    <h3 class="font-light text-xl lg:text-3xl md:text-2xl font-medium">Created By You</h3>
                    <p class="text-sm lg:text-xl font-normal">Start your day without plastic with Tumbler Haven</p>
                    <button class="mx-auto flex gap-2 bg-white hover:opacity-70 text-black font-bold py-2 px-4 rounded" id="cartIcon">
                        Shop Now
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 items-center content-items-center ">
                            <path fill-rule="evenodd" d="M16.72 7.72a.75.75 0 0 1 1.06 0l3.75 3.75a.75.75 0 0 1 0 1.06l-3.75 3.75a.75.75 0 1 1-1.06-1.06l2.47-2.47H3a.75.75 0 0 1 0-1.5h16.19l-2.47-2.47a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                        </svg>

                    </button>
                </div>
            </section>
        </div>
        <div class="flex-column">
            <section class="w-full py-16 bg-gray-700 text-white">
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
                            <img class="relative w-56" src="3.png" alt="">
                        </div>
                        <div class="relative text-white px-8 pb-8 mt-8">
                            <span class="block opacity-75 -mb-0 font-sans">Bottle</span>
                            <div class="flex justify-between">
                                <span class="block font-semibold text-2xl content-center">Oak Tree</span>
                                <span
                                    class="block bg-white rounded-full text-black text-sm font-bold px-4 py-3 leading-none flex items-center justify-center content-center gap-1">View More
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class=" w-6 h-6 items-center content-items-center  ">
                                        <path fill-rule="evenodd" d="M12.97 3.97a.75.75 0 0 1 1.06 0l7.5 7.5a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 1 1-1.06-1.06l6.22-6.22H3a.75.75 0 0 1 0-1.5h16.19l-6.22-6.22a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" text-center">
                    <h1 class="mb-0 mt-6 text-center text-3xl font-bold font-serif ">Grab yours now!!</h1>
                </div>
            </section>

            <!--About page -->
            <section id="about-us" class="w-full mx-auto py-10 ">

                <div class="w-full h-full flex flex-col items-center md:py-4 py-10">

                    <div
                        class="xl:w-[80%] sm:w-[85%] w-[90%] mx-auto flex md:flex-row flex-col lg:gap-4 gap-2 justify-center lg:items-stretch md:items-center mt-4">

                        <img class="md:w-[50%] w-full md:rounded-t-lg rounded-sm" src="aboutus1.png" alt="billboard image" />

                        <div class="md:w-[50%] w-full bg-gray-100  md:p-4 p-0 rounded-md content-center">
                            <h2 class="text-3xl font-semibold text-gray-900 underline underline-offset-8 decoration-gray-700 ">Our Website</h2>
                            <p class="text-md mt-4 text-gray-600">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore placeat assumenda nam
                                veritatis, magni doloremque pariatur quos fugit ipsa id voluptatibus deleniti officiis cum ratione eligendi
                                sed necessitatibus aliquam error laborum delectus quaerat. Delectus hic error eligendi sed repellat natus fuga
                                nobis tempora possimus ullam!</p>
                        </div>

                    </div>
                    <div
                        class="xl:w-[80%] sm:w-[85%] w-[90%] mx-auto flex md:flex-row flex-col flex-col-reverse lg:gap-4 gap-2 justify-center lg:items-stretch md:items-center mt-24">
                        <div class="md:w-[50%] w-full bg-gray-100  md:p-4 p-0 rounded-md content-center">
                            <h2 class="text-3xl font-semibold text-gray-900 underline underline-offset-8 decoration-gray-700">Our Service</h2>

                            <p class="text-md mt-4 text-gray-600">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore placeat assumenda nam
                                veritatis, magni doloremque pariatur quos fugit ipsa id voluptatibus deleniti officiis cum ratione eligendi
                                sed necessitatibus aliquam error laborum delectus quaerat. Delectus hic error eligendi sed repellat natus fuga
                                nobis tempora possimus ullam!</p>
                        </div>
                        <img class="md:w-[50%] w-full md:rounded-t-lg rounded-sm" src="aboutus2.png" alt="billboard image" />

                    </div>
                </div>
            </section>
            <!--Our Team-->
            <section class="w-full mx-auto py-10 ">

                <div class="w-full h-full flex flex-col items-center md:py-4 py-10">

                    <div
                        class="xl:w-[80%] sm:w-[85%] w-[90%] mx-auto flex md:flex-row flex-col lg:gap-4 gap-2 justify-center lg:items-stretch md:items-center mt-4">

                        <img class="md:w-[50%] w-full md:rounded-t-lg rounded-sm" src="https://i.pinimg.com/736x/2f/f3/d4/2ff3d4b27824c7ae338c586b3a71f919.jpg" alt="billboard image" />

                        <div class="md:w-[50%] w-full bg-gray-100  md:p-4 p-0 rounded-md content-center">
                            <h2 class="text-3xl font-semibold text-gray-900 underline underline-offset-8 decoration-gray-700">Our Team</h2>
                            <p class="text-md mt-4 text-gray-600">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore placeat assumenda nam
                                veritatis, magni doloremque pariatur quos fugit ipsa id voluptatibus deleniti officiis cum ratione eligendi
                                sed necessitatibus aliquam error laborum delectus quaerat. Delectus hic error eligendi sed repellat natus fuga
                                nobis tempora possimus ullam!</p>
                        </div>

                    </div>
                </div>
            </section>
            <!--contact us -->
            <div class="bg-gray-900 mx-auto py-10 grid max-w-screen-full text-black pl-6 pr-4 sm:px-20 ">
                <div class="text-center text-white">
                    <p class="mb-12 mt-12 text-center text-xl font-bold font-serif">Don't see what you looking for?</p>
                </div>
                <div class="text-center mt-5 align-center">
                    <button class=" align-center bg-white hover:opacity-70 text-black font-bold py-2 px-4 rounded">
                        Contact us
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get references to the elements
        const cartIcon = document.getElementById("cartIcon");
        const cartDialog = document.getElementById("cartDialog");
        const closeCartDialog = document.getElementById("closeCartDialog");

        // Add event listener to the cart icon to open the cart dialog
        cartIcon.addEventListener("click", function(e) {
            e.preventDefault(); // Prevent the default anchor behavior (/# redirection)
            cartDialog.classList.remove("hidden");
        });

        // Add event listener to the close button to hide the cart dialog
        closeCartDialog.addEventListener("click", function() {
            cartDialog.classList.add("hidden");
        });

        // Optional: Close the cart dialog when clicking outside of it
        cartDialog.addEventListener("click", function(e) {
            if (e.target === cartDialog) {
                cartDialog.classList.add("hidden");
            }
        });
    });

    function goesToAboutUs() {
        // Scroll smoothly to the About Us section
        document.getElementById('about-us').scrollIntoView({
            behavior: 'smooth'
        });
    }
    document.addEventListener("DOMContentLoaded", () => {
    const textElement = document.querySelector(".animate-typing");
    const textContent = "TumblerHaven";
    let index = 0;

    function typeText() {
        if (index < textContent.length) {
            textElement.textContent += textContent.charAt(index);
            index++;
            setTimeout(typeText, 150); // Adjust typing speed here
        } else {
            setTimeout(() => {
                index = 0;
                textElement.textContent = ""; // Clear the text for looping
                typeText();
            }, 2000); // Adjust delay before restarting
        }
    }

    typeText();
});
</script>
@endsection