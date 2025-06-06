@extends('Component.header')
@extends('TailwindCssLink.style')
@section('title', 'User Dashboard')
@section('contents')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <main class="mt-2">
        <div class="mx-auto max-w-screen-xl px-4 pb-6 sm:px-6 lg:px-8 lg:pb-12">
            <div class="overflow-hidden rounded-lg bg-white shadow">
                <div class="divide-y divide-gray-200 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x">
                    <aside class="py-6 lg:col-span-3">
                        <nav class="space-y-1">

                            <a href="#"
                                class="bg-teal-50 border-teal-500 text-teal-700 hover:bg-teal-50 hover:text-teal-700 group border-l-4 px-3 py-2 flex items-center text-sm font-medium"
                                x-state:on="Current" x-state:off="Default" aria-current="page"
                                x-state-description="Current: &quot;bg-teal-50 border-teal-500 text-teal-700 hover:bg-teal-50 hover:text-teal-700&quot;, Default: &quot;border-transparent text-gray-900 hover:bg-gray-50 hover:text-gray-900&quot;">
                                <svg class="text-teal-500 group-hover:text-teal-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                                    x-state:on="Current" x-state:off="Default"
                                    x-state-description="Current: &quot;text-teal-500 group-hover:text-teal-500&quot;, Default: &quot;text-gray-400 group-hover:text-gray-500&quot;"
                                    x-description="Heroicon name: outline/user-circle" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z">
                                    </path>
                                </svg>
                                <span class="truncate">Profile</span>
                            </a>

                            <a href="{{ route('view.history') }}"
                                class="border-transparent text-gray-900 hover:bg-gray-50 hover:text-gray-900 group border-l-4 px-3 py-2 flex items-center text-sm font-medium"
                                x-state-description="undefined: &quot;bg-teal-50 border-teal-500 text-teal-700 hover:bg-teal-50 hover:text-teal-700&quot;, undefined: &quot;border-transparent text-gray-900 hover:bg-gray-50 hover:text-gray-900&quot;">
                                <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                                    x-state-description="undefined: &quot;text-teal-500 group-hover:text-teal-500&quot;, undefined: &quot;text-gray-400 group-hover:text-gray-500&quot;"
                                    x-description="Heroicon name: outline/cog" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.5 12a7.5 7.5 0 0015 0m-15 0a7.5 7.5 0 1115 0m-15 0H3m16.5 0H21m-1.5 0H12m-8.457 3.077l1.41-.513m14.095-5.13l1.41-.513M5.106 17.785l1.15-.964m11.49-9.642l1.149-.964M7.501 19.795l.75-1.3m7.5-12.99l.75-1.3m-6.063 16.658l.26-1.477m2.605-14.772l.26-1.477m0 17.726l-.26-1.477M10.698 4.614l-.26-1.477M16.5 19.794l-.75-1.299M7.5 4.205L12 12m6.894 5.785l-1.149-.964M6.256 7.178l-1.15-.964m15.352 8.864l-1.41-.513M4.954 9.435l-1.41-.514M12.002 12l-3.75 6.495">
                                    </path>
                                </svg>
                                <span class="truncate">My order</span>
                            </a>
                        </nav>
                    </aside>
                    <div class=" divide-y divide-gray-200 lg:col-span-9">
                        <!-- Card start -->
                        <div class="max-w-lg mx-auto rounded-lg overflow-hidden text-gray-800">
                            <div class="border-b px-4 pb-6">
                                <div class="text-center my-4">
                                    @if (auth()->check() && auth()->user()->thumbnail)
                                    <img class="h-56 w-56 rounded-full border-4 border-gray-300 mx-auto my-4 object-cover"
                                        src="{{ auth()->user()->thumbnail ? asset(auth()->user()->thumbnail) : 'https://upload.wikimedia.org/wikipedia/commons/6/65/No-Image-Placeholder.svg' }}"
                                        alt="Profile Image">
                                    @else
                                    <!-- Display a default image or a placeholder -->
                                    <img class="h-56 w-56 rounded-full border-4 border-gray-300 mx-auto my-4"
                                        src="{{ asset('profile_placeholder.jpg') }}"
                                        alt="Default Profile Image">
                                    @endif

                                    <div class="py-2 ">
                                        <h3 class="font-bold text-2xl text-gray-800  mb-1">{{auth()->user()->username}}</h3>
                                        <p class="text-lg text-gray-700  mb-2">{{auth()->user()->email}}</p>
                                        <div class="inline-flex text-gray-500  text-start">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12ZM12 8.25a.75.75 0 0 1 .75.75v3.75a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75Zm0 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                                            </svg>
                                            <p class="text-gray-500  text-start items-start">Joined: {{auth()->user()->created_at->diffForHumans()}}</p>
                                        </div>
                                        <div
                                            class="flex items-center justify-between mt-4 w-full">

                                            <div class="flex gap-4 text-start items-center text-lg">
                                                <h3 class="font-normal text-md">Address:</h3>
                                                <p class="text-gray-500 text-sm"> @if(auth()->user()->address) {{auth()->user()->address}} @else your address @endif</p>
                                            </div>
                                            <div class="text-start items-center flex gap-4 ">
                                                <h3 class="font-normal text-md">Phone Number: </h3>
                                                <p class="text-gray-500 text-sm ">@if(auth()->user()->phone) {{auth()->user()->phone}} @else your phone number @endif</p>
                                            </div>
                                        </div>
                                        <div class="flex gap-4  mt-5">
                                            <h3 class="font-normal text-md">Bio:</h3>
                                            <p class="text-gray-500 text-sm  text-start items-center"> @if(auth()->user()->description) {{auth()->user()->description}} @else Description @endif</p>
                                        </div>
                                    </div>
                                </div>
                                <a href="/User/Profile/Edit">
                                    <div class="flex gap-2 px-2">
                                        <button
                                            class="flex-1 rounded-lg border-2 border-gray-400  font-semibold text-black px-4 py-2 fucus:bg-gray-800 hover:bg-gray-700 fucus:text-white hover:text-white hover:outline-none hover:border-transparent">
                                            Edit Profile
                                        </button>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
@endsection