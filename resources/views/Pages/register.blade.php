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
            <form id="signup" action="{{ route('register.save') }}" method="POST">
                @csrf
                @if($errors->has('$errors'))
                    {{ $errors->first('error') }}
                @endif
                <div class="w-full mb-3">
                    <div>
                        <span class="text-red-900">*</span>
                        Username
                    </div>
                    <div class="w-full border-b-2 outline-none  ">
                        <div class="flex">
                            <input type="text"
                                   id="username"
                                   name="username"
                                   autocomplete="off"
                                   required class="bg-gray-100 text-gray-500 w-full border-none outline-none mx-4 mt-2">
                           <div class="hidden" id="corName">
                               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 w-6 h-6 text-green-600">
                                   <path fillRule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clipRule="evenodd" />
                               </svg>
                           </div>
                        </div>
                    </div>
                    @error('username')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full">
                    <div>
                        <span class="text-red-900">*</span>
                        Email
                    </div>
                    <div class="w-full border-b-2 outline-none ">
                       <div class="flex">
                           <input type="email"
                                  autocomplete="off"
                                  id="email"
                                  name="email"
                                  required
                                  class="bg-gray-100 text-gray-500 w-full border-none outline-none mx-4 mt-2">
                           <div id="corEmail" class="hidden">
                               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 w-6 h-6 text-green-600">
                                   <path fillRule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clipRule="evenodd" />
                               </svg>
                           </div>
                       </div>
                    </div>
                    @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full mt-3">
                    <div>
                        <span class="text-red-900">*</span>
                        Password
                    </div>
                    <div class="w-full border-b-2 outline-none">
                        <div class="flex">
                            <input type="password"
                                   id="password"
                                   name="password"
                                   required
                                   class="bg-gray-100 text-gray-500 w-full border-none outline-none mx-4 mt-2"
                            >
                            <div  id="corPass" hidden>
                                <svg id="corPass" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 w-6 h-6 text-green-600 ">
                                    <path fillRule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clipRule="evenodd" />
                                </svg>
                            </div>

                        </div>
                    </div>
                </div>
                <p class="text-[11px] text-red-900 mt-3 hidden " id="warning">

                </p>
                <div class="flex mt-3 mx-2">
                    <input type="checkbox" onclick="showPassword()">
                    <p class="text-sm mx-2 text-gray-500">Show password</p>
                </div>
                <button class="w-full bg-black text-white text-center p-2 mt-5 rounded-md hover:bg-gray-400 transition duration-300 delay-3000" type="submit">Sign Up</button>
                <div class="text-sm mt-3 text-center">
                    <p>Already have an account ? <a class="underline" href="/login">Log In</a> </p>
                </div>
            </form>
        </div>
    </div>
</main>
</body>
<script>

    const email=document.getElementById("email").value.trim();
    const signup=document.getElementById('signup');
    const password = document.getElementById('password');

    //toggle password show or hide
     function showPassword(){
         if(password.type==="password"){
             password.type="text";
         }
         else {
             password.type="password";
         }
     }


    password.onblur=function (){
        const warning=document.getElementById('warning');
        warning.style.display="none";
    }

    email.onblur=function (){

    }
    //event of sign up when it keyup
    signup.addEventListener("keyup", function (event) {
        event.preventDefault();
        const password = document.getElementById("password").value;
        const warning = document.getElementById("warning");
        const corPass=document.getElementById('corPass');
        const corEmail=document.getElementById('corEmail');
        const username=document.getElementById('username');
        const email=document.getElementById("email").value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        //define validation style username
        if (username.value){
            username.style.display="block";
        }
        //define validation style email
        if (emailRegex){
            corEmail.style.display="block"
        }
        if(!emailRegex){
            corEmail.style.display="none";
        }
        // Define validation rules
        const hasLowerCase = /[a-z]/.test(password);
        const hasUpperCase = /[A-Z]/.test(password);
        const hasNumber = /[0-9]/.test(password);
        const hasSpecialCharacter= /[@.#$!%^&*?]/.test(password);
        const isValidLength = password.length >= 8;

        // Clear any previous messages
        warning.style.display = "block";
        warning.innerHTML = ""; // Optional: Customize this to append multiple messages

        // event when password missing and not completed
        if (!hasLowerCase || !hasUpperCase || !hasNumber|| !hasSpecialCharacter|| !isValidLength) {
            corPass.style.display="none";
            return;
        }

        // If all criteria pass, proceed with form submission
        warning.style.display = "none";
        corPass.style.display="block";
    });

    //check validate when submit
    signup.addEventListener("submit", function (event) {
        //event.preventDefault();
        const password = document.getElementById("password").value;
        const warning = document.getElementById("warning");
        const corPass=document.getElementById('corPass');

        // Define validation rules
        const hasLowerCase = /[a-z]/.test(password);
        const hasUpperCase = /[A-Z]/.test(password);
        const hasNumber = /[0-9]/.test(password);
        const hasSpecialCharacter= /[@.#$!%^&*?]/.test(password);
        const isValidLength = password.length >= 8;

        // Clear any previous messages
        warning.style.display = "block";
        warning.innerHTML = ""; // Optional: Customize this to append multiple messages

        // Validate the password
        if (!hasLowerCase) {
            warning.innerHTML = "Password must include at least lowercase letter.<br>";
        }
        if (!hasUpperCase) {
            warning.innerHTML = "Password must include at least  uppercase letter.<br>";
        }
        if (!hasNumber) {
            warning.innerHTML = "Password must include at least  numeric character.<br>";
        }
        if (!hasSpecialCharacter){
            warning.innerHTML="Password must include at least special character.<br>";
        }
        if (!isValidLength) {
            warning.innerHTML = "Password must be at least 8 characters long.<br>";
        }
        // If any criteria are missing, stop form submission
        if (!hasLowerCase || !hasUpperCase || !hasNumber|| !hasSpecialCharacter|| !isValidLength) {
            corPass.style.display="none";
            return;
        }

        // If all criteria pass, proceed with form submission
        warning.style.display = "none";
        corPass.style.display="block";
    });

</script>
</html>
