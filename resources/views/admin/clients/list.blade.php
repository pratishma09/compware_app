@extends('admin.layout')

@section('admin')
<div class="container mx-auto ml-28 w-11/12">
    <button class="text-white bg-blue rounded my-2 py-1 px-2"><a href="{{ route('admin.clients.create') }}">Add Client</a></button>
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
            @foreach($clients as $client)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $client->id }}</td>
                <td>
                    @if(strpos($client->client_image, 'http') === 0)
                        <img src="{{ $client->client_image }}" class="w-20" alt="{{ $client->client_name }}">
                    @else
                        <img src="{{ asset('assets/' . $client->client_image) }}" class="w-20" alt="{{ $client->client_name }}">
                    @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $client->client_name }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <div class="flex justify-around w-28">
                        <button class="bg-blue rounded py-1">
                            <a href="{{ route('admin.clients.edit', $client->id) }}" class="text-white px-5">Edit</a>
                        </button>
                        <form action="{{ route('clients.destroy', $client->id) }}" method="POST">
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
@endsection
