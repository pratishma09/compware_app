@extends('admin.layout')

@section('admin')
<div class="ml-10 mt-5">
    <p class="2xl">Create an Event</p>
    
    <form method="post" action="{{ route('event.store') }}" enctype="multipart/form-data" class="mx-auto bg-white py-6 rounded-lg w-full">
        @csrf
        
        <div class="mb-4">
            <label for="event_name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="event_name" name="event_name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 px-2 focus:border-indigo-500 sm:text-sm outline-none h-10">
        </div>
        
        <div class="mb-4">
            <label for="event_desc" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="event_desc" name="event_desc" rows="5" cols="100" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-2 sm:text-sm outline-none"></textarea>
        </div>
        
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Episode</label>
            <select name="event_ep" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-2 sm:text-sm outline-none">
                <option value="I">I</option>
                <option value="II">II</option>
            </select>
        </div>
        
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Role</label>
            <select name="event_role" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-2 sm:text-sm outline-none">
                <option value="Panelist">Panelist</option>
                <option value="Host & Moderator">Host & Moderator</option>
            </select>
        </div>
        
        <div class="mb-4">
            <label for="event_image" class="block text-sm font-medium text-gray-700">Photo</label>
            <input type="file" id="event_image" name="event_image" class="mt-1 block w-full border border-gray-300 px-2 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        
        <button type="submit" class="mx-auto py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-blue hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Submit</button>
    </form>
</div>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#event_desc'))
        .catch((error) => {
            console.error(error);
        });
</script>
@endsection
