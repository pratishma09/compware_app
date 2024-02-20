@extends('admin.layout')

@section('admin')
    <div class="ml-10 mt-5">
        <h1>Edit the Blog Post</h1>
        
        <form method="post" action="{{ route('blog.update', ['id' => $blog->id]) }}" enctype="multipart/form-data" class="mx-auto bg-white py-6 rounded-lg w-full">
            @csrf
            @method('put')

            <div class="mb-4">
                <label for="blogs_image" class="block  font-medium text-gray-700">Photo</label>
                <input type="file" id="blogs_image" name="blogs_image" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 px-2 focus:border-indigo-500 sm:text-sm outline-none">
            </div>

            <div class="mb-4">
                <label for="blogs_name" class="block font-medium text-gray-700">Name</label>
                <input type="text" id="blogs_name" name="blogs_name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 px-2 focus:border-indigo-500 sm:text-sm outline-none h-10" value="{{ $blog->blogs_name ?? '' }}">
            </div>

            <div class="mb-4">
                <label for="blogs_slug" class="block font-medium text-gray-700">Blog Slug</label>
                <input type="text" id="blogs_slug" name="blogs_slug" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 px-2 focus:border-indigo-500 sm:text-sm outline-none h-10" value="{{ $blog->blogs_slug ?? '' }}">
            </div>

            <div class="mb-4">
                <label for="blogs_desc" class="block font-medium text-gray-700">Description</label>
                <textarea id="blogs_desc" name="blogs_desc" rows="5" cols="100" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 px-2 sm:text-sm outline-none">{{ $blog->blogs_desc ?? '' }}</textarea>
            </div>

            <div class="mb-4">
                <label for="blogs_author" class="block font-medium text-gray-700">Author</label>
                <input type="text" id="blogs_author" name="blogs_author" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 px-2 focus:border-indigo-500 sm:text-sm outline-none h-10" value="{{ $blog->blogs_author ?? '' }}">
            </div>

            <button type="submit" class="mx-auto py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-blue hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
        </form>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#blogs_desc'))
            .catch((error) => {
                console.error(error);
            });
    </script>
@endsection