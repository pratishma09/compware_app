<!-- Include Magnific Popup CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">

@extends('template')
@section('title', 'Client')
@section('content')
    <h1 class="text-5xl font-normal text-center py-8 text-blue pt-20">{{$eventgallery->gallery_name}}</h1>
    
    <div class="flex flex-wrap justify-center items-center mx-5">
        @foreach ($images as $image)
        @if (Str::startsWith($image->image, 'http'))
        <a href="{{ $image->image }}" class="image-link">
            <img src="{{ $image->image }}" alt="{{ $image->image }}" class="h-44 mb-5 mx-2.5">
        </a>
    @else
        <a href="{{ asset('assets/'. $image->image) }}" class="image-link">
            <img src="{{ asset('assets/'. $image->image) }}" alt="{{ $image->image }}" class="h-44 mb-5 mx-2.5">
        </a>
    @endif
        @endforeach
    </div>

    <!-- Include Magnific Popup JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script>
        // Initialize Magnific Popup
        $('.image-link').magnificPopup({
            type: 'image',
            closeOnBgClick: true,
            gallery: {
                enabled: true
            }
        });
    </script>
@endsection