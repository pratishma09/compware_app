@extends('admin.layout')

@section('admin')
<div class="ml-10 mt-5">
    <h1 class="text-2xl">Edit the client post</h1>
    
    <form method="post" action="{{ route('client.update', ['id' => $clients->id]) }}" enctype="multipart/form-data" class="mx-auto bg-white py-6 rounded-lg shadow-md w-full">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="client_image" class="block text-sm font-medium text-gray-700">Photo</label>
            <input type="file" name="client_image" id="client_image" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 px-2 focus:border-indigo-500 sm:text-sm outline-none" value="{{ $clients->client_image ?? '' }}">
        </div>
        <div class="mb-4">
            <label for="client_name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="client_name" id="client_name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 px-2 focus:border-indigo-500 sm:text-sm outline-none" value="{{ $clients->client_name ?? '' }}">
        </div>
        <button type="submit" class="mx-auto py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-blue hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Submit</button>
    </form>
</div>
@endsection
