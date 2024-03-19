@extends('admin.layout')

@section('admin')
    <div class="container mx-auto">
        <div class="overflow-x-auto" style="max-height: 600px; overflow-y: auto;">
            <table class="w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium font-semibold text-gray-700 uppercase tracking-wider">
                            S.N</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium font-semibold text-gray-700 uppercase tracking-wider">
                            Name</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium font-semibold text-gray-700 uppercase tracking-wider">
                            Email</th>
                        {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium font-semibold text-gray-700 uppercase tracking-wider">Start Date</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium font-semibold text-gray-700 uppercase tracking-wider">End Date</th> --}}
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium font-semibold text-gray-700 uppercase tracking-wider">
                            Contact</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium font-semibold text-gray-700 uppercase tracking-wider">
                            Course</th>
                        {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium font-semibold text-gray-700 uppercase tracking-wider">Team</th> --}}
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium font-semibold text-gray-700 uppercase tracking-wider">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @php
                        $serialNumber = 1;
                    @endphp
                    @foreach ($requestcertificates as $certificate)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $serialNumber++ }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $certificate->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $certificate->email }}</td>
                            {{-- <td class="px-6 py-4 whitespace-nowrap">{{ $certificate->startdate }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $certificate->enddate }}</td> --}}
                            <td class="px-6 py-4 whitespace-nowrap">{{ $certificate->contact }}</td>
                            <td class="px-6 py-4">{{ $certificate->course->course_name }}</td>
                            {{-- <td class="px-6 py-4 whitespace-nowrap">{{ $certificate->team->team_name }}</td> --}}
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-around pr-20 w-28">
                                    <button class="text-white bg-blue px-3 h-1/2 py-1 rounded read-more"
                                        data-popupmore-id="{{ $certificate->id }}">More</button>
                                    <form action="{{ route('requestcertificates.destroy', $certificate->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-white bg-red-900 ml-3 py-1 px-2 rounded">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        {{ $requestcertificates->links() }}
    </div>
    @foreach ($requestcertificates as $certificate)
        <div id="popupmore-{{ $certificate->id }}"
            class="z-50 hidden fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-75 flex items-center justify-center overflow-hidden popup-overlay">
            <div class="backdrop-filter backdrop-blur-md bg-white p-8 rounded-md relative">

                <button type="button"
                    class="text-blue hover:underline cursor-pointer absolute top-2 right-2 close-popup-btn"
                    data-popup-id="{{ $certificate->id }}">
                    <x-icon name="ri-close-line" class="w-5 h-5 text-current" />
                </button>


                <div class="w-96 mx-auto bg-white flex flex-col space-y-5 gap-y-5">
                    <h2 class="text-lg font-semibold  mb-4 text-center uppercase border-b-2 w-full pb-2">Certificate Details
                    </h2>

                    <div class="flex justify-between">
                        <div>
                            <p class="font-semibold  text-gray-700">Name:</p>
                            <p>{{ $certificate->name }}</p>
                        </div>

                    </div>

                    <div class="py-5">
                        <p class="font-semibold  text-gray-700">Email:</p>
                        <p>{{ $certificate->email }}</p>
                    </div>

                    <div class="">
                        <p class="font-semibold  text-gray-700">Contact:</p>
                        <p>{{ $certificate->contact }}</p>
                    </div>

                    <div class="flex gap-5 space-x-10 w-full py-5">
                        <div>
                            <p class="font-semibold  text-gray-700">Start date:</p>
                            <p>{{ $certificate->startdate }}</p>
                        </div>
                        <div>
                            <p class="font-semibold  text-gray-700">End date:</p>
                            <p>{{ $certificate->enddate }}</p>
                        </div>
                    </div>
                    <div class="">
                        <p class="font-semibold  text-gray-700">Team:</p>
                        <p>{{ $certificate->team->team_name }}</p>
                    </div>
                    <div class="py-5">
                        <p class="font-semibold  text-gray-700">Course:</p>
                        <p class="items-end">{{ $certificate->course->course_name }}</p>
                    </div>




                </div>

            </div>
        </div>
    @endforeach
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const buttons = document.querySelectorAll('.read-more');
        const closeButtons = document.querySelectorAll('.close-popup-btn');
        let openPopupId = null;

        buttons.forEach(button => {
            button.addEventListener('click', () => {
                const popupId = button.getAttribute('data-popupmore-id');
                const popup = document.getElementById(`popupmore-${popupId}`);
                openPopupId = popupId;
                document.body.style.overflow = 'hidden';
                popup.classList.remove('hidden');
            });
        });

        closeButtons.forEach(closeButton => {
            closeButton.addEventListener('click', () => {
                closePopup();
            });
        });

        document.addEventListener('click', (event) => {
            if (event.target.classList.contains('popup-overlay') && openPopupId !== null) {
                closePopup();
            }
        });

        function closePopup() {
            if (openPopupId !== null) {
                const popup = document.getElementById(`popupmore-${openPopupId}`);
                openPopupId = null;
                document.body.style.overflow = '';
                popup.classList.add('hidden');
            }
        }
    });
</script>
