@extends('TailwindCssLink.style')
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Admin</title>
</head>
<body>
    <div class="w-screen min-h-screen flex items-center justify-center bg-gray-50  px-4 sm:px-6 lg:px-8">
        <div class="relative py-3 sm:max-w-xs sm:mx-auto">
            <div class="min-h-96 px-8 py-6 mt-4 text-left bg-white   rounded-xl shadow-lg">
                <div class="flex flex-col justify-center items-center h-full select-none">
                    <div class="flex flex-col items-center justify-center gap-2 mb-8">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                        </svg>

                        <p class="m-0 text-[16px] font-semibold">Login to Admin</p>
                        <span class="m-0 text-xs max-w-[90%] text-center text-[#8B8E98]">Get started with our app, just start section and enjoy experience.
                        </span>
                    </div>
                    <div class="w-full flex flex-col gap-2">
                        <label class="font-semibold text-xs text-gray-400 ">Username</label>
                        <input class="border rounded-lg px-3 py-2 mb-5 text-sm w-full outline-none " placeholder="Username" />

                    </div>
                </div>
                <div class="w-full flex flex-col gap-2">
                    <label class="font-semibold text-xs text-gray-400 ">Password</label>
                    <input type="password" class="border rounded-lg px-3 py-2 mb-5 text-sm w-full outline-none " placeholder="••••••••" />

                </div>
                <div className="mt-5">
                    <button class="py-1 px-8 bg-blue-500 hover:bg-blue-800 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg cursor-pointer select-none">Login</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>
