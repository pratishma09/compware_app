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
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <div class="">
                        <div class="">
                            <img src="/img/logo.png" alt="logo" class="logo">
                        </div>
                        <p class="">Reset password</p>
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{$request->route('token')}}">
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="" value="{{$request->email}}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="password" class="">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="">
                                <label for="password" class="sr-only">Password</label>
                                <input id="password-confirm" type="password" class="" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                            </div>
                            <input name="reset" id="login" class="" type="submit" value="Update">
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
