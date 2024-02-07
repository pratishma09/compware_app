<style>
    .left-to-right-animation-wrapper {
        overflow-x: hidden; /* Prevent horizontal scrolling */
        width: 100vw; /* Ensure the wrapper spans the entire screen width */
        display: flex; /* Ensure the testimonials appear side by side */
    }

    .testimonial {
        flex: 0 0 auto; /* Prevent the testimonials from stretching to fill the container */
        width: 30%; /* Each testimonial takes half of the screen width */
        animation: leftToRightMove 30s linear infinite; /* Apply animation to each testimonial */
    }

    @keyframes leftToRightMove {
        0% {
            transform: translateX(0%);
        }

        100% {
            transform: translateX(-100%);
        }
    }
</style>
<h1 class="text-4xl font-medium text-center pt-8 text-blue">Testimonials</h1>

<div class="left-to-right-animation-wrapper">
    <div class="testimonial flex items-center justify-center text-center my-5 rounded-lg shadow-lg mx-5">
        <div class="flex flex-col justify-center items-center px-10 mx-5 h-screen">
            <i class="fa-solid text-blue text-3xl my-2 fa-person-circle-question"></i>
            <p>I am delighted to provide a commendation for Smriti Pradhanang, who successfully completed QA training at Deerwalk Training Center. Smriti's commitment to mastering QA concepts was evident throughout the program, showcasing a keen interest in learning and applying Quality Assurance processes and methodologies.</p>
            <i class="fa-solid fa-minus text-gray-400 text-5xl"></i>
            <img src="{{ asset('static/testimonial/photo_1690976067947.jpeg') }}" class="w-16 rounded-full" alt="Testimonial Image">
            <p class=" text-sm my-1">Smriti Pradhanang</p>
        </div>
    </div>

    <div class="testimonial flex items-center justify-center text-center my-5 rounded-lg shadow-lg mx-5">
        <div class="flex flex-col justify-center items-center px-10 mx-5 h-screen">
            <i class="fa-solid text-blue text-3xl my-2 fa-person-circle-question"></i>
            <p>I am delighted to provide a commendation for Smriti Pradhanang, who successfully completed QA training at Deerwalk Training Center. Smriti's commitment to mastering QA concepts was evident throughout the program, showcasing a keen interest in learning and applying Quality Assurance processes and methodologies.</p>
            <i class="fa-solid fa-minus text-gray-400 text-5xl"></i>
            <img src="{{ asset('static/testimonial/photo_1690976067947.jpeg') }}" class="w-16 rounded-full" alt="Testimonial Image">
            <p class=" text-sm my-1">Smriti Pradhanang</p>
        </div>
    </div>

    <div class="testimonial flex items-center justify-center text-center my-5 rounded-lg shadow-lg mx-5">
        <div class="flex flex-col justify-center items-center px-10 mx-5 h-screen">
            <i class="fa-solid text-blue text-3xl my-2 fa-person-circle-question"></i>
            <p>I am delighted to provide a commendation for Smriti Pradhanang, who successfully completed QA training at Deerwalk Training Center. Smriti's commitment to mastering QA concepts was evident throughout the program, showcasing a keen interest in learning and applying Quality Assurance processes and methodologies.</p>
            <i class="fa-solid fa-minus text-gray-400 text-5xl"></i>
            <img src="{{ asset('static/testimonial/photo_1690976067947.jpeg') }}" class="w-16 rounded-full" alt="Testimonial Image">
            <p class=" text-sm my-1">Smriti Pradhanang</p>
        </div>
    </div>

    <div class="testimonial flex items-center justify-center text-center my-5 rounded-lg shadow-lg mx-5">
        <div class="flex flex-col justify-center items-center px-10 mx-5 h-screen">
            <i class="fa-solid text-blue text-3xl my-2 fa-person-circle-question"></i>
            <p>I am delighted to provide a commendation for Smriti Pradhanang, who successfully completed QA training at Deerwalk Training Center. Smriti's commitment to mastering QA concepts was evident throughout the program, showcasing a keen interest in learning and applying Quality Assurance processes and methodologies.</p>
            <i class="fa-solid fa-minus text-gray-400 text-5xl"></i>
            <img src="{{ asset('static/testimonial/photo_1690976067947.jpeg') }}" class="w-16 rounded-full" alt="Testimonial Image">
            <p class=" text-sm my-1">Smriti Pradhanang</p>
        </div>
    </div>
</div>