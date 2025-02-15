@extends("TailwindCssLink.style")
@extends("TailwindCssLink.fontStyle")
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
</head>

<body class="">
    <main class="">
        <div class="relative h-screen overflow-hidden">
            <div class="absolute inset-0">
                <img src="bg-login.jpg" alt="Background Image" class="object-cover object-center w-full h-full" />
                <div class="absolute inset-0 bg-black opacity-60"></div>
            </div>
            <div class="relative z-10 flex flex-col justify-center items-center h-full ">
                <div class="bg-white/80 w-sm mx-auto rounded-lg lg:w-1/4 lg:mx-auto md:w-md md:mx-auto">
                    <div class="text-center space-y-2 py-3">
                        <h1 class="text-4xl font-bold">Welcome</h1>
                        <p class="text-md">Be the first to know about new releases, limited editions and exclusive deals.</p>
                        <h2 class="text-2xl font-bold mb-2">Log In</h2>
                    </div>
                    <div class="bg-gray-100 px-10 py-10 rounded-b-lg mt-2 shadow-lg shadow-gray-300/50 drop-shadow-xl">
                        <form class="" id="loginForm" action="{{route('login.action')}}" method="POST">
                            @csrf
                            <div class="w-full">
                                <div>
                                    <span class="text-red-900">*</span>
                                    Email
                                </div>
                                <div id="inputEmail" class="w-full border-b-2 outline-none ">
                                    <input type="email" id="email" name="email" autocomplete="off" required class="bg-gray-100 w-full border-none outline-none text-gray-500 px-2 py-1">
                                </div>
                            </div>
                            <div class="w-full mt-3">
                                <div>
                                    <span class="text-red-900">*</span>
                                    Password
                                </div>
                                <div id="inputPass" class="w-full border-b-2 outline-none">
                                    <input type="password" name="password" required id="password" class="bg-gray-100 w-full border-none outline-none text-gray-500 px-2 py-1 ">
                                </div>
                            </div>
                            <div class="mt-5 text-sm">
                                <p id="errorPass"></p>
                            </div>
                            <div class="flex justify-between">
                                <div class="flex mx-2">
                                    <input type="checkbox" onclick="showPassword()">
                                    <p class="text-sm mx-2 text-gray-500">Show password</p>
                                </div>
                                <div class="text-sm underline">
                                    <a href="#">Forgot Password</a>
                                </div>
                            </div>
                            <button type="submit" class="w-full bg-black text-white text-center p-2 mt-5 rounded-md">Login</button>
                            <div class="text-sm mt-3 text-center">
                                <p>Don't have account ? <a class="underline" href="{{route('register')}}">Sign Up</a> </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
<script>
    function showPassword() {
        if (password.type === "password") {
            password.type = "text";
        } else {
            password.type = "password";
        }
    }
</script>

</html>