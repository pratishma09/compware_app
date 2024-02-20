@extends('admin.layout')

@section('admin')
<div class="ml-10 mt-5">
    <p class="text-2xl">Create a Student</p>
    
    <form method="post" action="{{ route('studentcertificate.store') }}" enctype="multipart/form-data" class="mx-auto bg-white py-6 rounded-lg w-full">
        @csrf
        
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Photo</label>
            <input type="file" id="image" name="image" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 px-2 focus:border-indigo-500 sm:text-sm outline-none">
        </div>
        
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Student Name</label>
            <input type="text" id="name" name="name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 px-2 focus:border-indigo-500 sm:text-sm outline-none h-10">
        </div>
        
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 px-2 focus:border-indigo-500 sm:text-sm outline-none h-10">
        </div>
        
        <div class="mb-4">
            <label for="startdate" class="block text-sm font-medium text-gray-700">Start Date</label>
            <input type="date" id="startdate" name="startdate" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 px-2 focus:border-indigo-500 sm:text-sm outline-none h-10">
        </div>
        
        <div class="mb-4">
            <label for="enddate" class="block text-sm font-medium text-gray-700">End Date</label>
            <input type="date" id="enddate" name="enddate" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 px-2 focus:border-indigo-500 sm:text-sm outline-none h-10">
        </div>
        
        <div class="mb-4">
            <label for="trainer_title" class="block text-sm font-medium text-gray-700">Trainer Title</label>
            <input type="text" id="trainer_title" name="trainer_title" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 px-2 focus:border-indigo-500 h-10 sm:text-sm outline-none">
        </div>
        
        <div class="mb-4">
            <label for="duration" class="block text-sm font-medium text-gray-700">Duration</label>
            <input type="text" id="duration" name="duration" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 px-2 focus:border-indigo-500 sm:text-sm outline-none h-10">
        </div>
        
        <div class="mb-4">
            <label for="course_id" class="block text-sm font-medium text-gray-700">Course</label>
            <select name="course_id" id="course_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 px-2 focus:border-indigo-500 sm:text-sm outline-none h-10">
                @foreach ($courses as $course)
                <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-4">
            <label for="team_id" class="block text-sm font-medium text-gray-700">Team</label>
            <select name="team_id" id="team_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 px-2 focus:border-indigo-500 sm:text-sm outline-none h-10">
                @foreach ($teams as $team)
                <option value="{{ $team->id }}">{{ $team->team_name }}</option>
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="mx-auto py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-blue hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Submit</button>
    </form>
</div>
@endsection

