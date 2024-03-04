@extends('admin.layout')

@section('admin')
<div class="container mx-auto">
    <button class="text-white bg-blue rounded my-2 py-1 px-2"><a href="{{ route('admin.studentcertificates.create') }}">Add Student Certificate</a></button>
    <div class="overflow-x-auto" style="max-height: 500px; overflow-y: auto;">
        <table class="w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Student Name</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Course</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Start Date</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">End Date</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Duration</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Trainer Title</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Verification Id</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($studentcertificates as $certificate)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $certificate->id }}</td>
                    <td>
                        @if(strpos($certificate->image, 'http') === 0)
                            <img src="{{ $certificate->image }}" class="w-20" alt="{{ $certificate->name }}">
                        @else
                            <img src="{{ asset('assets/' . $certificate->image) }}" class="w-20" alt="{{ $certificate->name }}">
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $certificate->name }}</td>
                    <td class="px-6 py-4">{{ $certificate->course->course_name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $certificate->startdate }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $certificate->enddate }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $certificate->duration }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $certificate->trainer_title }}</td>
                    <td class="px-6 py-4">{{ $certificate->verificationId }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $certificate->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex justify-around pr-20">
                            <button class="bg-blue rounded py-1">
                                <a href="{{ route('admin.studentcertificates.edit', $certificate->id) }}" class="text-white px-5">Edit</a>
                            </button>
                            <form action="{{ route('studentcertificates.destroy', $certificate->id) }}" method="POST">
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
