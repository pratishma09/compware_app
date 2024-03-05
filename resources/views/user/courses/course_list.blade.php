<div id="course-list" class="course-list">
    @if ($courses->count() > 0)
        @foreach ($courses as $course)
            <div class="container w-100 lg:w-4/5 mx-auto flex flex-col"
                data-category="{{ $course->coursecategory->coursecategory_name }}">
                <div
                    class="flex flex-col md:flex-row overflow-hidden rounded-lg shadow-md border border-gray-200 mt-4 w-100 mx-2">
                    <div class="flex flex-col items-center justify-center w-auto md:w-1/2">
                        @if (filter_var($course->course_logo, FILTER_VALIDATE_URL))
                            <img class="object-cover rounded pt-3 pb-3 h-32" src="{{ $course->course_logo }}" />
                        @else
                            <img class="object-cover rounded pt-3 pb-3 h-32" src="{{ asset('assets/' . $course->course_logo) }}" />
                        @endif
                        <p class="text-blue">Schedule</p>
                        <p>Morning</p>
                        <p>Evening</p>
                        <p class="pb-5">Afternoon</p>
                    </div>
                    <div class="w-full py-4 px-6 text-gray-800 flex flex-col justify-between font-roboto">
                        <h3 class="font-medium text-2xl leading-tight">{{ $course->course_name }}</h3>
                        <p class="mt-2 line-clamp-6">{!! strip_tags($course->course_desc) !!}</p>
                        <div class="flex justify-end pt-8">
                            <button type="button"
                                class="border border-blue hover:bg-gray-200 rounded px-4 py-2 mr-3 shadow-sm text-md uppercase text-blue">
                                <a href="{{ route('course.show', [$course->course_slug]) }}">Read More</a>
                            </button>
                            <button type="button"
                                class="text-white bg-blue hover:shadow-xl rounded px-4 py-2 shadow-sm text-md uppercase learn-more-btns"
                                data-popups-id="{{ $course->id }}">
                                Enroll
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="popups-{{ $course->id }}"
                class="z-50 hidden fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-75 flex items-center justify-center overflow-hidden popup-overlay">
                <div class="backdrop-filter backdrop-blur-md bg-white p-8 rounded-md h-4/5 overflow-y-scroll relative">

                    <button type="button"
                        class="text-blue hover:underline cursor-pointer absolute top-2 right-2 close-popup-btn"
                        data-popup-id="{{ $course->id }}">
                        <x-icon name="ri-close-line" class="w-5 h-5 text-current" />
                    </button>

                    <div class="w-96">
                        <h1 class="text-2xl font-normal text-blue">Our Courses</h1>

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
                                <label for="course_name"
                                    class="block text-gray-700 text-sm font-bold mb-2">Course</label>
                                <input name="course_category" value="{{ $course->course_name }}"
                                    class="border border-blue rounded w-full py-2 px-3" @readonly(true)>
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
        @endforeach
    @else
        <p class="text-center text-lg">No results found.</p>
    @endif
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const buttons = document.querySelectorAll('.learn-more-btns');
        const closeButtons = document.querySelectorAll('.close-popup-btn');
        let openPopupId = null;

        buttons.forEach(button => {
            button.addEventListener('click', () => {
                const popupId = button.getAttribute('data-popups-id');
                const popup = document.getElementById(`popups-${popupId}`);
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
                const popup = document.getElementById(`popups-${openPopupId}`);
                openPopupId = null;
                document.body.style.overflow = '';
                popup.classList.add('hidden');
            }
        }

        const enrollForms = document.querySelectorAll('.enroll-form');

        enrollForms.forEach(form => {
            form.addEventListener('submit', function(event) {
                event.preventDefault(); 
                closePopup();
            });
        });
    });
</script>
