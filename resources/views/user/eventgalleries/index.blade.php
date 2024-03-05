@extends('template')

@section('content')
    <div class="bg-gray-100 border">
        <h1 class="text-5xl font-normal text-center py-8 text-blue pt-20">Gallery</h1>

        <div class="flex flex-cols flex-wrap justify-center items-center space-x-10 md:px-10 lg:px-20 md:flex-rows pb-10">
            @foreach ($eventgalleries as $eventgallery)
                
                    <a href="{{ route('eventgallery.images', $eventgallery->eventgallery_slug) }}" class="flex flex-col justify-center items-center w-60">
                        @if ($eventgallery->images->count() > 0)
                            @php
                                $imageUrl = asset('assets/'. $eventgallery->images[0]->image);
                                if (filter_var($eventgallery->images[0]->image, FILTER_VALIDATE_URL) && (strpos($eventgallery->images[0]->image, 'http://') === 0 || strpos($eventgallery->images[0]->image, 'https://') === 0)) {
                                    $imageUrl = $eventgallery->images[0]->image;
                                }
                            @endphp
                            <img src="{{ $imageUrl }}" alt="{{ $eventgallery->images[0]->image }}" class="h-44 w-60 mx-2.5">
                        @else
                            <p>No images available</p>
                        @endif
                        <p class="text-center text-lg font-semibold text-blue mb-10">{{ $eventgallery->gallery_name }}</p>
                    </a>
                
            @endforeach
        </div>
    </div>
@endsection
