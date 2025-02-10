@extends('Component.header')
@extends('TailwindCssLink.style')
@section('title', 'Edit Profile')
@section('contents')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <div class="bg-gray-100">
        <div>
            <div x-data="{ open: false }" class="relative overflow-hidden">
                <main class="relative mt-24">
                    <div class="mx-auto max-w-screen-xl px-4 pb-6 sm:px-6 lg:px-8 lg:pb-16">
                        <div class="overflow-hidden rounded-lg bg-white shadow ">
                            <div class="lg:grid lg:grid-cols-12 lg:gap-x-5 lg:items-start lg:mt-10 lg:px-10 lg:pb-5">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                                </svg>
                            </div>
                            <div class="divide-y divide-gray-200 lg:grid lg:justify-center lg:px-16 lg:grid-cols-10 lg:divide-y-0 lg:divide-x">
                                <form class="divide-y divide-gray-200 lg:col-span-9" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <!-- Profile section -->
                                    <div class="py-6 px-4 sm:p-6 lg:pb-8">
                                        <div>
                                            <h2 class="text-lg font-medium leading-6 text-gray-900">Profile Edit</h2>
                                            <p class="mt-1 text-sm text-gray-500">Edit your information</p>
                                        </div>

                                        <div class="mt-6 flex flex-col lg:flex-row">
                                            <div class="flex-grow space-y-6">
                                                <div>
                                                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                                                    <div class="mt-1 flex rounded-md shadow-sm">
                                                        <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-gray-500 sm:text-sm">Username/</span>
                                                        <input type="text" name="username" id="username" autocomplete="username" class="block w-full min-w-0 flex-grow rounded-none rounded-r-md border-gray-300 focus:border-sky-500 focus:ring-sky-500 sm:text-sm" value="{{ auth()->user()->username }}">
                                                    </div>
                                                </div>
                                                <div>
                                                    <label for="Email" class="block text-sm font-medium text-gray-700">Email</label>
                                                    <div class="mt-1 flex rounded-md shadow-sm">
                                                        <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-gray-00 sm:text-sm">Email/</span>
                                                        <input type="text" name="username" id="username" autocomplete="username" class="block w-full min-w-0 flex-grow rounded-none rounded-r-md border-gray-300 focus:border-sky-500 focus:ring-sky-500 sm:text-sm text-gray-300" value="{{ auth()->user()->email }}" disabled>
                                                    </div>
                                                </div>

                                                <div>
                                                    <label for="about" class="block text-sm font-medium text-gray-700">Bio</label>
                                                    <div class="mt-1">
                                                        <textarea id="about" name="about" rows="3" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm">{{ auth()->user()->description }}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-6 flex-grow lg:mt-0 lg:ml-6 lg:flex-shrink-0 lg:flex-grow-0">
                                                <p class="text-sm font-medium text-gray-700" aria-hidden="true">Photo</p>
                                                <div class="mt-1 lg:hidden">
                                                    <div class="flex items-center">
                                                        <div class="inline-block h-12 w-12 flex-shrink-0 overflow-hidden rounded-full"
                                                            aria-hidden="true">
                                                            <img class="h-full w-full rounded-full" src="{{ auth()->user()->thumbnail ? asset(auth()->user()->thumbnail) : 'https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=320&amp;h=320&amp;q=80' }}" alt="">
                                                        </div>
                                                        <div class="ml-5 rounded-md shadow-sm">
                                                            <div
                                                                class="group relative flex items-center justify-center rounded-md border border-gray-300 py-2 px-3 focus-within:ring-2 focus-within:ring-sky-500 focus-within:ring-offset-2 hover:bg-gray-50">
                                                                <label for="mobile-user-photo" class="pointer-events-none relative text-sm font-medium leading-4 text-gray-700">
                                                                    <span>Change</span>
                                                                    <span class="sr-only"> user photo</span>
                                                                </label>
                                                                <input id="mobile-user-photo" name="user-photo" type="file" class="absolute h-full w-full cursor-pointer rounded-md border-gray-300 opacity-0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="relative hidden overflow-hidden rounded-full lg:block">
                                                    <img class="relative h-40 w-40 rounded-full border" id="user-avatar" src="{{ auth()->user()->thumbnail ? asset(auth()->user()->thumbnail) : 'https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=320&amp;h=320&amp;q=80' }}" alt="User Avatar">
                                                    <label for="desktop-user-photo" class="absolute inset-0 flex h-full w-full items-center justify-center bg-black bg-opacity-75 text-sm font-medium text-white opacity-0 focus-within:opacity-100 hover:opacity-100">
                                                        <span>Change</span>
                                                        <span class="sr-only"> user photo</span>
                                                        <input type="file" id="desktop-user-photo" name="user-photo" class="absolute inset-0 h-full w-full cursor-pointer rounded-md border-gray-300 opacity-0" accept="image/*">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-6 grid grid-cols-12 gap-6">
                                            <div class="col-span-12 sm:col-span-6">
                                                <label for="first-name" class="block text-sm font-medium text-gray-700">Phone Number(+855):</label>
                                                <input type="text" name="phone" value="{{ auth()->user()->phone }}" id="phoneNumber" autocomplete="given-name" class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm">
                                            </div>

                                            <div class="col-span-12 sm:col-span-6">
                                                <label for="last-name" class="block text-sm font-medium text-gray-700">Location(location for pick up):</label>
                                                <input type="text" name="address" value="{{ auth()->user()->address }}" id="location" autocomplete="family-name" class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- button section -->
                                    <div class="divide-y divide-gray-200 pt-6">
                                        <div class="mt-4 flex justify-end py-4 px-4 sm:px-6">
                                            <button type="button" class="inline-flex justify-center rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">Cancel</button>
                                            <button type="submit" class="ml-5 inline-flex justify-center rounded-md border border-transparent bg-sky-700 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-sky-800 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">Save</button>
                                        </div>
                                    </div>
                                </form>
                                @if(Session::has('message'))
                                <script>
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success!',
                                        text: '{{ Session::get("success") }}',
                                        confirmButtonText: 'OK',
                                        timer: 3000,
                                        timerProgressBar: true
                                    });
                                </script>
                                @endif

                            </div>
                        </div>
                    </div>
                </main>
            </div>

        </div>
</body>

</html>
<script>
    document.getElementById('desktop-user-photo').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('user-avatar').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection