@extends('admin.layout')

@section('admin')
<div class="ml-10 mt-5">
    <button class="bg-blue text-medium text-white px-5 py-2 rounded-md shadow-md">Create Course</button>
    
    <form method="post" action="{{ route('course.store') }}" enctype="multipart/form-data" class="mt-5">
        @csrf
        <div class="mb-4">
            <label for="course_logo" class="block text-sm font-medium text-gray-700">Course Logo</label>
            <input type="file" id="course_logo" name="course_logo" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm outline-none px-2">
        </div>
        
        <div class="mb-4">
            <label for="course_pdf" class="block text-sm font-medium text-gray-700">Course Details (PDF Format)</label>
            <input type="file" id="course_pdf" name="course_pdf" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm outline-none px-2">
        </div>
        
        <div class="mb-4">
            <label for="course_name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="course_name" name="course_name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm h-10 outline-none px-2" placeholder="Course Name">
        </div>
        
        <div class="mb-4">
            <label for="course_startdate" class="block text-sm font-medium text-gray-700">Start Date</label>
            <input type="date" id="course_startdate" name="course_startdate" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm h-10 outline-none px-2">
        </div>
        
        <div class="mb-4">
            <label for="course_enddate" class="block text-sm font-medium text-gray-700">End Date</label>
            <input type="date" id="course_enddate" name="course_enddate" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm h-10 outline-none px-2">
        </div>
        
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Schedule</label>
            <input type="radio" name="course_schedule" class="mr-2 h-5 w-5" value="Morning">Morning
            <input type="radio" name="course_schedule" class="mr-2 h-5 w-5" value="Evening">Evening
            <input type="radio" name="course_schedule" class="mr-2 h-5 w-5" value="Afternoon">Afternoon
        </div>
        
        <div class="mb-4">
            <label for="course_fee" class="block text-sm font-medium text-gray-700">Course Fee</label>
            <input type="number" id="course_fee" name="course_fee" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm h-10 outline-none px-2" placeholder="Fee">
        </div>
        
        <div class="mb-4">
            <label for="course_description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="course_description" name="course_desc" rows="5" cols="100" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-2 sm:text-sm outline-none h-32"></textarea>
        </div>
        
        <div class="mb-4">
            <label for="coursecategory_id" class="block text-sm font-medium text-gray-700">Course Category</label>
            <select name="coursecategory_id" id="coursecategory_id" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm h-10 outline-none px-2">
                @foreach ($coursecategories as $coursecategory)
                    <option value="{{ $coursecategory->id }}">{{ $coursecategory->coursecategory_name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-4">
            <label for="team_id" class="block text-sm font-medium text-gray-700">Team</label>
            <select name="team_id" id="team_id" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm h-10 outline-none px-2">
                @foreach ($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->team_name }}</option>
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="bg-blue text-white px-5 py-2 rounded-md shadow-md">Submit</button>
    </form>
</div>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#course_description' ) )
        .catch( (error) => {
            console.error( error );
        } );
</script>
@endsection
