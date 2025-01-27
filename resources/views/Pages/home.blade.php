@extends("TailwindCssLink.style")
@extends("TailwindCssLink.fontStyle")
@extends("Component.header")
@section('contents')
<script>
    document.documentElement.classList.add('js')
</script>

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

        from,
        to {
            border-color: transparent;
        }

        50% {
            border-color: white;
        }
    }
</style>

<main>
    <div class=" w-full ">
        <div>
            <section class="relative h-[500px] lg:min-h-screed md:min-h-screen flex justify-center item-center text-center text-white ">
                <div class="video-docker opacity-90 absolute top-0 left-0 w-full h-full overflow-hidden">
                    <video class="min-w-full min-h-full absolute object-cover" src="tumbler.mp4" type="video/mp4"
                        autoplay muted loop>
                    </video>
                </div>
                <div class="space-y-3 lg:space-y-7 video-content z-10 place-content-center px-3">
                    <h1 class="text-3xl font-bold lg:text-7xl md:text-5xl">Built By <span class="animate-typing  overflow-hidden whitespace-nowrap border-r-4 border-r-white pr-5 text-4xl lg:text-7xl text-white font-bold"></span></h1>
                    <h3 class="font-light text-xl lg:text-3xl md:text-2xl font-medium">Created By You</h3>
                    <p class="text-sm lg:text-xl font-normal">Start your day without plastic with Tumbler Haven</p>
                    <button class="mx-auto flex justify-center item-center content-items-center gap-1 bg-white/60 hover:opacity-90 text-gray-700 text-md font-bold py-3 px-6 rounded-full" id="cartIcon">
                        Shop Now
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 content-center content-items-center ">
                            <path fill-rule="evenodd" d="M16.72 7.72a.75.75 0 0 1 1.06 0l3.75 3.75a.75.75 0 0 1 0 1.06l-3.75 3.75a.75.75 0 1 1-1.06-1.06l2.47-2.47H3a.75.75 0 0 1 0-1.5h16.19l-2.47-2.47a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                        </svg>

                    </button>
                </div>
            </section>
        </div>
        <div class="flex-column">
            <section class="w-full py-16 bg-gray-500 text-white">
                <h1 class="w-1/2 mx-auto text-bold mb-4 text-center font-sans text-4xl font-medium ">
                    Bring your imagination—customize
                </h1>
                <p class="font-normal text-md text-center">
                    your favorite
                    TumblerHaven bottles, tumblers, and barware.
                </p>
                <section class="section-card-model relative">
                    <div class="relative p-2 flex flex-wrap items-center justify-center">
                        <div class="flex-shrink-0 m-8 relative overflow-hidden bg-white/15 rounded-xl max-w-sm shadow-2xl shadow-gray-600/50 group">
                            <div class="relative pt-14 px-14 flex items-center justify-center group-hover:scale-110 transition-transform">
                                <div class="absolute w-64 h-64 bottom-0 left-0 -mb-28 ml-4"
                                    style="background: radial-gradient(black, transparent 60%); transform: rotate3d(0, 0, 1, 20deg) scale3d(1, 0.6, 1); opacity: 0.2;">
                                </div>
                                <img class="relative w-56" src="3.png" alt="Bottle Image">
                            </div>
                            <div class="relative text-white px-8 pb-8 mt-8">
                                <span class="block opacity-75 font-sans">Bottle</span>
                                <div class="flex justify-between items-center">
                                    <span class="block font-semibold text-2xl">Oak Tree</span>
                                    <button class="flex items-center gap-1 bg-white/30 rounded-full text-gray-700 text-sm font-normal px-6 py-3 hover:opacity-90">
                                        View More
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                            <path fill-rule="evenodd" d="M12.97 3.97a.75.75 0 0 1 1.06 0l7.5 7.5a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 1 1-1.06-1.06l6.22-6.22H3a.75.75 0 0 1 0-1.5h16.19l-6.22-6.22a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Carousel Navigation Buttons -->
                    <div class="flex justify-between px-6 gap-4 absolute top-[50%] left-0 right-0 transform -translate-y-1/2">
                        <button class="bg-white/40 hover:opacity-70 text-gray-700 font-bold p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd" d="M7.28 7.72a.75.75 0 0 1 0 1.06l-2.47 2.47H21a.75.75 0 0 1 0 1.5H4.81l2.47 2.47a.75.75 0 1 1-1.06 1.06l-3.75-3.75a.75.75 0 0 1 0-1.06l3.75-3.75a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <button class="bg-white/40 hover:opacity-70 text-gray-700 font-bold p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd" d="M16.72 7.72a.75.75 0 0 1 1.06 0l3.75 3.75a.75.75 0 0 1 0 1.06l-3.75 3.75a.75.75 0 1 1-1.06-1.06l2.47-2.47H3a.75.75 0 0 1 0-1.5h16.19l-2.47-2.47a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </section>
            </section>

            <!--About page -->
            <section id="about-us" class="w-full mx-auto py-10 bg-gray-100">

                <div class="w-full content-center content-item-center item-content-center  flex flex-col items-center md:py-4 ">

                    <div
                        class=" relative flex w-full justify-between item-center content-center">

                        <div class="flex w-full flex-row relative justify-center items-center gap-4 top-6">
                            <img src="tumbler-remove-bg.png" class="-translate-y-16 drop-shadow-lg" alt="">
                            <img src="tumbler2-remove-bg.png" class="absolute max-w-full translate-x-1/4 rotate-6 delay-[100ms] duration-[300ms] taos:translate-y-[100%] taos:opacity-0 hover:-translate-y-12 drop-shadow-lg" data-taos-offset="100" alt="">
                            <img src="tumbler3-remove-bg.png" class="absolute top-2 -translate-x-1/4 -rotate-6 delay-[100ms] duration-[300ms] taos:translate-y-[100%] taos:opacity-0 hover:-translate-y-12 drop-shadow-lg" data-taos-offset="100" alt="">
                        </div>

                        <div class="relative  w-full bg-gray-100  md:p-4 p-0 rounded-md content-center">
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
                        <img class="delay-[300ms] duration-[500ms] taos:translate-x-[100%] taos:opacity-0 md:w-[50%] w-full md:rounded-t-lg rounded-sm" src="aboutus2.png" alt="billboard image" data-taos-offset="100" />

                    </div>
                </div>
            </section>
            <!--Our Team-->
            <section class="w-full mx-auto py-10 ">

                <div class="w-full h-full flex flex-col items-center md:py-4 py-10">

                    <div
                        class="xl:w-[80%] sm:w-[85%] w-[90%] mx-auto flex md:flex-row flex-col lg:gap-4 gap-2 justify-center lg:items-stretch md:items-center mt-4">

                        <img class="delay-[200ms] duration-[500ms] taos:translate-x-[-100%] taos:opacity-0 md:w-[50%] w-full md:rounded-t-lg rounded-sm animation transform" src="https://i.pinimg.com/736x/2f/f3/d4/2ff3d4b27824c7ae338c586b3a71f919.jpg" alt="billboard image" data-taos-offset="100" />

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
            <!--customer feed back-->
            <section id="testimonials" aria-label="What our customers are saying" class="bg-slate-50 py-20 sm:py-32">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="mx-auto max-w-2xl md:text-center">
                        <h2 class="font-display text-3xl tracking-tight text-slate-900 sm:text-4xl">What Our Customers Are Saying</h2>
                    </div>
                    <ul role="list"
                        class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-6 sm:gap-8 lg:mt-20 lg:max-w-none lg:grid-cols-3">
                        <li>
                            <ul role="list" class="flex flex-col gap-y-6 sm:gap-y-8">
                                <li>
                                    <figure class="relative rounded-2xl bg-white p-6 shadow-xl shadow-slate-900/10"><svg aria-hidden="true"
                                            width="105" height="78" class="absolute left-6 top-6 fill-slate-100">
                                            <path
                                                d="M25.086 77.292c-4.821 0-9.115-1.205-12.882-3.616-3.767-2.561-6.78-6.102-9.04-10.622C1.054 58.534 0 53.411 0 47.686c0-5.273.904-10.396 2.712-15.368 1.959-4.972 4.746-9.567 8.362-13.786a59.042 59.042 0 0 1 12.43-11.3C28.325 3.917 33.599 1.507 39.324 0l11.074 13.786c-6.479 2.561-11.677 5.951-15.594 10.17-3.767 4.219-5.65 7.835-5.65 10.848 0 1.356.377 2.863 1.13 4.52.904 1.507 2.637 3.089 5.198 4.746 3.767 2.41 6.328 4.972 7.684 7.684 1.507 2.561 2.26 5.5 2.26 8.814 0 5.123-1.959 9.19-5.876 12.204-3.767 3.013-8.588 4.52-14.464 4.52Zm54.24 0c-4.821 0-9.115-1.205-12.882-3.616-3.767-2.561-6.78-6.102-9.04-10.622-2.11-4.52-3.164-9.643-3.164-15.368 0-5.273.904-10.396 2.712-15.368 1.959-4.972 4.746-9.567 8.362-13.786a59.042 59.042 0 0 1 12.43-11.3C82.565 3.917 87.839 1.507 93.564 0l11.074 13.786c-6.479 2.561-11.677 5.951-15.594 10.17-3.767 4.219-5.65 7.835-5.65 10.848 0 1.356.377 2.863 1.13 4.52.904 1.507 2.637 3.089 5.198 4.746 3.767 2.41 6.328 4.972 7.684 7.684 1.507 2.561 2.26 5.5 2.26 8.814 0 5.123-1.959 9.19-5.876 12.204-3.767 3.013-8.588 4.52-14.464 4.52Z">
                                            </path>
                                        </svg>
                                        <blockquote class="relative">
                                            <p class="text-lg tracking-tight text-slate-900">As a professional athlete, I rely on high-performance
                                                gear for my training. This site offers a great selection of top-notch products.</p>
                                        </blockquote>
                                        <figcaption class="relative mt-6 flex items-center justify-between border-t border-slate-100 pt-6">
                                            <div>
                                                <div class="font-display text-base text-slate-900">Leland Kiehn</div>
                                            </div>
                                            <div class="overflow-hidden rounded-full bg-slate-50">
                                                <img alt="" class="h-14 w-14 object-cover" style="color:transparent" src="https://randomuser.me/api/portraits/women/15.jpg">
                                            </div>
                                        </figcaption>
                                    </figure>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <ul role="list" class="flex flex-col gap-y-6 sm:gap-y-8">
                                <li>
                                    <figure class="relative rounded-2xl bg-white p-6 shadow-xl shadow-slate-900/10"><svg aria-hidden="true"
                                            width="105" height="78" class="absolute left-6 top-6 fill-slate-100">
                                            <path
                                                d="M25.086 77.292c-4.821 0-9.115-1.205-12.882-3.616-3.767-2.561-6.78-6.102-9.04-10.622C1.054 58.534 0 53.411 0 47.686c0-5.273.904-10.396 2.712-15.368 1.959-4.972 4.746-9.567 8.362-13.786a59.042 59.042 0 0 1 12.43-11.3C28.325 3.917 33.599 1.507 39.324 0l11.074 13.786c-6.479 2.561-11.677 5.951-15.594 10.17-3.767 4.219-5.65 7.835-5.65 10.848 0 1.356.377 2.863 1.13 4.52.904 1.507 2.637 3.089 5.198 4.746 3.767 2.41 6.328 4.972 7.684 7.684 1.507 2.561 2.26 5.5 2.26 8.814 0 5.123-1.959 9.19-5.876 12.204-3.767 3.013-8.588 4.52-14.464 4.52Zm54.24 0c-4.821 0-9.115-1.205-12.882-3.616-3.767-2.561-6.78-6.102-9.04-10.622-2.11-4.52-3.164-9.643-3.164-15.368 0-5.273.904-10.396 2.712-15.368 1.959-4.972 4.746-9.567 8.362-13.786a59.042 59.042 0 0 1 12.43-11.3C82.565 3.917 87.839 1.507 93.564 0l11.074 13.786c-6.479 2.561-11.677 5.951-15.594 10.17-3.767 4.219-5.65 7.835-5.65 10.848 0 1.356.377 2.863 1.13 4.52.904 1.507 2.637 3.089 5.198 4.746 3.767 2.41 6.328 4.972 7.684 7.684 1.507 2.561 2.26 5.5 2.26 8.814 0 5.123-1.959 9.19-5.876 12.204-3.767 3.013-8.588 4.52-14.464 4.52Z">
                                            </path>
                                        </svg>
                                        <blockquote class="relative">
                                            <p class="text-lg tracking-tight text-slate-900">The fitness apparel I bought here fits perfectly and
                                                feels amazing. I highly recommend this store to anyone looking for quality gear.</p>
                                        </blockquote>
                                        <figcaption class="relative mt-6 flex items-center justify-between border-t border-slate-100 pt-6">
                                            <div>
                                                <div class="font-display text-base text-slate-900">Peter Renolds</div>
                                            </div>
                                            <div class="overflow-hidden rounded-full bg-slate-50">
                                                <img alt="" class="h-14 w-14 object-cover" style="color:transparent" src="https://randomuser.me/api/portraits/men/10.jpg">
                                            </div>
                                        </figcaption>
                                    </figure>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <ul role="list" class="flex flex-col gap-y-6 sm:gap-y-8">
                                <li>
                                    <figure class="relative rounded-2xl bg-white p-6 shadow-xl shadow-slate-900/10"><svg aria-hidden="true"
                                            width="105" height="78" class="absolute left-6 top-6 fill-slate-100">
                                            <path
                                                d="M25.086 77.292c-4.821 0-9.115-1.205-12.882-3.616-3.767-2.561-6.78-6.102-9.04-10.622C1.054 58.534 0 53.411 0 47.686c0-5.273.904-10.396 2.712-15.368 1.959-4.972 4.746-9.567 8.362-13.786a59.042 59.042 0 0 1 12.43-11.3C28.325 3.917 33.599 1.507 39.324 0l11.074 13.786c-6.479 2.561-11.677 5.951-15.594 10.17-3.767 4.219-5.65 7.835-5.65 10.848 0 1.356.377 2.863 1.13 4.52.904 1.507 2.637 3.089 5.198 4.746 3.767 2.41 6.328 4.972 7.684 7.684 1.507 2.561 2.26 5.5 2.26 8.814 0 5.123-1.959 9.19-5.876 12.204-3.767 3.013-8.588 4.52-14.464 4.52Zm54.24 0c-4.821 0-9.115-1.205-12.882-3.616-3.767-2.561-6.78-6.102-9.04-10.622-2.11-4.52-3.164-9.643-3.164-15.368 0-5.273.904-10.396 2.712-15.368 1.959-4.972 4.746-9.567 8.362-13.786a59.042 59.042 0 0 1 12.43-11.3C82.565 3.917 87.839 1.507 93.564 0l11.074 13.786c-6.479 2.561-11.677 5.951-15.594 10.17-3.767 4.219-5.65 7.835-5.65 10.848 0 1.356.377 2.863 1.13 4.52.904 1.507 2.637 3.089 5.198 4.746 3.767 2.41 6.328 4.972 7.684 7.684 1.507 2.561 2.26 5.5 2.26 8.814 0 5.123-1.959 9.19-5.876 12.204-3.767 3.013-8.588 4.52-14.464 4.52Z">
                                            </path>
                                        </svg>
                                        <blockquote class="relative">
                                            <p class="text-lg tracking-tight text-slate-900">The fitness apparel I bought here fits perfectly and
                                                feels amazing. I highly recommend this store to anyone looking for quality gear.</p>
                                        </blockquote>
                                        <figcaption class="relative mt-6 flex items-center justify-between border-t border-slate-100 pt-6">
                                            <div>
                                                <div class="font-display text-base text-slate-900">Peter Renolds</div>
                                            </div>
                                            <div class="overflow-hidden rounded-full bg-slate-50">
                                                <img alt="" class="h-14 w-14 object-cover" style="color:transparent" src="https://randomuser.me/api/portraits/men/10.jpg">
                                            </div>
                                        </figcaption>
                                    </figure>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="w-full text-center mt-10">
                    <a href="" class="flex items-center justify-center text-gray-700 border border-gray-600 py-2 px-6 gap-2 rounded-full inline-flex items-center">
                        <span>
                            View More
                        </span>
                        <svg class="w-4" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            viewBox="0 0 24 24" class="w-6 h-6 ml-2">
                            <path d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
            </section>
            <!--contact us -->
            <div class="bg-gray-800 mx-auto py-10 grid max-w-screen-full text-black pl-6 pr-4 sm:px-20 ">
                <div class="text-center text-white">
                    <p class="mb-12 mt-12 text-center text-xl font-bold font-serif">Don't see what you looking for?</p>
                </div>
                <div class="text-center align-center">
                    <button class=" align-center bg-white hover:opacity-70 text-black font-medium py-3 px-6 rounded-full">
                        Contact us
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!--go to top   -->
    <div>
        <button onclick="goesToTop()" class="fixed bottom-10 right-10 bg-gray-600 hover:bg-gray-700 text-white font-bold py-3 px-3 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                <path fill-rule="evenodd" d="M11.47 2.47a.75.75 0 0 1 1.06 0l3.75 3.75a.75.75 0 0 1-1.06 1.06l-2.47-2.47V21a.75.75 0 0 1-1.5 0V4.81L8.78 7.28a.75.75 0 0 1-1.06-1.06l3.75-3.75Z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>
</main>
<script src="https://unpkg.com/taos@1.0.5/dist/taos.js"></script>
<script>
    function goesToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });

        // Hide the button when it reaches the top
        const button = document.querySelector('button[onclick="goesToTop()"]');
        window.addEventListener('scroll', () => {
            if (window.scrollY === 0) {
                button.style.display = 'none';
            } else {
                button.style.display = 'block';
            }
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