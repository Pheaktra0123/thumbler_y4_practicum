@extends("TailwindCssLink.style")
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
</head>
<body class="bg-black ">
        <main class="bg-white w-11/12 flex-col mx-auto ">
            <div class=" text-center space-y-4">
                <h1 class="text-5xl font-bold ">Welcome</h1>
                <p class="text-xl">Be the first to know about new releases, limited editions and exclusive deals.</p>
                <h2 class="text-2xl font-bold">Log In</h2>
            </div>
            <div>
                <form action="" >
                    <div class="">
                       <div>Email</div>
                        <div>
                            <input type="email" required>
                        </div>
                    </div>
                    <div>
                        <div>Password</div>
                        <div>
                            <input type="password" required>
                        </div>
                    </div>
                </form>
            </div>
        </main>
</body>
</html>
