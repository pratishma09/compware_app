@extends('template')
@section('title', 'Courses')

@section('content')
    <div class=" bg-gray-100 border">
        <div class=" border-gray-900">
            <h1 class="text-5xl font-normal text-center py-8 text-blue pt-20">Our Courses</h1>
            <div class="flex justify-center mb-4">
                <form action="{{ route('courses.search') }}" method="GET" class="flex flex-row items-center justify-around w-full">
                    <div class="flex flex-row items-center justify-around border border-blue rounded-3xl w-1/2">
                        <input type="text" name="search" placeholder="Search courses"
                            id="search"
                            class="px-4 py-1 lg:py-3 w-5/6 rounded-3xl bg-gray-100 outline-none appearance-none focus:placeholder-transparent">
                        <button type="submit"
                            class="bg-blue text-white px-4 py-2 lg:py-3.5 rounded-l-none rounded-3xl w-1/3 text-center text-xs lg:text-sm lg:w-1/6 uppercase">
                            <i class="fa-solid fa-search pt-1 pr-2"></i>Search
                        </button>
                    </div>
                </form>
            </div>
            <div class="flex items-center justify-center">
                <select id="categoryFilter" placeholder="Select category" data-placeholder="Select category">
                    @foreach ($coursecategories as $coursecategory)
                        <option value="{{ $coursecategory->id }}">{{ $coursecategory->coursecategory_name }}</option>
                    @endforeach
                </select>
            </div>
            <div id="courseList">
                @include('courses.course_list')
            </div>
        </div>
    </div>
@endsection
