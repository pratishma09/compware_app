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
</style>

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
