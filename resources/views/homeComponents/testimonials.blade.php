<style>
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
        animation: scroll 20s linear infinite;
    }

    .slide {
        flex: 0 0 75%;
    }
</style>

<div class="w-full">
    <h1 class="text-4xl font-medium text-center pt-8 text-blue">Testimonials</h1>
    <div class="slider text-center">
        <div class="slide-track md:w-1/2 flex">
            @foreach ($testimonials as $testimonial)
            <div class="flex flex-col justify-between items-center px-10 mx-5 m-5 rounded-lg shadow-lg slide md:w-full">
                <!-- Icon -->
                <i class="fa-solid text-blue text-3xl my-2 fa-person-circle-question"></i>
                <!-- Testimonial Description -->
                <p>{{ $testimonial->testimonial_desc }}</p>
                <!-- Testimonial Image and Name -->
                <div class="flex flex-col items-center justify-center">
                    <i class="fa-solid fa-minus text-gray-400 text-5xl"></i>
                    <img src="assets/{{ $testimonial->testimonial_image }}" class="w-16 rounded-full" alt="Testimonial Image">
                    <p class="text-sm my-1">{{ $testimonial->testimonial_name }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
