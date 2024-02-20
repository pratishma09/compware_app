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
