@extends('admin.layout')

@section('admin')
<div class="container mx-auto">
    <button class="text-white bg-blue rounded my-2 py-1 px-2"><a href="{{ route('admin.courses.create') }}">Add Course</a></button>
    <div class="overflow-x-auto" style="max-height: 600px; overflow-y: auto;">
        <table class="w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Schedule</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                    {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Logo</th> --}}
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fee</th>
                    {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Start Date</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">End Date</th> --}}
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Team</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @php
                    $serialNumber = 1;
                @endphp
                @foreach($courses as $course)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $serialNumber++ }}</td>
                    <td class="px-6 py-4 whitespace-wrap max-w-xs">@if(strlen($course->course_name) > 100)
                        {{ substr($course->course_name, 0, 100) }} ...
                    @else
                        {{ $course->course_name }}
                    @endif</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $course->course_schedule }}</td>
                    <td class="px-6 py-4 whitespace-wrap max-w-xs">
                        @if(strlen($course->course_desc) > 100)
                            {{ substr($course->course_desc, 0, 100) }} ...
                        @else
                            {{ $course->course_desc }}
                        @endif
                    </td>
                    {{-- <td>
                        @if(strpos($course->course_logo, 'http') === 0)
                            <img src="{{ $course->course_logo }}" class="w-20" alt="{{ $course->course_name }}">
                        @else
                            <img src="{{ asset('assets/' . $course->course_logo) }}" class="w-20" alt="{{ $course->course_name }}">
                        @endif
                    </td> --}}
                    <td class="px-6 py-4 whitespace-nowrap">{{ $course->course_fee }}</td>
                    {{-- <td class="px-6 py-4 whitespace-wrap">{{ $course->course_startdate }}</td>
                    <td class="px-6 py-4 whitespace-wrap">{{ $course->course_enddate }}</td> --}}
                    
                    <td class="px-6 py-4 whitespace-wrap">{{ $course->team->team_name }}</td>
                    <td class="px-6 py-4 whitespace-wrap">{{ $course->coursecategory->coursecategory_name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex justify-around w-28 pr-20">
                            <button class="bg-blue rounded py-1">
                                <a href="{{ route('admin.courses.edit', $course->id) }}" class="text-white px-5">Edit</a>
                            </button>
                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-white bg-red-900 ml-3 py-1 px-2 rounded">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
    {{ $courses->links() }}
</div>
@endsection
