@extends('admin.layout')

@section('admin')
<div class="container mx-auto">
    <div class="overflow-x-auto" style="max-height: 600px; overflow-y: auto;">
        <table class="w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Message</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @php
                    $serialNumber = 1;
                @endphp
                @foreach($contacts as $contact)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $serialNumber++ }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $contact->contact_name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $contact->contact_email }}</td>
                    <td class="px-6 py-4 whitespace-wrap max-w-xs">
                        @if(strlen($contact->contact_message) > 100)
                            {{ substr($contact->contact_message, 0, 100) }} ...
                        @else
                            {{ $contact->contact_message }}
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex justify-around w-28 pr-20">
                            {{-- <button class="bg-blue rounded py-1">
                                <a href="{{ route('admin.contacts.edit', $contact->id) }}" class="text-white px-5">Edit</a>
                            </button> --}}
                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
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
    {{ $contacts->links() }}
</div>
@endsection
