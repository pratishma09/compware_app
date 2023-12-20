@extends('template')

@section('content')
    <div class=">
        <div class="">
            <div class="">
                <div class="">
                    <img src="/img/login.jpg" alt="login" class="">
                </div>
                <div class="">
                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <h1>{{ $error }}</h1>
                        @endforeach
                    @endif
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <div class="">
                        <div class="">
                            <img src="/img/logo.png" alt="logo" class="">
                        </div>
                        <p class="">Sign into your account</p>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email address">
                                @error('email')
                                <span class="" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="">
                                <label for="password" class="">Password</label>
                                <input type="password" name="password" id="password" class="" placeholder="***********">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <input name="login" id="login" class="" type="submit" value="Login">
                        </form>
                        <a href="#!" class="">Forgot password?</a>
                        <p class="login-card-footer-text">Don't have an account? <a href="{{ route('register') }}" class="">Register here</a></p>
                        <nav class="">
                            <a href="#!">Terms of use.</a>
                            <a href="#!">Privacy policy</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
@endsection
