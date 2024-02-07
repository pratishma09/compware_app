<!-- Include Magnific Popup CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">

@extends('template')
@section('title', 'Client')
@section('content')
    <h1 class="text-5xl font-normal text-center py-8 text-blue">{{$eventgallery->gallery_name}}</h1>
    
    <div class="flex flex-wrap justify-center items-center mx-5">
        @foreach ($images as $image)
            <a href="{{ asset('assets/'. $image->image) }}" class="image-link">
                <img src="{{ asset('assets/'. $image->image) }}" alt="{{ $image->image }}" class="h-44 mb-5 mx-2.5">
            </a>
             {{-- <form action="{{ route('eventgallery.deleteImage', ['eventId' => $eventgallery->id, 'imageId' => $image->id]) }}" method="post" class="absolute top-0 right-0 mt-2 mr-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-700 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </form> --}}
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