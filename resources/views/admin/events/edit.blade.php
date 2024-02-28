@extends('admin.layout')

@section('admin')
<div class="ml-28 mt-5">
    <p class="2xl">Edit an Event</p>
    
    <form method="post" action="{{ route('event.update', $event->id) }}" enctype="multipart/form-data" class="mx-auto bg-white py-6 rounded-lg w-full">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label for="event_image" class="block text-sm font-medium text-gray-700">Photo</label>
            <input type="file" id="event_image" name="event_image" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-2 sm:text-sm outline-none" value="{{ $event->event_image ?? '' }}">
        </div>
        
        <div class="mb-4">
            <label for="event_name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="event_name" name="event_name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-2 sm:text-sm outline-none" value="{{ $event->event_name ?? '' }}">
        </div>
        
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Episode</label>
            <select name="event_ep" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-2 sm:text-sm outline-none">
                <option value="I" {{ $event->event_ep == 'I' ? 'selected' : '' }}>I</option>
                <option value="II" {{ $event->event_ep == 'II' ? 'selected' : '' }}>II</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Role</label>
            <select name="event_role" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-2 sm:text-sm outline-none">
                <option value="Panelist" {{ $event->event_role == 'Panelist' ? 'selected' : '' }}>Panelist</option>
                <option value="Host & Moderator" {{ $event->event_role == 'Host & Moderator' ? 'selected' : '' }}>Host & Moderator</option>
            </select>
        </div>
        
        
        <div class="mb-4">
            <label for="event_desc" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="event_desc" name="event_desc" rows="5" cols="100" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-2 sm:text-sm outline-none">{{ $event->event_desc ?? '' }}</textarea>
        </div>
        
        <button type="submit" class="mx-auto py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-blue hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
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
