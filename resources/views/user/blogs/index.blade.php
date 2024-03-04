@extends('template')
@section('title', 'Blogs Today')

@section('content')
<div class="container_section bg-gray-100 pt-16">
    <div class="h-auto">
        <h1 class="text-5xl font-normal text-center py-8 text-blue">Blog Posts</h1>
        <div class="blog-list">
            @foreach($blogs as $blog)
                <div class="container w-100 lg:w-4/5 mx-auto flex flex-col">
                    <div v-for="card in cards" class="flex flex-col md:flex-row overflow-hidden bg-white rounded-lg shadow-xl mt-4 w-100 mx-2">
                        <div class="h-64 w-auto md:w-1/2">
                            @php
                                $imageUrl = asset('assets/' . $blog->blogs_image);
                                if (filter_var($blog->blogs_image, FILTER_VALIDATE_URL) && (strpos($blog->blogs_image, 'http://') === 0 || strpos($blog->blogs_image, 'https://') === 0)) {
                                    $imageUrl = $blog->blogs_image;
                                }
                            @endphp
                            <img class="inset-0 h-full w-full object-cover object-center" src="{{ $imageUrl }}" />
                        </div>
                        <div class="w-full py-4 px-6 text-gray-800 flex flex-col justify-between font-roboto">
                            <h3 class="font-medium text-2xl leading-tight">{{ $blog->blogs_name }}</h3>
                            <p class="text-sm text-gray-700 mt-2">By: {{ $blog->blogs_author }} &bull; Date: {{ $blog->blogs_date }}</p>
                            <p class="mt-2 line-clamp-3">{{ strip_tags($blog->blogs_desc) }}</p>
                            <div class="flex justify-end">
                                <button type="button" class="text-white bg-blue hover:shadow-xl rounded px-3 py-1.5 shadow-sm text-sm uppercase">
                                    <a href="{{ route('blog.show', [$blog->blogs_slug]) }}">Read More</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div><!--/ card-->
            @endforeach
        </div>
    </div>
    
</div>

<div class="mt-5 mx-36 text-center">
    {{ $blogs->links() }}
</div>

@endsection
