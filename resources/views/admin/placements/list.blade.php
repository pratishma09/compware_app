@extends('admin.layout')

@section('admin')
<div class="container mx-auto">
    <button class="text-white bg-blue rounded my-2 py-1 px-2"><a href="{{ route('admin.placements.create') }}">Add Placement</a></button>
    <div class="overflow-x-auto" style="max-height: 500px; overflow-y: auto;">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($placements as $placement)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $placement->id }}</td>
                    <td>
                        @if(strpos($placement->placement_image, 'http') === 0)
                            <img src="{{ $placement->placement_image }}" class="w-20" alt="{{ $placement->placement_image }}">
                        @else
                            <img src="{{ asset('assets/' . $placement->placement_image) }}" class="w-20" alt="{{ $placement->placement_image }}">
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $placement->placement_name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex justify-around w-28 pr-20">
                            <button class=" bg-blue rounded py-1">
                                <a href="{{ route('admin.placements.edit', $placement->id) }}" class="text-white px-5">Edit</a>
                            </button>
                            <form action="{{ route('placements.destroy', $placement->id) }}" method="POST">
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
</div>
@endsection
