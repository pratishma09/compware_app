<div class="w-full sm:h-full lg:h-screen">
    <h1 class="text-5xl font-normal text-center py-8 text-blue">Testimonials</h1>
    
        <div class="flex overflow-hidden space-x-16 text-center group w-screen lg:w-full lg:ml-20 lg:mr-32 lg:h-5/6">
            <div class="flex animate-loop-scroll group-hover:paused">
                @foreach ($testimonials as $testimonial)
                <div class="flex flex-col justify-between items-center px-32 mx-2 rounded-lg min-w-[35rem] max-w-[35rem] bg-white shadow-2xl">
                    <i class="fa-solid fa-quote-left text-xl text-blue mb-5 mt-10"></i>
    
                    <p class="">{!! $testimonial->testimonial_desc !!}</p>
                    <div class="flex flex-col items-center justify-center">
                        <i class="fa-solid fa-minus text-gray-400 text-xl"></i>
                        <img src="assets/{{ $testimonial->testimonial_image }}" class="w-16 rounded-full" alt="Testimonial Image">
                        <p class="text-sm my-1 mb-20">{{ $testimonial->testimonial_name }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        
    </div>
    
</div>

