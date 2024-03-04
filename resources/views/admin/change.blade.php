@extends('admin.layout')

@section('admin')
<div class="w-full mt-20">
        <div class="lg:w-1/3 w-72 m-10 lg:m-auto my-10 py-10 shadow-gray shadow-xl px-10">
            <p class="text-center text-2xl text-blue mb-5">Change password</p>

            @if(session('status') == 'password-updated')
                <div class="text-green text-center my-4">
                    Password has been successfully updated!
                </div>
            @endif

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <div class="my-2">
                    <input id="password" type="password" class="border outline-none w-full px-2 rounded py-3"
                        name="password" required autocomplete="new-password" placeholder="New Password">
                    @error('password')
                        <span class="text-red" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="my-2">
                    <input id="password-confirm" type="password" class="border outline-none w-full px-2 rounded py-3"
                        name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                </div>

                <div class="text-white text-center w-full uppercase py-2">
                    <button name="reset" id="login" class="bg-blue py-2 px-2 rounded" type="submit" value="Update">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
