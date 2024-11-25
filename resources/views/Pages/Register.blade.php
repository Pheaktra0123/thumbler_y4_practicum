@extends("TailwindCssLink.style")
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
</head>
<body class="bg-black">
<main class="h-screen flex-col content-center">
    <div class="bg-white w-1/4 mx-auto rounded-lg  ">
        <div class="text-center space-y-2 py-3">
            <h1 class="text-4xl font-bold">Welcome</h1>
            <p class="text-md">Be the first to know about new releases, limited editions and exclusive deals.</p>
            <h2 class="text-2xl font-bold mb-2">Sign Up</h2>
        </div>
        <div class="bg-gray-100 px-10 py-10 rounded-b-lg mt-2">
            <form class="" >
                <div class="w-full mb-3">
                    <div>
                        <span>*</span>
                        Username
                    </div>
                    <div class="w-full border-b-2 outline-none ">
                        <input type="email" required class="bg-gray-100 w-full border-none outline-none">
                    </div>
                </div>
                <div class="w-full">
                    <div>
                        <span>*</span>
                        Email
                    </div>
                    <div class="w-full border-b-2 outline-none ">
                        <input type="email" required class="bg-gray-100 w-full border-none outline-none">
                    </div>
                </div>
                <div class="w-full mt-3">
                    <div>
                        <span class="text-red">*</span>
                        Password
                    </div>
                    <div class="w-full border-b-2 outline-none">
                        <input type="password" required class="bg-gray-100 w-full border-none outline-none ">
                    </div>
                </div>
                <div class="w-full bg-black text-white text-center p-2 mt-5 rounded-md">
                    <button class="w-full">Sign Up</button>
                </div>
                <div class="text-sm mt-3 text-center">
                    <p>Already have an account ? <a class="underline" href="/login">Log In</a> </p>
                </div>
            </form>
        </div>
    </div>
</main>
</body>
</html>
