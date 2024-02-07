@extends('template')
@section('title', 'Blogs Today')

@section('content')
    <div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $errors }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <h1 class="text-5xl font-normal text-center py-8 text-blue pt-28">Contact Us</h1>
    <div class="flex flex-col lg:flex-row lg:px-48 w-screen">
        <div class="bg-blue rounded-2xl lg:w-1/2 pl-14 pt-8 w-screen text-white">
            <p class="text-medium text-3xl">Contact Info</p>
            <p class="text-medium pt-14">Contact or visit us</p>
            <div class="flex pt-14">
                <i class="fa fa-solid fa-location-dot pt-2"></i>
                <p class="pl-5">Sifal, Kathmandu, Nepal</p>
            </div>
            <p class="pl-8"> Near Aradhana Petrol Pump</p>
            <div class="flex pt-8">
                <i class="fa-solid fa-phone pt-1"></i>
                <p class="pl-5">01-5913021, 01-4567153</p>
            </div>
            <div class="flex pt-14">
                <i class="fa-solid fa-envelope pt-1"></i>
                <p class="pl-5">training@deerwalkcompware.com</p>
            </div>
            <p class="pt-14">Find Us At</p>
            <div class="flex pb-14">
                <i class="fa-solid fa-facebook pt-1"></i>
            </div>
        </div>
        <div class="pl-14 lg:w-1/2 shadow-2xl rounded-2xl">
            <form method="post" action="{{ route('contact.store') }}" enctype="multipart/form-data">
                @csrf
                <p class="text-medium text-3xl text-blue pt-8">Get In Touch</p>
                <div class="flex mt-2">
                    <label class=""><i class="fa-solid fa-user text-blue text-xl py-2 mr-2"></i></label>
                    <input type="text" class="border border-blue ml-3 w-full rounded py-2 pl-2 mr-8" name="contact_name"
                        placeholder="Full Name*">
                </div>
                <div class="flex mt-8">
                    <label class=""><i class="fa-solid fa-mobile text-blue text-xl py-2 mr-2.5"></i></label>
                    <input type="text" class="border border-blue ml-3 w-full rounded py-2 pl-2 mr-8"name="contact_number"
                        placeholder="Mobile Number*">
                </div>

                <div class="flex mt-8">
                    <label class="form-label"><i class="fa-solid fa-envelope text-blue text-xl py-2 mr-2"></i></label>
                    <input type="text" name="contact_email" class="border border-blue w-full rounded py-2 ml-3 pl-2 mr-8"
                        placeholder="Email*">
                </div>
                <div class="flex mt-8">
                    <label class="form-label"><i class="fa-solid fa-message text-blue text-xl py-2 mr-2"></i></label>
                    <textarea name="contact_message" class="border border-blue w-full rounded py-2 ml-3 pl-2 mr-8" placeholder="Message*"
                        rows="3"></textarea>
                </div>
                <div class="flex flex-col items-end justify-end mr-8">
                <div class="py-5">
                    {!! app('captcha')->display() !!}
                    @if ($errors->has('g-recaptcha-response'))
                        <span class="help-block">
                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit" class=" bg-blue text-white uppercase py-2 px-4 rounded-md shadow-md mb-8">Send</button>
            </div>
            </form>
        </div>
    </div>
@endsection
