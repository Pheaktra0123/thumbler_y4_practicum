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
<body class="bg-black">
        <main class="h-screen flex-col content-center">
            <div class="bg-white  w-1/4 mx-auto rounded-lg  ">
                <div class="text-center space-y-2 py-3">
                    <h1 class="text-4xl font-bold">Welcome</h1>
                    <p class="text-md">Be the first to know about new releases, limited editions and exclusive deals.</p>
                    <h2 class="text-2xl font-bold mb-2">Log In</h2>
                </div>
                <div class="bg-gray-100 px-10 py-10 rounded-b-lg mt-2">
                    <form class="" id="loginForm">
                        <div class="w-full">
                            <div>
                                <span class="text-red-900">*</span>
                                Email
                            </div>
                            <div id="inputEmail" class="w-full border-b-2 outline-none ">
                                <input type="email" id="email" autocomplete="off" required class="bg-gray-100 w-full border-none outline-none ">
                            </div>
                        </div>
                        <div class="w-full mt-3">
                            <div>
                                <span class="text-red-900">*</span>
                                Password
                            </div>
                            <div id="inputPass" class="w-full border-b-2 outline-none">
                                <input type="password" required id="password" class="bg-gray-100 w-full border-none outline-none ">
                            </div>
                        </div>
                        <div class="mt-5 text-sm">
                            <p id="errorPass"></p>
                        </div>
                        <div class="mt-5 text-sm underline">
                            <a href="#">Forgot Password</a>
                        </div>
                        <button type="submit" class="w-full bg-black text-white text-center p-2 mt-5 rounded-md">Login</button>
                        <div class="text-sm mt-3 text-center">
                            <p>Don't have account ? <a class="underline" href="{{route('register')}}">Sign Up</a> </p>
                        </div>
                    </form>
                </div>
            </div>
        </main>
</body>
<script>
    const emailInput=document.getElementById("email");
    const passwordInput=document.getElementById("password");
    emailInput.addEventListener("input",function (event){
        event.preventDefault();
        const email=emailInput.value.trim();
        let isValid=true;
        const inputEmail=document.getElementById("inputEmail");
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
           if (!emailRegex.test(email)){
               inputEmail.style.borderBottomColor="red";
               const placeholder=email.input.placeholder="please! add your email"
               console.log(placeholder)
           }
           else {
               inputEmail.style.borderBottomColor="green";
           }
    })
    passwordInput.addEventListener("input",(event)=>{
        event.preventDefault();
        const inputPass=document.getElementById("inputPass");
        const password=passwordInput.value.trim();
        const errorPass=document.getElementById("errorPass");
        if (!password) {
            passwordInput.style.borderBottomColor = "red";
        }
        else {
            inputPass.style.borderBottomColor = "green";
            errorPass.textContent = "";
        }
    })
</script>
</html>
