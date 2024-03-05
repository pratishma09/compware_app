@extends('admin.layout')
@section('admin')
<div class="mt-5">
    <p class="text-2xl">Update Course</p>
    
    <form method="post" action="{{ route('admin.courses.update', $course->id) }}" enctype="multipart/form-data" class="mx-auto bg-white py-6 rounded-lg shadow-md w-full">
        @csrf
        @method('put')
        
        <div class="mb-4">
            <label for="course_name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="course_name" name="course_name" value="{{ $course->course_name ?? '' }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 px-2 focus:border-indigo-500 sm:text-sm outline-none h-10">
        </div>
        
        <div class="mb-4">
            <label for="course_desc" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="course_desc" name="course_desc" rows="5" cols="100" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-2 sm:text-sm outline-none">{{ $course->course_desc ?? '' }}</textarea>
        </div>
        
        <div class="mb-4">
            <label for="course_logo" class="block text-sm font-medium text-gray-700">Logo: {{$course->course_logo}}</label>
            <input type="file" id="course_logo" name="course_logo" class="mt-1 block w-full border border-gray-300 px-2 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        
        <div class="mb-4">
            <label for="course_pdf" class="block text-sm font-medium text-gray-700">PDF: {{$course->course_pdf}}</label>
            <input type="file" id="course_pdf" name="course_pdf" class="mt-1 block w-full border border-gray-300 px-2 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        
        <div class="mb-4">
            <label for="course_schedule" class="block text-sm font-medium text-gray-700">Schedule</label>
            <select name="course_schedule" id="course_schedule" required class="mt-1 block w-full px-2 border outline-none border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="Morning" {{ $course->course_schedule == 'Morning' ? 'selected' : '' }}>Morning</option>
                <option value="Evening" {{ $course->course_schedule == 'Evening' ? 'selected' : '' }}>Evening</option>
                <option value="Afternoon" {{ $course->course_schedule == 'Afternoon' ? 'selected' : '' }}>Afternoon</option>
            </select>
        </div>
        
        <div class="mb-4">
            <label for="course_fee" class="block text-sm font-medium text-gray-700">Fee</label>
            <input type="number" id="course_fee" name="course_fee" class="mt-1 block w-full border border-gray-300 px-2 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $course->course_fee }}">
        </div>
        
        <div class="mb-4">
            <label for="coursecategory_id" class="block text-sm font-medium text-gray-700">Course Category</label>
            <select name="coursecategory_id" id="coursecategory_id" required class="mt-1 block w-full px-2 border outline-none border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @foreach ($coursecategories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $course->coursecategory_id ? 'selected' : '' }}>{{ $category->coursecategory_name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-4">
            <label for="team_id" class="block text-sm font-medium text-gray-700">Team</label>
            <select name="team_id" id="team_id" required class="mt-1 block w-full px-2 border outline-none border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @foreach ($teams as $team)
                    <option value="{{ $team->id }}" {{ $team->id == $course->team_id ? 'selected' : '' }}>{{ $team->team_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="course_startdate" class="block text-sm font-medium text-gray-700">Start Date</label>
            <input type="date" id="course_startdate" name="course_startdate" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm outline-none" value="{{ $course->course_startdate }}" required>
        </div>
        
        <div class="mb-4">
            <label for="course_enddate" class="block text-sm font-medium text-gray-700">End Date</label>
            <input type="date" id="course_enddate" name="course_enddate" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm outline-none" value="{{ $course->course_enddate }}" required>
        </div>
        
        <button type="submit" class="mx-auto py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-blue hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
    </form>
</div>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#course_desc'))
        .catch((error) => {
            console.error(error);
        });
</script>
@endsection
