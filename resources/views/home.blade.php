<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

    <!-- Scripts -->

    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <script async src="https://www.google.com/recaptcha/api.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        .left-to-right-animation-wrapper {
            overflow-x: hidden;
            width: 100vw; 
        }
    
        .another-left-to-right-animation-wrapper{
            overflow-x: hidden;
            width: 100vw;
        }
    
        .left-to-right-animation {
            animation: leftToRightMove 30s linear infinite;
        }
    
        .another-left-to-right-animation {
            animation: rightToLeftMove 20s linear infinite;
        }
    
        @keyframes leftToRightMove {
            0% {
                transform: translateX(0%);
            }
    
            100% {
                transform: translateX(100%);
            }
        }
    
        @keyframes rightToLeftMove {
            0% {
                transform: translateX(100%);
            }
    
            100% {
                transform: translateX(0%);
            }
        }
        
        .row-two {
            animation: allcardsmove2 30s linear infinite;
            margin-top: -185%;
        }
    
        .row-three {
            animation: allcardsmove 30s linear infinite;
        }
    
        .row-one {
            animation: allcardsmove 30s linear infinite;
        }
    
        @keyframes allcardsmove {
            0% {
                margin-top: 0%;
            }
    
            100% {
                margin-top: -185%;
            }
        }
    
        @keyframes allcardsmove2 {
            0% {
                margin-top: -185%;
            }
    
            100% {
                margin-top: 0%;
            }
        }
        
            /* Animation */
            @keyframes scroll {
                0% {
                    transform: translateX(100%);
                }
        
                100% {
                    transform: translateX(-400%);
                }
            }
        
            .slider {
                overflow: hidden;
                position: relative;
            }
        
            .slide-track {
                display: flex;
                animation: scroll 40s linear infinite;
            }
        
            .slide {
                flex: 0 0 75%;
            }
    </style>
</head>

<body class="roboto overflow-x-hidden">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <div id="app">
        <main>
            <nav class="p-1 sticky text-sm w-full shadow-lg uppercase font-medium bg-white">
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
                        <a href="/home" class="text-blue hover:bg-slate-200 p-2 pr-4">Home</a>
                        <div class="relative group">
                            <a href="#" class="text-blue hover:bg-slate-200 p-2">About</a>
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
                            <a href="#" class="text-blue hover:bg-slate-200 p-2">Event</a>
                            <div
                                class="absolute hidden text-gray-400 capitalize font-normal w-44 mt-2 p-5 rounded-b-md bg-white space-y-2 group-hover:block group-focus:block">
                                <a href="#" class="block mt-4 hover:bg-slate-200">Episode I</a>
                                <a href="#" class="block hover:bg-slate-200">Episode II</a>
                            </div>
                        </div>
                        <div class="relative group">
                            <a href="#" class="text-blue hover:bg-slate-200 p-2">Certificate</a>
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
                        <a class="block pt-4">Episode I</a>
                        <a class="block">Episode II</a>
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
            <div>
                <div class="flex flex-col justify-center items-center">
                    <p class="text-3xl pt-20">Explore Nepal's Leading</p>
                    <p class="text-3xl pt-3">Training Center</p>
                    <p class="lg:w-2/5  text-center pt-10 mb-16">
                        Welcome to Deerwalk Training Center, where we are dedicated to providing premiere IT and Technical skills to
                        facilitate your journey towards achieving success.
                    </p>
            
                    <select style="width: 50%" class="py-2" id="courseSelect">
                        <option value="" disabled selected>Search</option>
                        @foreach ($courses as $course)
                            <option value="{{ route('course.show', [$course->course_slug]) }}">{{ $course->course_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <script>
                var $courseSelect = $("#courseSelect");
            
                $courseSelect.on("change", function() {
                    var selectedCourse = $courseSelect.val();
                    if (selectedCourse) {
                        window.location.href = selectedCourse;
                    }
                });
            
                $courseSelect.select2();
            </script>
            
            
            
            <h1 class="text-3xl font-normal text-center py-8 text-blue">Quality Courses For Our Students</h1>
            
            <div class="w-screen">
                <div class="left-to-right-animation-wrapper">
                    <div class="flex left-to-right-animation">
                        @php
                            $randomCourses = $courses->shuffle();
                        @endphp
                        @foreach($randomCourses as $course)
                        <div class=" hover:border-blue hover:border-2 mr-5">
                            <a href="{{ route('course.show', [$course->course_slug]) }}">
                                <img class="object-cover h-52 rounded pt-3 pb-3 w-60" src="assets/{{ $course->course_logo }}" />
                                <p class="text-xl text-blue capitalize text-center">{{$course->course_name}}</p>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="flex px-20 another-left-to-right-animation">
                    @php
                        $anotherRandomCourses = $courses->shuffle();
                    @endphp
                    @foreach($anotherRandomCourses as $course)
                    <div class=" hover:border-blue hover:border-2 mr-5">
                        <a href="{{ route('course.show', [$course->course_slug]) }}">
                            <img class="object-cover h-52 rounded pt-3 pb-3 w-60" src="assets/{{ $course->course_logo }}" />
                            <p class="text-xl text-blue capitalize text-center">{{$course->course_name}}</p>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <div>
                <h1 class="text-3xl font-normal text-center py-8 text-blue">Why Deerwalk Training Center?</h1>
                <p class="text-gray-300 text-center pt-3 text-lg font-medium">Deerwalk Training Center cultivates expertise in IT and Management
                    through specialized training programs.</p>
                <div class="lg:grid lg:grid-cols-2 lg:grid-rows-2 lg:gap-4 lg:py-4 mx-20 mr-20">
                    <div data-aos="fade-right">
                        <i class="fa-solid fa-code text-blue mb-1 text-xl"></i>
                        <p class="text-xl pb-2">Hands-On Learning</p>
                        <p>Students are given numerous opportunities to apply their knowledge in real-world scenarios through practical exercises, engaging projects, and valuable internships.</p>
                    </div>
                    <div data-aos="fade-left">
                        <i class="fa-solid fa-arrow-pointer text-blue mb-1 text-xl -rotate-12 ml-1"></i>
                        <p class="text-xl pb-2">Comprehensive Career Guidance and Support</p>
                        <p>The center understands the importance of launching a successful career. They provide comprehensive career guidance and support to their students. This includes resume-building workshops, interview preparation, and job placement assistance.</p>
                    </div>
                    <div data-aos="fade-right">
                        <i class="fa-solid fa-bullseye text-blue mb-1 text-2xl"></i>
                        <p class="text-xl pb-2">Industry Partnerships</p>
                        <p>Deerwalk Training Center has strong industry partnerships, which provide valuable opportunities for their students. Through these partnerships, students gain access to internships and job opportunities with leading organizations in the IT industry.</p>
                    </div>
                    <div data-aos="fade-left">
                        <i class="fa-solid fa-graduation-cap text-blue mb-1 text-2xl "></i>
                        <p class="text-xl pb-2">Bridging Skills Gaps for IT and Management Success</p>
                        <p>In a rapidly evolving professional world, the gap between skills needed and skills possessed can often hinder growth and success. Our mission is to empower individuals with the tools they need to thrive in the realms of IT and Management, two fields that play pivotal roles in shaping today's business landscape.</p>
                    </div>
                </div>
            </div>

            <div>
                <h1 class="text-3xl font-normal text-center py-8 text-blue">Find Your Path</h1>
                <div class="w-1/2 mx-auto flex flex-col lg:w-full lg:grid lg:grid-cols-3 lg:px-20 mt-10 lg:mb-20">
                    <div class="flex flex-col mt-20">
                        <div data-aos="fade-up-right">
                        <p class="text-blue pb-4 text-xl">Enroll</p>
                        <p class="pb-16">Kickstart your journey by enrolling in our learning center, where you'll gain access to
                            cutting-edge courses and expert instructors, setting the foundation for your future success.</p>
                        </div>
                        <div data-aos="fade-up-right">
                        <p class="text-blue pb-4 text-xl">Graduate</p>
                        <p class="">Kickstart your journey by enrolling in our learning center, where you'll gain access to
                            cutting-edge courses and expert instructors, setting the foundation for your future success.</p>
                        </div>
                    </div>
                    <div class="hidden lg:flex lg:flex-col lg:justify-between">
            
                        <img src="{{ asset('static/path.png')}}" alt="courses" class="w-3/4 mt-5">
                    
                    </div>
                    <div class="flex flex-col mt-20">
                        <div data-aos="fade-up-left">
                        <p class="text-blue pb-4 text-xl">Learn</p>
                        <p class="pb-16">Immerse yourself in hands-on, industry-relevant learning experiences, acquiring practical
                            skills and knowledge to thrive in your chosen field.</p>
                        </div>
                        <div data-aos="fade-up-left">
                        <p class="text-blue pb-4 text-xl">Placement</p>
                        <p>Our Placement Partner Program ensures you're well-connected to top employers, providing exciting career
                            opportunities and paving the way for a rewarding professional journey.</p>
                        </div>
                    </div>
                </div>
            </div>
            

            
                <div class="">
                    @if (session()->has('success'))
                        <div>
                            {{ session('success') }}
                        </div>
                    @endif
            
                    <div class="flex lg:flex-row md:flex-row flex-col lg:px-20 justify-center items-center">
                        <div class="md:w-1/2 pt-10 px-10 lg:pl-20">
                            <div class="flex justify-center items-center overflow-hidden left-course h-64 max-h-64 min-h-64">
                                <div class="flex items-center flex-col gap-2 justify-center w-16 lg:w-48 mr-10 row-one row rounded-lg">
                                    @foreach ($placements->shuffle() as $placement)
                                        <div class="shadow-xl rounded-lg bg-white">
                                            <img class="rounded-lg" src="assets/{{ $placement->placement_image }}" />
                                            <p class="text-gray-500 text-xs text-center pb-3">{{ $placement->placement_name }}</p>
                                        </div>
                                    @endforeach
                                </div>
                                <div
                                    class="flex items-center flex-col gap-2 justify-center w-16 lg:w-48 mr-10 row-two row rounded-lg">
                                    @foreach ($placements->shuffle() as $placement)
                                        <div class="shadow-xl rounded-lg bg-white">
                                            <img class="rounded-lg" src="assets/{{ $placement->placement_image }}" />
                                            <p class="text-gray-500 text-xs text-center pb-3">{{ $placement->placement_name }}</p>
                                        </div>
                                    @endforeach
                                </div>
            
                                <div
                                    class="flex items-center flex-col gap-2 justify-center w-16 lg:w-48 mr-10 rounded-lg row-three row">
                                    @foreach ($placements->shuffle() as $placement)
                                        <div class="shadow-xl rounded-lg bg-white">
                                            <img class="rounded-lg" src="assets/{{ $placement->placement_image }}" />
                                            <p class="text-gray-500 text-xs text-center pb-3">{{ $placement->placement_name }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
            
                        <div class="lg:w-1/2 md:w-1/2 px-5 lg:pr-20">
                            <h1 class="text-4xl lg:text-start text-center pt-8 text-blue">Placement</h1>
                            <h1 class="text-4xl text-center lg:text-start text-blue">Partners</h1>
                            <p class="pt-5 pr-5 text-md lg:text-start text-center ">Several esteemed companies have partnered with us and
                                experienced remarkable
                                success with our graduates. They have not only found exceptional talent through our Placement Partner
                                Program but also witnessed increased productivity and innovation within their teams.</p>
                        </div>
                    </div>
                </div>

                
                
                <div class="w-full">
                    <h1 class="text-5xl font-normal text-center py-8 text-blue">Testimonials</h1>
                    <div class="slider text-center">
                        <div class="slide-track md:w-1/2 flex">
                            @foreach ($testimonials as $testimonial)
                            <div class="flex flex-col justify-between items-center px-10 mx-5 m-5 rounded-lg shadow-lg slide md:w-full">
                                <i class="fa-solid fa-quote-left text-xl text-blue"></i>
                
                                <p class="w-4/5">{!! $testimonial->testimonial_desc !!}</p>
                                <div class="flex flex-col items-center justify-center">
                                    <i class="fa-solid fa-minus text-gray-400 text-xl"></i>
                                    <img src="assets/{{ $testimonial->testimonial_image }}" class="w-16 rounded-full" alt="Testimonial Image">
                                    <p class="text-sm my-1">{{ $testimonial->testimonial_name }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <h1 class="text-5xl font-normal text-center py-8 text-blue">Clients</h1>

                <div class="flex flex-cols flex-wrap justify-center items-center space-x-10 md:px-10 lg:px-20 md:flex-rows pb-10">
                    @foreach ($clients as $client)
                        <img class="h-11 w-30 mb-5" src="assets/{{ $client->client_image }}" />
                    @endforeach
                </div>
            @yield('home')
        </main>
    </div>
    <footer>
        @include('components.maps')
        @include('components.footer')
    </footer>
    @yield('scripts')
    @stack('scripts')

    <script>
        AOS.init();
      </script>
</body>

</html>

