@extends('admin.layout')
@section('admin')
<div class="container mx-auto ml-28 w-11/12">
    <button class="text-white bg-blue rounded my-2 py-1 px-2"><a href="{{ route('admin.testimonials.create') }}">Add Testimonial</a></button>
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
            @foreach($testimonials as $testimonial)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $testimonial->id }}</td>
                <td>
                    @if(strpos($testimonial->testimonial_image, 'http') === 0)
                        <img src="{{ $testimonial->testimonial_image }}" class="w-20" alt="{{ $testimonial->testimonial_image }}">
                    @else
                        <img src="{{ asset('assets/' . $testimonial->testimonial_image) }}" class="w-20" alt="{{ $testimonial->testimonial_image }}">
                    @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $testimonial->testimonial_name }}</td>
                <td class="px-6 py-4 whitespace-wrap max-w-xs">{{ $testimonial->testimonial_desc }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <div class="flex justify-around w-28">
                        <button class=" bg-blue rounded py-1">
                            <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" class="text-white px-5">Edit</a>
                        </button>
                        <form action="{{ route('testimonial.destroy', $testimonial->id) }}" method="POST">
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
