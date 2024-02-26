<h1 class="text-3xl font-normal text-center py-8 text-blue">Quality Courses For Our Students</h1>

<div class="">
    <div class="flex flex-col overflow-x-hidden space-x-16 text-center group">
        <div class="flex animate-loop-scroll w-screen group-hover:paused">
            @php
                $randomCourses = $courses->shuffle();
            @endphp
            @foreach($randomCourses as $course)
            <div class=" hover:border-blue hover:border-2 mr-5 max-w-screen-xl min-w-max">
                <a href="{{ route('course.show', [$course->course_slug]) }}">
                    <img class="object-cover h-52 rounded pt-3 pb-3 w-60" src="assets/{{ $course->course_logo }}" />
                    <p class="text-xl text-blue capitalize text-center">{{$course->course_name}}</p>
                </a>
            </div>
            @endforeach
        </div>
        <div class="flex animate-loop-scroll group-hover:paused w-full">
            @php
                $randomCourses = $courses->shuffle();
            @endphp
            @foreach($randomCourses as $course)
            <div class=" hover:border-blue hover:border-2 mr-5 max-w-screen-xl min-w-max">
                <a href="{{ route('course.show', [$course->course_slug]) }}">
                    <img class="object-cover h-52 rounded pt-3 pb-3 w-60" src="assets/{{ $course->course_logo }}" />
                    <p class="text-xl text-blue capitalize text-center">{{$course->course_name}}</p>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
