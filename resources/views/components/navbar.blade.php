<nav class="p-1 sticky w-full shadow-lg uppercase font-medium text-md bg-white">
    <div class="container mx-auto flex items-center justify-between">

        <!-- Logo -->
        <a href="/home" class="text-blue py-2 px-3 text-lg font-semibold">
            <img src="../static/compware-logo.58d15c3415fd7c80e673.png" class="h-16" alt="Deerwalk Compware" />
        </a>

        <!-- Mobile Toggle Button -->
        <div class="md:hidden">
            <button id="mobile-menu-button" class="text-blue py-2 px-3 focus:outline-none">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>
        </div>

        <div class="hidden md:flex space-x-1 justify-around items-center">
            <a href="/home" class="text-blue hover:bg-slate-100 p-2 pr-4">Home</a>
            <div class="relative group">
                <a href="#" class="text-blue hover:bg-slate-100 p-2">About</a>
                <div
                    class="absolute hidden text-gray-400 capitalize font-normal w-44 mt-2 p-5 rounded-b-md bg-white space-y-2 group-hover:block group-focus:block">
                    <a href="#" class="block">Our Team</a>
                    <a href="#" class="block">Blogs</a>
                    <a href="#" class="block">Gallery</a>
                </div>
            </div>

            <a href="/course" class="text-blue hover:bg-slate-100 p-2">Courses</a>
            <a href="/contact/create" class="text-blue hover:bg-slate-100 p-2">Contact</a>
            <div class="relative group">
                <a href="#" class="text-blue hover:bg-slate-100 p-2">Event</a>
                <div
                    class="absolute hidden text-gray-400 capitalize font-normal w-44 mt-2 p-5 rounded-b-md bg-white space-y-2 group-hover:block group-focus:block">
                    <a href="#" class="block pt-4">Episode I</a>
                    <a href="#" class="block">Episode II</a>
                </div>
            </div>
            <div class="relative group">
                <a href="#" class="text-blue hover:bg-slate-100 p-2">Certificate</a>
                <div
                    class="absolute hidden text-gray-400 capitalize font-normal w-44 mt-2 p-5 rounded-b-md bg-white space-y-2 group-hover:block group-focus:block">
                    <a href="#" class="block pt-4">Verify</a>
                    <a href="#" class="block">Request</a>
                </div>
            </div>
            
            <button class="text-blue py-2 px-3 border border-blue rounded learn-more-btn" data-popup-id="1">Enroll</button>

            <a href="/login" class="text-blue hover:bg-slate-100 p-2 text-xl"><i
                    class="fa-solid fa-arrow-right-to-bracket"></i></a>
            
        </div>

    </div>
</nav>



<!-- Mobile Menu (hidden by default) -->
<div id="mobile-menu"
    class="md:hidden mx-auto flex flex-col items-center text-blue bg-white py-2 px-3 fixed inset-y-0 left-0 z-50 hidden w-1/2 space-y-2 uppercase font-medium">
    <a href="/home"
        class=" hover:bg-slate-100 border-b-2 text-black font-normal text-sm capitalize text-center">Deerwalk Training
        Center</a>
    <a href="/home" class="text-blue hover:bg-slate-100">Home</a>
    <div class="relative group">
        <a class="text-blue hover:bg-slate-100">About</a>
        <div
            class="absolute hidden text-gray-400 capitalize font-normal w-44 p-5 rounded-b-md bg-white space-y-2 group-hover:block group-focus:block ml-20">
            <a href="/team" class="block">Our Team</a>
            <a href="/blog" class="block">Blogs</a>
            <a href="/eventgallery" class="block">Gallery</a>
        </div>
    </div>

    <a href="/course" class="text-blue hover:bg-slate-100">Courses</a>
    <a href="/contact/create" class="text-blue hover:bg-slate-100">Contact</a>
    <div class="relative group">
        <a class="text-blue hover:bg-slate-100 p-2">Event</a>
        <div
            class="absolute hidden text-gray-400 capitalize font-normal w-44 mt-2 p-5 rounded-b-md bg-white space-y-2 group-hover:block group-focus:block">
            <a class="block pt-4">Episode I</a>
            <a class="block">Episode II</a>
        </div>
    </div>
    <div class="relative group">
        <a class="text-blue hover:bg-slate-100 p-2">Certificate</a>
        <div
            class="absolute hidden text-gray-400 capitalize font-normal w-44 mt-2 p-5 rounded-b-md bg-white space-y-2 group-hover:block group-focus:block">
            <a href="#" class="block pt-4">Verify</a>
            <a href="#" class="block">Request</a>
        </div>
    </div>
    <a href="/login" class="text-blue py-2 px-3 border border-blue rounded">Enroll</a>
</div>
<script>
    // JavaScript to toggle the visibility of group subitems
    const groupButtons = document.querySelectorAll('.group');
    const groupContainers = document.querySelectorAll('.group-container');

    groupButtons.forEach((button, index) => {
        button.addEventListener('click', () => {
            // Hide all other group containers
            groupContainers.forEach((container, i) => {
                if (i !== index) {
                    container.classList.add('hidden');
                }
            });

            // Toggle the visibility of the clicked group container
            groupContainers[index].classList.toggle('hidden');
        });
    });
</script>

<script>
    // JavaScript to toggle the mobile menu visibility
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>

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
            form.addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission

                // Handle the enrollment process as needed
                // You can use AJAX to submit the form data if required

                // Close the popup after enrollment
                closePopup();
            });
        });
    });
</script>

@foreach ($courses as $course)
    <div id="popup-{{ $course->id }}"
        class="z-50 hidden fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-75 flex items-center justify-center overflow-hidden popup-overlay">
        <div class="backdrop-filter backdrop-blur-md bg-white p-8 rounded-md h-4/5 overflow-y-scroll relative">
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
                        <label for="enroll_phone" class="block text-gray-700 text-sm font-bold mb-2">Phone:</label>
                        <input type="text" name="enroll_phone" id="enroll_phone"
                            class="border border-blue rounded w-full py-2 px-3">
                    </div>

                    <div class="mt-4">
                        <label for="enroll_email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
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
                        <label for="course_name" class="block text-gray-700 text-sm font-bold mb-2">Course</label>
                        <select name="course_category" id="enroll_schedule"
                            class="border border-blue rounded w-full py-2 px-3">
                            @foreach($courses as $course)
                            <option value="{{$course->course_name}}">{{$course->course_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex pt-3">
                        <input name="checkbox" type="checkbox" required>
                        <p class="pl-1">I agree to
                        <p class="text-blue pl-1"><a href="{{ route('terms') }}"> Terms and
                                Conditions</a></p>
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
@endforeach
