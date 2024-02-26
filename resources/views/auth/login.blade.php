@extends('template')

@section('content')
    <div class="w-full my-10 pt-16">
        <div class="lg:w-1/3 m-10 lg:m-auto my-10 py-10 shadow-gray shadow-xl px-10">
            <p class="text-center text-4xl text-blue">Login</p>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="border border-blue rounded mt-2 flex justify-between pr-4">

                    <input type="email" name="email" id="email" class="py-3 px-2 outline-none bg-gray-100" placeholder="Email*">
                    <i class="fa-solid fa-envelope py-3 pl-16 lg:pt-4 lg:pl-28"></i>
                </div>
                <div class="border border-blue rounded mt-2 flex justify-between pr-4">
                    <input type="password" name="password" id="password" class="py-3 px-2 outline-none bg-gray-100"
                        placeholder="Password*">
                    <i class="fa-solid fa-eye py-3 pl-16 lg:pt-4 lg:pl-28" onclick="togglePassword('password')"></i>
                    <i class="fa-solid fa-eye-slash pl-16 py-3 lg:pt-4 lg:pl-28" style="display:none"
                        onclick="togglePassword('password')"></i>
                </div>

                <div class="bg-blue my-2 mt-5 rounded">
                    <button name="login" id="login" class="text-white text-sm text-center w-full uppercase py-2"
                        type="submit" value="Login">
                        Login
                    </button>
                </div>
            </form>
            {{-- <a href="#!" class="">Forgot password?</a> --}}
        </div>
    @endsection
    <script>
        function togglePassword(inputId) {
            const passwordInput = document.getElementById(inputId);
            const eyeIcon = document.querySelector(`#${inputId} ~ .fa-eye`);
            const eyeSlashIcon = document.querySelector(`#${inputId} ~ .fa-eye-slash`);
    
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.style.display = "none";
                eyeSlashIcon.style.display = "block";
            } else {
                passwordInput.type = "password";
                eyeIcon.style.display = "block";
                eyeSlashIcon.style.display = "none";
            }
        }
    </script>
    
