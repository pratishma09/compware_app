@extends('template')

@section('content')
    <div class="">
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
                    <span class="" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <div class="">
                        <div class="">
                            <img src="/img/logo.png" alt="logo" class="logo">
                        </div>
                        <p class="">Reset password</p>
                        @if(session('status'))
                            <div role="alert">
                                {{session('status')}}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.request') }}">
                            @csrf
                            <div class="">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="" placeholder="Email address">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <input name="reset" id="login" class="" type="submit" value="Reset">
                        </form>
                        <p class="">Don't have an account? <a href="{{ route('register') }}" class="">Register here</a></p>
                        <nav class="">
                            <a href="#!">Terms of use.</a>
                            <a href="#!">Privacy policy</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
@endsection
