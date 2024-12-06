<!-- header.html -->
<header
    class="bg-black text-white w-full sticky top-0 z-50 flex flex-col overflow-hidden px-5 py-5 lg:mx-auto lg:flex-row lg:items-center">
    <a href="/" class="flex font-serif items-center whitespace-nowrap text-2xl font-bold text-white">
        Tumbler Haven
    </a>
    <input type="checkbox" class="peer hidden" id="navbar-open" />
    <label class="absolute top-5 right-5 cursor-pointer lg:hidden" for="navbar-open">
        <span class="sr-only">Toggle Navigation</span>
        <svg class="h-7 w-7 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </label>
    <nav aria-label="Header Navigation"
        class="peer-checked:pt-8 peer-checked:max-h-60 align-center flex max-h-0 w-full flex-col items-center justify-center overflow-hidden transition-all lg:ml-24 lg:max-h-full lg:flex-row">
        <ul class="flex w-full flex-col items-center space-y-2 lg:flex-row lg:justify-center lg:space-y-0">
            <li class="lg:mr-20"><a class="text-white transition hover:opacity-70" href="/">Home</a></li>
            <li class="lg:mr-20"><a class="text-white transition hover:opacity-70" onclick="goesToAboutUs()" href="#about-us">About Us</a></li>
            <li class="lg:mr-20"><a class="text-white transition hover:opacity-70" href="/customize">Customize</a></li>
        </ul>
        <hr class="mt-4 w-full lg:hidden" />
        <div class="my-4 flex items-center space-x-6 space-y-2 lg:my-0 lg:ml-auto lg:space-x-8 lg:space-y-0">
            <a href="/login" title="Login" class="font-bold text-white hover:opacity-70">Login</a>
            <button id="cartIcon" title="Cart" class="text-white hover:opacity-70">
                <svg class="h-8 w-8" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 3h2l.4 2M7 13h11l4-8H5.4M7 13L5.4 5M7 13l-1.4-2M10 21a1 1 0 100-2 1 1 0 000 2zm7 0a1 1 0 100-2 1 1 0 000 2z" />
                </svg>
            </button>
        </div>
    </nav>
</header>

