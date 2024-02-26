<nav class="p-1 z-50 px-0 lg:px-20 text-sm w-full shadow-lg uppercase font-medium bg-white fixed top-0">
    <div class="container mx-auto flex items-center justify-between">

        <!-- Logo -->
        <a href="/home" class="text-blue py-1 px-3 font-semibold">
            <img src="../static/compware-logo.58d15c3415fd7c80e673.png" class="h-12" alt="Deerwalk Compware" />
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
            <a href="/home" class="text-blue hover:bg-slate-200 p-2 mr-2">Home</a>
            <div class="relative group">
                <a class="text-blue hover:bg-slate-200 p-2">About</a>
                <div
                    class="absolute hidden text-gray-400 capitalize font-normal w-44 mt-2 p-5 rounded-b-md bg-white space-y-2 group-hover:block group-focus:block">
                    <a href="/team" class="block hover:bg-slate-200">Our Team</a>
                    <a href="/blog" class="block hover:bg-slate-200">Blogs</a>
                    <a href="/eventgallery" class="block hover:bg-slate-200">Gallery</a>
                </div>
            </div>

            <a href="/course" class="text-blue hover:bg-slate-200 p-2">Courses</a>
            <a href="/contact/create" class="text-blue hover:bg-slate-200 p-2">Contact</a>
            <div class="relative group">
                <a class="text-blue hover:bg-slate-200 p-2">Event</a>
                <div
                    class="absolute hidden text-gray-400 capitalize font-normal w-44 mt-2 p-5 rounded-b-md bg-white space-y-2 group-hover:block group-focus:block">
                    <a href="/event/episode-I" class="block mt-4 hover:bg-slate-200">Episode I</a>
                    <a href="/event/episode-II" class="block hover:bg-slate-200">Episode II</a>
                </div>
            </div>
            <div class="relative group">
                <a class="text-blue hover:bg-slate-200 p-2">Certificate</a>
                <div
                    class="absolute hidden text-gray-400 capitalize font-normal w-44 mt-2 p-5 rounded-b-md bg-white space-y-2 group-hover:block group-focus:block">
                    <a class="block mt-4 hover:bg-slate-200"><button class="request">Request</button></a>
                    <a class="block hover:bg-slate-200"><button class="verify">Verify</button></a>
                </div>
            </div>

            <button class="text-blue py-2 px-3 border border-blue rounded learn-more-btn uppercase"
                data-popup-id="1">Enroll</button>

            <a href="/login" class="text-blue hover:bg-slate-100 p-2 text-xl"><i
                    class="fa-solid fa-arrow-right-to-bracket"></i></a>

        </div>

    </div>
</nav>

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
            <a href="/event/episode-I" class="block pt-4">Episode I</a>
            <a href="/event/episode-II" class="block">Episode II</a>
        </div>
    </div>
    <div class="relative group">
        <a class="text-blue hover:bg-slate-100 p-2">Certificate</a>
        <div
            class="absolute hidden text-gray-400 capitalize font-normal w-44 mt-2 p-5 rounded-b-md bg-white space-y-2 group-hover:block group-focus:block">
            <a class="block pt-4"><button class="request">Request</button></a>
            <a class="block"><button class="verify">Verify</button></a>
        </div>
    </div>
    <a href="/login" class="text-blue py-2 px-3 border border-blue rounded">Enroll</a>
</div>
<script>
    const groupButtons = document.querySelectorAll('.group');
    const groupContainers = document.querySelectorAll('.group-container');

    groupButtons.forEach((button, index) => {
        button.addEventListener('click', () => {
            groupContainers.forEach((container, i) => {
                if (i !== index) {
                    container.classList.add('hidden');
                }
            });

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
        const requestButtons = document.querySelectorAll('.request');
        const requestForm = document.getElementById('requestForm');
        const popup = document.getElementById('popup');
        const closeBtn = document.getElementById('closeBtn');

        requestButtons.forEach(button => {
            button.addEventListener('click', () => {
                document.body.style.overflow = 'hidden';
                popup.classList.remove('hidden');
            });
        });

        closeBtn.addEventListener('click', () => {
            popup.classList.add('hidden');
        });

        document.addEventListener('click', (event) => {
            if (event.target.classList.contains('popup-overlay')) {
                popup.classList.add('hidden');
            }
        });

        requestForm.addEventListener('submit', function(event) {
            console.log("submitted");
        });
    });


    document.addEventListener("DOMContentLoaded", function() {
        const verifyButtons = document.querySelectorAll('.verify');
        const verifyForm = document.getElementById('verifyForm');
        const popup = document.getElementById('popups');
        const closeBtn = document.getElementById('closeButn');

        verifyButtons.forEach(button => {
            button.addEventListener('click', () => {
                document.body.style.overflow = 'hidden';
                popup.classList.remove('hidden');
            });
        });

        closeButn.addEventListener('click', () => {
            popup.classList.add('hidden');
        });

        document.addEventListener('click', (event) => {
            if (event.target.classList.contains('popup-overlay')) {
                popup.classList.add('hidden');
            }
        });

        verifyForm.addEventListener('submit', function(event) {
            event.preventDefault();
            var verificationId = document.getElementById('verificationId').value;
            var formAction = this.getAttribute('action').replace(':verificationId', verificationId);
            window.location.href = formAction;
        });
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
                const popup = document.getElementById(`popup-${openPopupId}`);
                openPopupId = null;
                document.body.style.overflow = '';
                popup.classList.add('hidden');
            }
        }

        const enrollForms = document.querySelectorAll('.enrollForm');

        enrollForms.forEach(form => {
            form.addEventListener('submit', function(event) {

                event.preventDefault();
                closePopup();
            });
        });
    });
</script>

@foreach ($courses as $course)
    <div id="popup-{{ $course->id }}"
        class="z-50 hidden fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-75 flex items-center justify-center overflow-hidden popup-overlay">
        <div class="backdrop-filter backdrop-blur-md bg-white p-8 rounded-md h-4/5 overflow-y-scroll relative">

            <button type="button"
                class="text-blue hover:underline cursor-pointer absolute top-2 right-2 close-popup-btn"
                data-popup-id="{{ $course->id }}">
                <x-icon name="ri-close-line" class="w-5 h-5 text-current" />
            </button>
            <div class="flex items-center">
                
                    <img src={{ asset('static/enroll.svg')}} alt="enroll" class="h-96">
                
                <div class="w-96">
                    <h1 class="text-2xl font-normal text-blue">Register Now</h1>

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
                            <label for="course_name" class="block text-gray-700 text-sm font-bold mb-2">Course</label>
                            <select name="course_category" id="enroll_schedule"
                                class="border border-blue rounded w-full py-2 px-3">
                                @foreach ($courses as $course)
                                    <option value="{{ $course->course_name }}">{{ $course->course_name }}</option>
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
    </div>
@endforeach


<div id="popup"
    class="z-50 hidden fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-75 flex items-center justify-center overflow-hidden popup-overlay">
    <div class="backdrop-filter backdrop-blur-md bg-white p-8 rounded-md h-4/5 overflow-y-scroll relative">

        <button type="button" class="text-blue hover:underline cursor-pointer absolute top-2 right-2"
            id="closeBtn">
            <x-icon name="ri-close-line" class="w-5 h-5 text-current" />
        </button>

        <div class="w-96">
            <h1 class="text-2xl font-normal text-blue">Get Your Certificate</h1>

            <form method="post" action="{{ route('requestcertificate.store') }}" id="requestForm">
                @csrf
                <div class="mt-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Full
                        Name:</label>
                    <input type="text" name="name" id="name"
                        class="border border-blue rounded w-full py-2 px-3">
                </div>

                <div class="mt-4">
                    <label for="contact" class="block text-gray-700 text-sm font-bold mb-2">Phone:</label>
                    <input type="text" name="contact" id="contact"
                        class="border border-blue rounded w-full py-2 px-3">
                </div>

                <div class="mt-4">
                    <label for="duration" class="block text-gray-700 text-sm font-bold mb-2">Duration:</label>
                    <input type="text" name="duration" id="duration"
                        class="border border-blue rounded w-full py-2 px-3">
                </div>

                <div class="mt-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                    <input type="email" name="email" id="email"
                        class="border border-blue rounded w-full py-2 px-3">
                </div>

                <div class="mt-4">
                    <label for="startdate" class="block text-gray-700 text-sm font-bold mb-2">Startdate:</label>
                    <input type="date" name="startdate" id="startdate"
                        class="border border-blue rounded w-full py-2 px-3">
                </div>

                <div class="mt-4">
                    <label for="enddate" class="block text-gray-700 text-sm font-bold mb-2">Enddate:</label>
                    <input type="date" name="enddate" id="enddate"
                        class="border border-blue rounded w-full py-2 px-3">
                </div>

                <div class="mt-4">
                    <label for="course_id" class="block text-gray-700 text-sm font-bold mb-2">Course:</label>
                    <select name="course_id" id="course_id" class="border border-blue rounded w-full py-2 px-3">
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-4">
                    <label for="team_id" class="block text-gray-700 text-sm font-bold mb-2">Course Trainer:</label>
                    <select name="team_id" id="team_id" class="border border-blue rounded w-full py-2 px-3">
                        @foreach ($teams as $team)
                            <option value="{{ $team->id }}">{{ $team->team_name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit"
                    class="text-white bg-blue hover:shadow-xl rounded px-3 py-1.5 mt-3 shadow-sm text-sm uppercase">
                    Request
                </button>
            </form>
        </div>
    </div>
</div>

<div id="popups"
    class="z-50 hidden fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-75 flex items-center justify-center overflow-hidden popup-overlay">
    <div class="backdrop-filter backdrop-blur-md bg-white p-8 rounded-md overflow-y-scroll relative">

        <button type="button" class="text-blue hover:underline cursor-pointer absolute top-2 right-2"
            id="closeButn">
            <x-icon name="ri-close-line" class="w-5 h-5 text-current" />
        </button>

        <div class="w-96">
            <h1 class="text-2xl font-normal text-blue">Verify Certificate</h1>

            <form method="get"
                action="{{ route('studentcertificate.show', ['verificationId' => ':verificationId']) }}"
                id="verifyForm">
                @csrf
                <div class="mt-4">
                    <label for="verificationId" class="block text-gray-700 text-sm font-bold mb-2">Verification
                        Id:</label>
                    <input type="text" name="verificationId" id="verificationId"
                        class="border border-blue rounded w-full py-2 px-3">
                </div>
                <button type="submit"
                    class="text-white bg-blue hover:shadow-xl rounded px-3 py-1.5 mt-3 shadow-sm text-sm uppercase">
                    Verify
                </button>
            </form>
        </div>
    </div>
</div>
