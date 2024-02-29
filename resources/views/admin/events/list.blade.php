@extends('admin.layout')

@section('admin')
<div class="container mx-auto">
    <button class="text-white bg-blue rounded my-2 py-1 px-2"><a href="{{ route('admin.events.create') }}">Add Event</a></button>
    <table class="max-w-screen divide-y divide-gray-200 overflow-x-auto">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Episode</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($events as $event)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $event->id }}</td>
                <td>
                    @if(strpos($event->event_image, 'http') === 0)
                        <img src="{{ $event->event_image }}" class="w-20" alt="{{ $event->event_name }}">
                    @else
                        <img src="{{ asset('assets/' . $event->event_image) }}" class="w-20" alt="{{ $event->event_name }}">
                    @endif
                </td>

                <td class="px-6 py-4 whitespace-wrap">{{ $event->event_name }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $event->event_role }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $event->event_ep }}</td>
                <td class="px-6 py-4 whitespace-wrap max-w-xs">
                    @if(strlen($event->event_desc) > 100)
                    {{ substr($event->event_desc, 0, 100) }} ...
                @else
                    {{ $event->event_desc }}
                @endif
            </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <div class="flex justify-around pr-20">
                        <button class=" bg-blue rounded py-1">
                            <a href="{{ route('admin.events.edit', $event->id) }}" class="text-white px-5">Edit</a>
                        </button>
                        <form action="{{ route('event.destroy', $event->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-white bg-red-900 ml-3 py-1 px-2 rounded mr-20">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
