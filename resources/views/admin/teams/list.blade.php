@extends('admin.layout')

@section('admin')
<div class="container mx-auto">
    <button class="text-white bg-blue rounded my-2 py-1 px-2"><a href="{{ route('admin.teams.create') }}">Add Team</a></button>
    <div class="overflow-x-auto" style="max-height: 500px; overflow-y: auto;">
        <table class="w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Post</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($teams as $team)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $team->id }}</td>
                    <td>
                        @if(strpos($team->team_image, 'http') === 0)
                            <img src="{{ $team->team_image }}" class="w-20" alt="{{ $team->team_name }}">
                        @else
                            <img src="{{ asset('assets/' . $team->team_image) }}" class="w-20" alt="{{ $team->team_name }}">
                        @endif
                    </td>                               
                    <td class="px-6 py-4 whitespace-nowrap">{{ $team->team_name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $team->team_post }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $team->team_role }}</td>
                    <td class="px-6 py-4 whitespace-wrap max-w-xs">
                        @if(strlen($team->team_description) > 200)
                            {{ substr($team->team_description, 0, 200) }} ...
                        @else
                            {{ $team->team_description}}
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex justify-around">
                            <button class="bg-blue rounded py-1">
                                <a href="{{ route('admin.teams.edit', $team->id) }}" class="text-white px-5">Edit</a>
                            </button>
                            <form action="{{ route('team.destroy', $team->id) }}" method="POST">
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
