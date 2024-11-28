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
            <form class="" id="signup">
                <div class="w-full mb-3">
                    <div>
                        <span class="text-red-900">*</span>
                        Username
                    </div>
                    <div class="w-full border-b-2 outline-none ">
                        <input type="text"
                               id="username"
                               required class="bg-gray-100 w-full border-none outline-none">
                    </div>
                </div>
                <div class="w-full">
                    <div>
                        <span class="text-red-900">*</span>
                        Email
                    </div>
                    <div class="w-full border-b-2 outline-none ">
                        <input type="email"
                               id="email" required
                               class="bg-gray-100 w-full border-none outline-none">
                    </div>
                </div>
                <div class="w-full mt-3">
                    <div>
                        <span class="text-red-900">*</span>
                        Password
                    </div>
                    <div class="w-full border-b-2 outline-none">
                        <input type="password"
                               id="password"
                               required
                               class="bg-gray-100 w-full border-none outline-none"
                        >
                    </div>
                </div>
                <p class="text-[11px] text-red-900 mt-3 hidden " id="warning">
                    Password must contain number,uppercase,lowercase letter, and at least 8 characters
                </p>
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
<script>
    const password = document.getElementById('password');
    const warning=document.getElementById('warning');
    const signup=document.getElementById('signup');
    password.onblur=function (){
        warning.style.display="none";
    }
    signup.addEventListener("submit",function (event){
        event.preventDefault();
        let LowerCaseLetters=/[a-z]/g;
        if(password.value.match(LowerCaseLetters)){
            warning.style.display="none";
        }else {
            warning.style.display="block";
        }
        let Numbers=/[0-9]/g
        if(password.value.match(Numbers)){
            warning.style.display="none"
        }
        let UpperCaseLetters=/[A-Z]/g
        if(password.value.match(UpperCaseLetters)){
            warning.style.display="none"
        }
        else{
            warning.style.display="block"
        }
        if(password.value.length >= 8) {
            warning.style.display="none"
        } else {
            warning.style.display="block"
        }
    });

    password.onkeyup=function (){

    }
</script>
</html>
