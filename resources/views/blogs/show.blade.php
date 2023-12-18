@extends('template')
@section('title', 'Blogs Today')

@section('content')
    <div class="flex flex-col lg:flex-row container mx-auto py-8">
        <div class="lg:w-4/5">
        <h1 class="text-5xl mb-4 text-blue pl-6">{{ $blog->blogs_name }}</h1>

        <div class="bg-white p-6 rounded shadow-md">
            <div class="w-auto h-screen">
                <img src="{{ asset('assets/' . $blog->blogs_image) }}" alt="{{ $blog->blogs_name }}" class="mb-4 rounded-lg object-cover object-center w-full h-full inset-0">
            </div>
            <div class="flex flex-row justify-between">
            <p class="text-gray-700 mb-2 font-light text-md">-{{ $blog->blogs_author }}</p>
            
            <p class="text-gray-700 mb-2 font-light text-md">Date: {{ substr($blog->created_at, 0, 10) }}</p>
            </div>
            <p class="text-gray-700 mb-4">{!! nl2br(e($blog->blogs_desc)) !!}</p>

            <div class="flex justify-end">
                <a href="{{ route('blog.index') }}" class="text-blue-500 hover:underline text-blue">Back to Blogs</a>
            </div>
            </div>
        </div>
        <div class="container lg:w-2/6 sm:w-1/2 pr-10">
            <h1 class="text-blue pl-6 pt-5 text-2xl">Recent Blogs</h1>
            @foreach($blogs as $recentBlog)
          

                    <div class="pl-6">
                        <a href="{{ route('blog.show', $recentBlog->blogs_slug) }}">
                            <div class="h-64 w-auto">
                        <img src="{{ asset('assets/' . $recentBlog->blogs_image) }}" alt="{{ $recentBlog->blogs_name }}" class="mt-2 rounded-lg h-full w-full object-cover object-center inset-0">
                    </div>
                        <p class="text-blue pt-2 pb-4">{{$recentBlog->blogs_name}}</p>
                        </a>
                    </div>
                @endforeach
        </div>
    </div>
@endsection