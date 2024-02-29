@extends('admin.layout')

@section('admin')
<div class="mt-5">
    <p class="2xl">Edit Testimonial</p>
    
    <form method="post" action="{{ route('admin.testimonials.edit', $testimonials->id) }}" enctype="multipart/form-data" class="mx-auto bg-white py-6 rounded-lg w-full">
        @csrf
        @method('PUT') {{-- Assuming you're using resourceful controller with RESTful conventions --}}
        
        <div class="mb-4">
            <label for="testimonial_name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="testimonial_name" name="testimonial_name" value="{{ $testimonials->testimonial_name }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 px-2 focus:border-indigo-500 sm:text-sm outline-none h-10">
        </div>
        
        <div class="mb-4">
            <label for="testimonial_desc" class="block text-sm font-medium text-gray-700">Testimonial Description</label>
            <textarea id="testimonial_desc" name="testimonial_desc" rows="5" cols="100" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-2 sm:text-sm outline-none">{{ $testimonials->testimonial_desc }}</textarea>
        </div>
        
        <div class="mb-4">
            <label for="course_id" class="block text-sm font-medium text-gray-700">Course</label>
            <select name="course_id" id="course_id" required class="mt-1 block w-full px-2 border outline-none border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}" {{ $testimonials->course_id == $course->id ? 'selected' : '' }}>{{ $course->course_name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-4">
            <label for="testimonial_image" class="block text-sm font-medium text-gray-700">Photo</label>
            
            <input type="file" id="testimonial_image" name="testimonial_image" class="mt-1 block w-full border border-gray-300 px-2 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            
        </div>
        
        <button type="submit" class="mx-auto py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-blue hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
    </form>
</div>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#testimonial_desc'))
        .catch((error) => {
            console.error(error);
        });
</script>
@endsection
