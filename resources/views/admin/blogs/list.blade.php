@extends('admin.layout')

@section('admin')
<div class="container mx-auto">
    <button class="text-white bg-blue rounded my-2 py-1 px-2"><a href="{{ route('admin.blogs.create') }}">Add Blog</a></button>
    <div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($blogs as $blog)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $blog->id }}</td>
                <td>
                    @if(strpos($blog->blogs_image, 'http') === 0)
                        <img src="{{ $blog->blogs_image }}" class="w-20" alt="{{ $blog->blogs_image }}">
                    @else
                        <img src="{{ asset('assets/' . $blog->blogs_image) }}" class="w-20" alt="{{ $blog->blogs_image }}">
                    @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $blog->blogs_name }}</td>
                <td class="px-6 py-4 whitespace-wrap max-w-xs">
                    @if(strlen($blog->blogs_desc) > 100)
                        {{ substr($blog->blogs_desc, 0, 100) }} ...
                    @else
                        {{ $blog->blogs_desc }}
                    @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <div class="flex justify-around w-28 pr-20">
                        <button class=" bg-blue rounded py-1">
                            <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="text-white px-5">Edit</a>
                        </button>
                        <form action="{{ route('blog.destroy', $blog->id) }}" method="POST">
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
