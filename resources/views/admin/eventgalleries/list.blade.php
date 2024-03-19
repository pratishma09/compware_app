@extends('admin.layout')

@section('admin')
<div class="container mx-auto">
    <button class="text-white bg-blue rounded my-2 py-1 px-2"><a href="{{ route('admin.eventgalleries.create') }}">Add Event Gallery</a></button>
    <div class="overflow-x-auto" style="max-height: 600px; overflow-y: auto;">
        <table class="w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Images</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @php
                    $serialNumber = 1;
                @endphp
                @foreach($eventgallery as $gallery)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $serialNumber++ }}</td>
                    <td>
                        <a href="{{ route('admin.eventgalleries.images_edit', $gallery->id) }}">
                            @if ($gallery->images->isNotEmpty())
                                @if(strpos($gallery->images[0]->image, 'http') === 0)
                                    <img src="{{ $gallery->images[0]->image }}" class="w-20" alt="{{ $gallery->images[0]->image }}">
                                @else
                                    <img src="{{ asset('assets/' . $gallery->images[0]->image) }}" class="w-20" alt="{{ $gallery->images[0]->image }}">
                                @endif
                            @endif
                        </a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('admin.eventgalleries.images_edit', $gallery->id) }}">{{ $gallery->gallery_name }}</a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex justify-around w-28 pr-20">
                            <button class="bg-blue rounded py-1">
                                <a href="{{ route('admin.eventgalleries.edit', $gallery->id) }}" class="text-white px-5">Add</a>
                            </button>
                            <form action="{{ route('eventgalleries.destroy', $gallery->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-white bg-red-900 ml-3 py-1 px-2 rounded">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
       
    </div>
    {{-- {{ $eventgalleries->links() }} --}}
</div>
@endsection
