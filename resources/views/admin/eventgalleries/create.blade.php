@extends('admin.layout')

@section('admin')
<div class="ml-28 mt-5">
    <h1>Create a gallery category</h1>
    
    <form action="{{ route('eventgalleries.store') }}" method="POST" enctype="multipart/form-data" class="mt-5">
        @csrf
        <div class="mb-4">
            <label for="gallery_name" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm outline-none px-2 h-10" name="gallery_name" placeholder="Enter gallery title">
            @error('gallery_name')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="files" class="block text-sm font-medium text-gray-700">Upload Gallery Images</label>
            <input type="file" name="images[]" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm outline-none px-2" accept="image/*" multiple>
        </div>
        <div class="mt-4">
            <button type="submit" class="bg-blue text-white px-5 py-2 rounded-md shadow-md">Submit</button>
        </div>
    </form>
</div>
@endsection
