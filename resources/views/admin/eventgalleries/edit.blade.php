@extends('admin.layout')

@section('admin')
<div class="mt-5">
    <h2 class="text-2xl">Edit Eventgallery</h2>
    
    <form action="{{ route('admin.eventgalleries.update', ['id' => $eventgallery->id]) }}" method="post" enctype="multipart/form-data" class="mx-auto bg-white py-6 rounded-lg w-full">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="gallery_name" class="block text-sm font-medium text-gray-700">Gallery Name:</label>
            <input type="text" name="gallery_name" id="gallery_name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 px-2 focus:border-indigo-500 sm:text-sm outline-none h-10" value="{{ $eventgallery->gallery_name }}">
        </div>

        <div class="mb-4">
            <label for="images" class="block text-sm font-medium text-gray-700">Images:</label>
            <input type="file" name="images[]" id="images" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" multiple>
        </div>

        <button type="submit" class="mx-auto py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-blue hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update Eventgallery</button>
    </form>

</div>
@endsection
