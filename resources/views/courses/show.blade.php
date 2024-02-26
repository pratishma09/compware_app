@extends('template')
@section('title', 'courses Today')

@section('content')
    <div class="flex flex-col lg:flex-row container mx-auto py-8 pt-20">
        <div class="lg:w-4/5">
        <h1 class="text-5xl mb-4 text-blue text-center pl-6">{{ $course->course_name }}</h1>

        <div class="bg-white p-6 rounded shadow-md">
            <div v-for="card in cards" class="flex flex-col md:flex-row overflow-hidden rounded-lg shadow-md border border-gray-200 mt-4 w-100 mx-2">
                <div class="flex flex-col items-center justify-center w-auto md:w-1/2">
                    <img class="object-cover rounded pt-3 pb-3 h-32" src="{{ asset('assets/' . $course->course_logo) }}" />
                </div>
                <div class="w-full py-4 px-6 text-gray-800 flex flex-col justify-between font-roboto">
                    <h3 class="font-medium text-2xl leading-tight">{{ $course->course_name }}</h3>
                    <div class="flex justify-start py-5">
                        <button type="button"
                                        class="text-white bg-blue hover:shadow-xl rounded px-4 py-2 shadow-sm text-md uppercase learn-more-btn"
                                        data-popup-id="{{ $course->id }}">
                                        Enroll
                                    </button>
                            <button type="button" class="border bg-blue hover:shadow-xl rounded px-4 py-2 ml-3 shadow-sm text-md uppercase text-white">
                                <a href="{{ asset('assets/' . $course->course_pdf) }}" target="_blank">View Details</a>
                            </button>
                    </div>
                </div>
            </div>
            <p class="mb-4 pt-10">{!! $course->course_desc !!}</p>
            </div>
        </div>
        <div id="popup-{{ $course->id }}"
            class="z-50 hidden fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-75 flex items-center justify-center overflow-hidden popup-overlay">
            <div
                class="backdrop-filter backdrop-blur-md bg-white p-8 rounded-md h-4/5 overflow-y-scroll relative">
                <!-- Close Button Icon using Blade UI Kit's x-icon component -->

                <button type="button"
                    class="text-blue hover:underline cursor-pointer absolute top-2 right-2 close-popup-btn"
                    data-popup-id="{{ $course->id }}">
                    <x-icon name="ri-close-line" class="w-5 h-5 text-current" />
                </button>

                <div class="w-96">
                    <h1 class="text-2xl font-normal text-blue">Our Courses</h1>

                    <form method="post" action="{{ route('enroll.store') }}" id="enrollForm">
                        @csrf
                        <input type="hidden" name="course_id" value="{{ $course->id }}">

                        <div class="mt-4">
                            <label for="enroll_name" class="block text-gray-700 text-sm font-bold mb-2">Full
                                Name:</label>
                            <input type="text" name="enroll_name" id="enroll_name"
                                class="border border-blue rounded w-full py-2 px-3">
                        </div>

                        <div class="mt-4">
                            <label for="enroll_phone"
                                class="block text-gray-700 text-sm font-bold mb-2">Phone:</label>
                            <input type="text" name="enroll_phone" id="enroll_phone"
                                class="border border-blue rounded w-full py-2 px-3">
                        </div>

                        <div class="mt-4">
                            <label for="enroll_email"
                                class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                            <input type="email" name="enroll_email" id="enroll_email"
                                class="border border-blue rounded w-full py-2 px-3">
                        </div>

                        <div class="mt-4">
                            <label for="enroll_schedule"
                                class="block text-gray-700 text-sm font-bold mb-2">Schedule:</label>
                            <select name="enroll_schedule" id="enroll_schedule"
                                class="border border-blue rounded w-full py-2 px-3">
                                <option value="Morning">Morning</option>
                                <option value="Evening">Evening</option>
                                <option value="Afternoon">Afternoon</option>
                            </select>
                        </div>

                        <div class="mt-4">
                            <label for="course_name"
                                class="block text-gray-700 text-sm font-bold mb-2">Course</label>
                            <input name="course_category" value="{{ $course->course_name }}"
                                class="border border-blue rounded w-full py-2 px-3" @readonly(true)>
                        </div>
                        <div class="flex pt-3">
                            <input name="checkbox" type="checkbox" required>
                            <p class="pl-1">I agree to
                            <p class="text-blue pl-1"> Terms and Conditions</p>
                            </p>
                        </div>
                        <button type="submit"
                            class="text-white bg-blue hover:shadow-xl rounded px-3 py-1.5 mt-3 shadow-sm text-sm uppercase">
                            Register
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="container lg:w-2/6 sm:w-1/2 pr-10 border border-gray-200 ml-20 mt-36">
            <h1 class="text-blue pl-6 pt-5 text-center text-2xl">Courses You Might Like</h1>
            @foreach($courses as $recentcourse)
                    <div class="pl-6">
                        <a href="{{ route('course.show', $recentcourse->course_slug) }}">
                            <div class="h-48 w-auto">
                        <img src="{{ asset('assets/' . $recentcourse->course_logo) }}" alt="{{ $recentcourse->course_name }}" class="mt-2 rounded-lg h-36 w-full object-cover object-center inset-0">
                    </div>
                        <p class="text-blue pt-2 pb-4 text-center">{{$recentcourse->course_name}}</p>
                        </a>
                    </div>
                @endforeach
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const buttons = document.querySelectorAll('.learn-more-btn');
            const closeButtons = document.querySelectorAll('.close-popup-btn');
            let openPopupId = null;
    
            buttons.forEach(button => {
                button.addEventListener('click', () => {
                    const popupId = button.getAttribute('data-popup-id');
                    const popup = document.getElementById(`popup-${popupId}`);
                    openPopupId = popupId;
                    document.body.style.overflow = 'hidden'; // Disable scrolling on the body
                    popup.classList.remove('hidden');
                });
            });
    
            closeButtons.forEach(closeButton => {
                closeButton.addEventListener('click', () => {
                    closePopup();
                });
            });
    
            // Close the popup when clicking outside of it
            document.addEventListener('click', (event) => {
                if (event.target.classList.contains('popup-overlay') && openPopupId !== null) {
                    closePopup();
                }
            });
    
            function closePopup() {
                if (openPopupId !== null) {
                    const popup = document.getElementById(`popup-${openPopupId}`);
                    openPopupId = null;
                    document.body.style.overflow = ''; // Enable scrolling on the body
                    popup.classList.add('hidden');
                }
            }
    
            // Add this block to handle form submission
            const enrollForms = document.querySelectorAll('.enroll-form');
    
            enrollForms.forEach(form => {
                form.addEventListener('submit', function (event) {
                    event.preventDefault(); // Prevent the default form submission
    
                    // Handle the enrollment process as needed
                    // You can use AJAX to submit the form data if required
    
                    // Close the popup after enrollment
                    closePopup();
                });
            });
        });
    </script>
@endsection