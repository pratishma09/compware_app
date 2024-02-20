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
        animation: scroll 40s linear infinite;
    }

    .slide {
        flex: 0 0 75%;
    }
</style>

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
