@extends('admin.layout')

@section('admin')
<div class="ml-10 mt-5">
    <p class="2xl">Create a Team Post</p>
    
    <form method="post" action="{{ route('team.store') }}" enctype="multipart/form-data" class="mx-auto bg-white py-6 rounded-lg w-full">
        @csrf
        
        <div class="mb-4">
            <label for="team_image" class="block text-sm font-medium text-gray-700">Photo</label>
            <input type="file" id="team_image" name="team_image" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 px-2 focus:border-indigo-500 sm:text-sm outline-none">
        </div>

        <div class="mb-4">
            <label for="team_signature" class="block text-sm font-medium text-gray-700">Signature</label>
            <input type="file" id="team_signature" name="team_signature" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 px-2 focus:border-indigo-500 sm:text-sm outline-none">
        </div>

        <div class="mb-4">
            <label for="team_name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="team_name" name="team_name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 px-2 focus:border-indigo-500 sm:text-sm outline-none h-10">
        </div>

        <div class="mb-4">
            <label for="team_email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="text" id="team_email" name="team_email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 px-2 focus:border-indigo-500 sm:text-sm outline-none h-10">
        </div>

        <div class="mb-4">
            <label for="team_post" class="block text-sm font-medium text-gray-700">Post</label>
            <select id="team_post" name="team_post" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm outline-none h-10">
                <option value="Team">Team</option>
                <option value="Trainer">Trainer</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="team_role" class="block text-sm font-medium text-gray-700">Role</label>
            <input type="text" id="team_role" name="team_role" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 px-2 focus:border-indigo-500 sm:text-sm outline-none h-10">
        </div>

        <div class="mb-4">
            <label for="team_description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="team_description" name="team_description" rows="5" cols="100" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 p-2 sm:text-sm outline-none"></textarea>
        </div>
        
        <button type="submit" class="mx-auto py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-blue hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Submit</button>
    </form>
</div>
@endsection
