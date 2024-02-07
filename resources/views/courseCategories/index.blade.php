@extends('template')
@section('title', 'Course Category')

@section('content')
    <div class="bg-gray-100 border">
        @if (session()->has('success'))
            <div>
                {{ session('success') }}
            </div>
        @endif
        <h1 class="text-5xl font-normal text-center py-8 text-blue">Course Category</h1>

        <div class="flex flex-cols flex-wrap justify-center items-center space-x-10 md:px-10 lg:px-20 md:flex-rows pb-10">
            @foreach ($coursecategories as $coursecategory)
            <p>{{$coursecategory->coursecategory_name}}</p>
            @endforeach
        </div>
    </div>
@endsection