@extends('admin.layout')

@section('admin')
<div class="container mx-auto">
    <div class="overflow-x-auto" style="max-height: 500px; overflow-y: auto;">
        <table class="w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Schedule</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Course</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($enrolls as $enroll)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $enroll->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $enroll->enroll_name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $enroll->enroll_phone }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $enroll->enroll_email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $enroll->enroll_schedule }}</td>
                    <td class="px-6 py-4 whitespace-wrap">{{ $enroll->course->course_name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex justify-around">
                            {{-- <button class="bg-blue rounded py-1">
                                <a href="{{ route('admin.enroll.edit', $enroll->id) }}" class="text-white px-5">Edit</a>
                            </button> --}}
                            <form action="{{ route('enrolls.destroy', $enroll->id) }}" method="POST">
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
