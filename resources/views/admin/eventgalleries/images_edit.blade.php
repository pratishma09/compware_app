@extends('admin.layout')

@section('admin')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Images for: {{ $gallery->gallery_name }}</h1>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($gallery->images as $image)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if(strpos($image->image, 'http') === 0)
                            <img src="{{ $image->image }}" class="w-20" alt="{{ $image->image }}">
                        @else
                            <img src="{{ asset('assets/' . $image->image) }}" class="w-20" alt="{{ $image->image }}">
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <form action="{{ route('eventgalleries.deleteImage', ['eventId' => $gallery->id, 'imageId' => $image->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-white bg-red-900 ml-3 py-1 px-2 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
