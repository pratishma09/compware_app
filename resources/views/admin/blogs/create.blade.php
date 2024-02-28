@extends('admin.layout')

@section('admin')
    <div class="ml-28 mt-5">
        <h1 class="2xl">Create a Blog Post</h1>
        
        <form method="post" action="{{ route('blog.store') }}" enctype="multipart/form-data" class="mx-auto bg-white py-6 rounded-lg w-full">
            @csrf

            <div class="mb-4">
                <label for="blogs_image" class="block text-sm font-medium text-gray-700">Photo</label>
                <input type="file" id="blogs_image" name="blogs_image" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 px-2 focus:border-indigo-500 sm:text-sm outline-none">
            </div>

            <div class="mb-4">
                <label for="blogs_name" class="block text-sm font-medium text-gray-700">Blog Name</label>
                <input type="text" id="blogs_name" name="blogs_name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 px-2 focus:border-indigo-500 sm:text-sm outline-none h-10">
            </div>

            <div class="mb-4">
                <label for="blogs_date" class="block text-sm font-medium text-gray-700">Blog Date</label>
                <input type="date" id="blogs_date" name="blogs_date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 px-2 focus:border-indigo-500 sm:text-sm outline-none h-10">
            </div>

            <div class="mb-4">
                <label for="blogs_author" class="block text-sm font-medium text-gray-700">Blog Author</label>
                <input type="text" id="blogs_author" name="blogs_author" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 px-2 focus:border-indigo-500 sm:text-sm outline-none h-10">
            </div>

            <div class="mb-4">
                <label for="blogs_desc" class="block text-sm font-medium text-gray-700">Blog Description</label>
                <textarea id="blogs_desc" name="blogs_desc" rows="5" cols="100" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 px-2 sm:text-sm outline-none"></textarea>
            </div>

            <button type="submit" class="mx-auto py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-blue hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Submit</button>
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
