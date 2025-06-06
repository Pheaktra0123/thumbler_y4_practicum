@extends("TailwindCssLink.style")
@extends("TailwindCssLink.fontStyle")
@extends("Component.header")
@section('contents')
<script>
    document.documentElement.classList.add('js')
</script>

<style>
    .video-container video {
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .video-overlay::after {
        content: "";
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background: rgba(0, 0, 0, 0.6);
        z-index: 1;
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

    .card-hover:hover {
        transform: translateY(-5px);
        transition: transform 0.3s ease;
    }

    .content-section {
        max-width: 1280px;
        margin-left: auto;
        margin-right: auto;
    }
</style>

<main class="overflow-hidden">
    <!-- Hero Section -->
    <section class="relative h-[500px] lg:h-screen flex items-center justify-center text-center text-white">
        <div class="video-container video-overlay absolute inset-0 w-full h-full overflow-hidden">
            <video class="min-w-full min-h-full absolute object-cover" src="tumbler.mp4" autoplay muted loop></video>
        </div>
        <div class="z-10 px-6 space-y-4 lg:space-y-6">
            <h1 class="text-4xl font-bold lg:text-7xl md:text-5xl">
                Built By <span class="animate-typing overflow-hidden whitespace-nowrap border-r-4 border-r-white pr-5 text-4xl lg:text-7xl"></span>
            </h1>
            <h3 class="text-xl font-light lg:text-3xl md:text-2xl">Created By You</h3>
            <p class="text-lg lg:text-xl">Start your day without plastic with Tumbler Haven</p>
            <button class="mx-auto flex items-center gap-2 bg-white/60 hover:bg-white/80 text-gray-800 font-semibold py-3 px-8 rounded-full transition-all">
                Shop Now
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                    <path fill-rule="evenodd" d="M16.72 7.72a.75.75 0 011.06 0l3.75 3.75a.75.75 0 010 1.06l-3.75 3.75a.75.75 0 11-1.06-1.06l2.47-2.47H3a.75.75 0 010-1.5h16.19l-2.47-2.47a.75.75 0 010-1.06z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    </section>

    <!-- Products Section -->
    <section class="py-16 bg-gray-700 text-white">
        <div class="content-section px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-semibold mb-4">Bring your imagination—customize</h2>
                <p class="text-lg opacity-90">your favorite TumblerHaven bottles, tumblers, and barware.</p>
            </div>

            <div class="relative">
                <div class="flex justify-center">
                    <div class="card-hover max-w-sm bg-white/10 rounded-xl shadow-lg overflow-hidden backdrop-blur-sm">
                        <div class="relative pt-12 px-12 flex justify-center group-hover:scale-105 transition-transform">
                            <div class="absolute w-64 h-64 bottom-0 left-0 -mb-28 ml-4 opacity-20" style="background: radial-gradient(black, transparent 60%); transform: rotate3d(0, 0, 1, 20deg) scale3d(1, 0.6, 1);"></div>
                            <img class="w-56" src="3.png" alt="Bottle Image">
                        </div>
                        <div class="px-6 pb-6 mt-6">
                            <span class="block opacity-75">Bottle</span>
                            <div class="flex justify-between items-center mt-2">
                                <span class="block font-semibold text-xl">Oak Tree</span>
                                <button class="flex items-center gap-1 bg-white/30 hover:bg-white/40 rounded-full text-white text-sm font-medium px-5 py-2 transition-all">
                                    View More
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                        <path fill-rule="evenodd" d="M12.97 3.97a.75.75 0 011.06 0l7.5 7.5a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 11-1.06-1.06l6.22-6.22H3a.75.75 0 010-1.5h16.19l-6.22-6.22a.75.75 0 010-1.06z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between absolute top-1/2 left-0 right-0 transform -translate-y-1/2 px-4">
                    <button class="bg-white/40 hover:bg-white/60 text-gray-800 p-2 rounded-full shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd" d="M7.28 7.72a.75.75 0 010 1.06l-2.47 2.47H21a.75.75 0 010 1.5H4.81l2.47 2.47a.75.75 0 11-1.06 1.06l-3.75-3.75a.75.75 0 010-1.06l3.75-3.75a.75.75 0 011.06 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <button class="bg-white/40 hover:bg-white/60 text-gray-800 p-2 rounded-full shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd" d="M16.72 7.72a.75.75 0 011.06 0l3.75 3.75a.75.75 0 010 1.06l-3.75 3.75a.75.75 0 11-1.06-1.06l2.47-2.47H3a.75.75 0 010-1.5h16.19l-2.47-2.47a.75.75 0 010-1.06z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about-us" class="py-16 bg-gray-50">
        <div class="content-section px-6">
            <div class="flex flex-col lg:flex-row items-center gap-12 mb-20">
                <div class="relative w-full lg:w-1/2 flex justify-center">
                    <img src="tumbler-remove-bg.png" class="w-64 -translate-y-12 drop-shadow-lg" alt="">
                    <img src="tumbler2-remove-bg.png" class="absolute w-64 right-0 top-4 rotate-6 hover:-translate-y-4 transition-transform drop-shadow-lg" alt="">
                    <img src="tumbler3-remove-bg.png" class="absolute w-64 left-0 top-4 -rotate-6 hover:-translate-y-4 transition-transform drop-shadow-lg" alt="">
                </div>
                <div class="w-full lg:w-1/2">
                    <h2 class="text-3xl font-semibold text-gray-800 mb-4">Our Website</h2>
                    <p class="text-gray-600 leading-relaxed">
                        At Tumbler Haven, we make tumbler shopping easy, fun, and fully online. Our platform lets you customize your own tumbler in real time and place orders instantly—no more waiting or store visits. We're here to help you express your style with high-quality, personalized drinkware delivered right to your door.
                    </p>
                </div>
            </div>

            <div class="flex flex-col lg:flex-row-reverse items-center gap-12">
                <img class="w-full lg:w-1/2 rounded-lg shadow-md" src="aboutus2.png" alt="About our service">
                <div class="w-full lg:w-1/2">
                    <h2 class="text-3xl font-semibold text-gray-800 mb-4">Our Service</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Tumbler Haven provides a seamless online service that lets customers design and purchase custom tumblers from the comfort of their home. We offer a variety of tumbler sizes and styles, a real-time customization tool, and a fast ordering process with no need for back-and-forth messaging.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-16 bg-white">
        <div class="content-section px-6">
            <div class="flex flex-col lg:flex-row items-center gap-12">
                <img class="w-full lg:w-1/2 rounded-lg shadow-md" src="https://i.pinimg.com/736x/2f/f3/d4/2ff3d4b27824c7ae338c586b3a71f919.jpg" alt="Our team">
                <div class="w-full lg:w-1/2">
                    <h2 class="text-3xl font-semibold text-gray-800 mb-4">Our Team</h2>
                    <p class="text-gray-600 leading-relaxed">
                        The team behind Tumbler Haven is a passionate group of creative thinkers, developers, and customer-focused individuals who believe in blending technology with personalization. With backgrounds in web development, design, and e-commerce, we work together to build a platform that is easy to use, visually appealing, and truly helpful for our users.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-16 bg-gray-50">
        <div class="content-section px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-semibold text-gray-800">What Our Customers Are Saying</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($reviews as $review)
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <blockquote class="mb-4">
                        <p class="text-gray-700 italic">"{{ $review->comment }}"</p>
                    </blockquote>
                    @if (!is_null($review->rating))
                    <div class="flex items-center mb-4">
                        <div class="flex text-yellow-400">
                            @for ($i = 0; $i < $review->rating; $i++)
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                @endfor
                        </div>
                        <span class="text-gray-500 text-sm ml-2">{{ $review->rating }}/5</span>
                    </div>
                    @endif
                    <div class="flex items-center">
                        <img class="w-10 h-10 rounded-full mr-4" src="{{ $review->user->thumbnail ? asset($review->user->thumbnail) : 'https://upload.wikimedia.org/wikipedia/commons/6/65/No-Image-Placeholder.svg' }}" alt="{{ $review->user->username }}">
                        <div>
                            <p class="font-medium text-gray-800">{{ $review->user->username }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            @if (count($reviews) > 3)
            <div class="text-center mt-12">
                <a href="#" class="inline-flex items-center px-6 py-2 border border-gray-300 rounded-full text-gray-700 hover:bg-gray-100 transition-colors">
                    View More
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-gray-800 text-white text-center">
        <div class="content-section px-6">
            <h3 class="text-2xl font-semibold mb-6">Don't see what you're looking for?</h3>
            <button class="bg-white hover:bg-gray-100 text-gray-800 font-medium py-3 px-8 rounded-full transition-colors">
                Contact us
            </button>
        </div>
    </section>

    <!-- Back to Top Button -->
    <button onclick="goToTop()" class="fixed bottom-8 right-8 bg-gray-700 hover:bg-gray-600 text-white p-3 rounded-full shadow-lg transition-all opacity-0 invisible z-50" id="backToTop">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
            <path fill-rule="evenodd" d="M11.47 2.47a.75.75 0 011.06 0l3.75 3.75a.75.75 0 01-1.06 1.06l-2.47-2.47V21a.75.75 0 01-1.5 0V4.81L8.78 7.28a.75.75 0 01-1.06-1.06l3.75-3.75z" clip-rule="evenodd" />
        </svg>
    </button>

    <script src="https://unpkg.com/taos@1.0.5/dist/taos.js"></script>
    <script>
        // Typing animation
        document.addEventListener("DOMContentLoaded", () => {
            const textElement = document.querySelector(".animate-typing");
            const textContent = "TumblerHaven";
            let index = 0;

            function typeText() {
                if (index < textContent.length) {
                    textElement.textContent += textContent.charAt(index);
                    index++;
                    setTimeout(typeText, 150);
                } else {
                    setTimeout(() => {
                        index = 0;
                        textElement.textContent = "";
                        typeText();
                    }, 2000);
                }
            }

            typeText();

            // Back to top button
            const backToTop = document.getElementById('backToTop');

            window.addEventListener('scroll', () => {
                if (window.scrollY > 300) {
                    backToTop.classList.remove('opacity-0', 'invisible');
                    backToTop.classList.add('opacity-100', 'visible');
                } else {
                    backToTop.classList.add('opacity-0', 'invisible');
                    backToTop.classList.remove('opacity-100', 'visible');
                }
            });
        });

        function goToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
    </script>
    @endsection