@extends('admin.layout')

@section('admin')
<div class="ml-28 mt-5">
    <h1 class="text-2xl">Edit a Student</h1>
    
    <form method="post" action="{{ route('studentcertificates.update', ['id' => $studentcertificates->id]) }}" enctype="multipart/form-data" class="mx-auto bg-white py-6 rounded-lg w-full">
        @csrf
        @method('put')
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Photo: {{$studentcertificates->image}}</label>
            <input type="file" id="image" name="image" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm outline-none">
        </div>
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Student Name</label>
            <input type="text" name="name" id="name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm outline-none h-10 px-2" value="{{ $studentcertificates->name ?? '' }}">
        </div>
        <div class="mb-4">
            <label for="startdate" class="block text-sm font-medium text-gray-700">Start Date</label>
            <input type="date" name="startdate" id="startdate" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm outline-none h-10 px-2" value="{{ $studentcertificates->startdate ?? '' }}">
        </div>
        <div class="mb-4">
            <label for="enddate" class="block text-sm font-medium text-gray-700">End Date</label>
            <input type="date" name="enddate" id="enddate" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm outline-none h-10 px-2" value="{{ $studentcertificates->enddate ?? '' }}">
        </div>
        <div class="mb-4">
            <label for="duration" class="block text-sm font-medium text-gray-700">Duration</label>
            <input type="number" name="duration" id="duration" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm outline-none h-10 px-2" value="{{ $studentcertificates->duration ?? '' }}">
        </div>
        <div class="mb-4">
            <label for="trainer_title" class="block text-sm font-medium text-gray-700">Trainer Title</label>
            <input type="text" name="trainer_title" id="trainer_title" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm outline-none h-10 px-2" value="{{ $studentcertificates->trainer_title ?? '' }}">
        </div>
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm outline-none h-10 px-2" value="{{ $studentcertificates->email ?? '' }}">
        </div>
        <div class="mb-4">
            <label for="verificationId" class="block text-sm font-medium text-gray-700">Verification Id</label>
            <input type="text" name="verificationId" id="verificationId" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm outline-none h-10 px-2" value="{{ $studentcertificates->verificationId ?? '' }}">
        </div>
        <div class="mb-4">
            <label for="course_id" class="block text-sm font-medium text-gray-700">Course</label>
            <select name="course_id" id="course_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm outline-none h-10 px-2">
                @foreach ($courses as $course)
                <option value="{{ $course->id }}" {{ $studentcertificates->course_id == $course->id ? 'selected' : '' }}>{{ $course->course_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="team_id" class="block text-sm font-medium text-gray-700">Team</label>
            <select name="team_id" id="team_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm outline-none h-10 px-2">
                @foreach ($teams as $team)
                <option value="{{ $team->id }}" {{ $studentcertificates->team_id == $team->id ? 'selected' : '' }}>{{ $team->team_name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="mx-auto py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-blue hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Submit</button>
    </form>
</div>
@endsection
