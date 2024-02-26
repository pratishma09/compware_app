@extends('template')
@section('title', 'Client')

@section('content')
    <div class="bg-gray-100 border">
       
        <h1 class="text-5xl font-normal text-center py-8 text-blue pt-20">Gallery</h1>

        <div class="flex flex-cols flex-wrap justify-center items-center space-x-10 md:px-10 lg:px-20 md:flex-rows pb-10">
            @foreach ($eventgalleries as $eventgallery)
                <div>
                    <a href="{{ route('eventgallery.images', $eventgallery->eventgallery_slug) }}">
                        @if ($eventgallery->images->count() > 0)
                            <img src="{{ asset('assets/'. $eventgallery->images[0]->image) }}" alt="{{ $eventgallery->images[0]->image }}" class="h-44 mb-5 mx-2.5">
                        @else
                            {{-- You might want to provide a placeholder image or some default content --}}
                            <p>No images available</p>
                        @endif
                        <p class="text-center text-lg font-semibold text-blue ">{{$eventgallery->gallery_name}}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
