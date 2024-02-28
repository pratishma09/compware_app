@extends('admin.layout')

@section('admin')
<div class="ml-28 mt-5">
    <h1 class="2xl">Create a Course Category</h1>
    
    <form method="post" action="{{route('coursecategory.store')}}" enctype="multipart/form-data" class="mx-auto bg-white py-6 rounded-lg w-full">
        @csrf
        
        <div class="mb-4">
            <label for="coursecategory_name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="coursecategory_name" name="coursecategory_name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 px-2 focus:border-indigo-500 sm:text-sm outline-none h-10">
        </div>
        
        <button type="submit" class="mx-auto py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-blue hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Submit</button>
    </form>
</div>
@endsection
