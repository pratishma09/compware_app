<div class="md:h-screen w-screen relative text-white bg-black bg-opacity-60 pb-20 mt-16">
    <video autoplay muted loop class="absolute inset-0 object-cover w-full h-full" style="z-index: -1;">
        <source src="{{ asset('static/website.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div class="flex flex-col justify-center items-center relative">
        <p class="text-3xl pt-10 lg:pt-24">Explore Nepal's Leading</p>
        <p class="text-3xl pt-3">Training Center</p>
        <p class="lg:w-2/5 md:w-2/5 text-center pt-10 mb-16">
            Welcome to Deerwalk Training Center, where we are dedicated to providing premiere IT and Technical skills to
            facilitate your journey towards achieving success.
        </p>

        
        <select style="width: 50%;" class="" id="courseSelect">
            <option value="" class="text-gray-600 border-none outline-none" disabled selected>Search</option>
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


<style>
    .select2-container .select2-selection--single {
        padding-top: 5px;
        padding-right: 5px;
        height: 40px !important;
    }

    .select2-selection__arrow{
        margin-top: 5px;
    }
</style>