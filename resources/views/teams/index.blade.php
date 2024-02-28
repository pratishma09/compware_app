@extends('template')
@section('title', 'Our team')

@section('content')
    <div class="bg-gray-100">
        
        <h1 class="text-5xl font-normal text-center py-8 text-blue pt-20">Meet Our Team</h1>

        <div class="flex flex-cols flex-wrap justify-center items-center space-x-10 px-20 md:flex-rows">
            @foreach ($teams as $team)
                @if ($team->team_post == 'team')
                    <div class="group relative justify-self-center">
                        <div class="h-64">
                            @if (filter_var($team->team_image, FILTER_VALIDATE_URL))
                                <div class="bg-gray-100 h-32">
                                    <a href="{{ $team->team_image }}" target="_blank">
                                        <img class="h-40 w-64 absolute" src="{{ $team->team_image }}" />
                                    </a>
                                </div>
                            @else
                                <div class="bg-gray-100 h-32">
                                    <img class="h-40 w-64 absolute" src="assets/{{ $team->team_image }}" />
                                </div>
                            @endif
                            <div class="bg-blue rounded-t-xl h-28 w-64 md:w-60 sm:w-60 rounded-t-md group-hover:bg-gray-400 focus:bg-gray-400"></div>
                        </div>
                        <div class="text-center w-60 h-20 pt-2">
                            <h3 class="text-blue">{{ $team->team_name }}</h3>
                            <h3 class="">{{ $team->team_role }}</h3>
                        </div>
                        <div class="text-center w-60">
                            <button type="button"
                                class="text-blue uppercase border border-blue hover:bg-gray-200 font-medium rounded-lg text-sm px-3.5 py-2 mt-2 mb-5 my-2 learn-more-button"
                                data-popup-id="{{ $team->id }}">Learn
                                more</button>
                        </div>

                        <!-- Unique Popup Content -->
                        <div id="{{ $team->id }}-popup"
                            class="z-50 hidden fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-75 flex items-center justify-center overflow-hidden popup-overlay">
                            <div
                                class="backdrop-filter backdrop-blur-md bg-white p-8 rounded-md w-1/2 h-3/5 overflow-y-scroll relative">

                                <button type="button"
                                    class="text-blue hover:underline cursor-pointer absolute top-2 right-2 close-popup-btn"
                                    data-popup-id="{{ $team->id }}">
                                    <x-icon name="ri-close-line" class="w-5 h-5 text-current" />
                                </button>
                                <div class="flex flex-col items-center justify-center">
                                    @if (filter_var($team->team_image, FILTER_VALIDATE_URL))
                                        <img class="w-40 h-40 rounded-full ring-2 ring-blue"
                                            src="{{ $team->team_image }}" alt="{{ $team->team_name }}">
                                    @else
                                        <img class="w-15 h-15 rounded-full ring-2 ring-blue"
                                            src="assets/{{ $team->team_image }}" alt="{{ $team->team_name }}">
                                    @endif
                                    <h3 class="text-blue">{{ $team->team_name }}</h3>
                                    <h3 class="font-light text-xs pb-3">{{ $team->team_role }}</h3>
                                </div>
                                <p>{!! nl2br(e($team->team_description)) !!}</p>
                                {{-- <div class="flex items-end justify-end">
                                    <img class="w-30 h-10" src="assets/{{ $team->team_signature }}" alt="{{ $team->team_signature }}" />
                                </div> --}}
                            </div>
                        </div>

                    </div>
                @endif
            @endforeach
        </div>
        <h1 class="text-5xl font-normal text-center py-8 text-blue pt-20">Meet Our Trainers</h1>

        <div class="flex flex-cols flex-wrap justify-center items-center space-x-10 px-20 md:flex-rows">
            @foreach ($teams as $team)
                @if ($team->team_post == 'trainer')
                    <div class="group relative justify-self-center">
                        <div class="h-64">
                            @if (filter_var($team->team_image, FILTER_VALIDATE_URL))
                                <div class="bg-gray-100 h-32">
                                    <a href="{{ $team->team_image }}" target="_blank">
                                        <img class="h-54 w-64 absolute" src="{{ $team->team_image }}" />
                                    </a>
                                </div>
                            @else
                                <div class="bg-gray-100 h-32">
                                    <img class="h-54 w-64 absolute" src="assets/{{ $team->team_image }}" />
                                </div>
                            @endif
                            <div class="bg-blue rounded-t-xl h-28 w-64 md:w-60 sm:w-60 group-hover:bg-gray-400 focus:bg-gray-400"></div>
                        </div>
                        <div class="text-center w-60 h-20 pt-2">
                            <h3 class="text-blue">{{ $team->team_name }}</h3>
                            <h3 class="">{{ $team->team_role }}</h3>
                        </div>
                        <div class="text-center w-60">
                            <button type="button"
                                class="text-blue uppercase border border-blue hover:bg-gray-200 font-medium rounded-lg text-sm px-3.5 py-2 mt-2 mb-5 my-2 learn-more-button"
                                data-popup-id="{{ $team->id }}">Learn
                                more</button>
                        </div>

                        <!-- Unique Popup Content -->
                        <div id="{{ $team->id }}-popup"
                            class="z-50 hidden fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-75 flex items-center justify-center overflow-hidden popup-overlay">
                            <div
                                class="backdrop-filter backdrop-blur-md bg-white p-8 rounded-md w-1/2 h-3/5 overflow-y-scroll relative">

                                <button type="button"
                                    class="text-blue hover:underline cursor-pointer absolute top-2 right-2 close-popup-btn"
                                    data-popup-id="{{ $team->id }}">
                                    <x-icon name="ri-close-line" class="w-5 h-5 text-current" />
                                </button>
                                <div class="flex flex-col items-center justify-center">
                                    @if (filter_var($team->team_image, FILTER_VALIDATE_URL))
                                        <img class="w-40 h-40 rounded-full ring-2 ring-blue"
                                            src="{{ $team->team_image }}" alt="{{ $team->team_name }}">
                                    @else
                                        <img class="w-40 h-40 rounded-full ring-2 ring-blue"
                                            src="assets/{{ $team->team_image }}" alt="{{ $team->team_name }}">
                                    @endif
                                    <h3 class="text-blue">{{ $team->team_name }}</h3>
                                    <h3 class="font-light text-xs pb-3">{{ $team->team_role }}</h3>
                                </div>
                                <p>{!! nl2br(e($team->team_description)) !!}</p>
                                {{-- <div class="flex items-end justify-end">
                                    <img class="w-30 h-10" src="assets/{{ $team->team_signature }}" alt="{{ $team->team_signature }}" />
                                </div> --}}
                            </div>
                        </div>

                    </div>
                @endif
            @endforeach
        </div>
    </div>
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const buttons = document.querySelectorAll('.learn-more-button');
            const closeButtons = document.querySelectorAll('.close-popup-btn');
            let openPopupId = null;

            buttons.forEach(button => {
                button.addEventListener('click', () => {
                    const popupId = button.getAttribute('data-popup-id');
                    const popup = document.getElementById(`${popupId}-popup`);
                    openPopupId = popupId;
                    document.body.style.overflow = 'hidden'; // Disable scrolling on the body
                    popup.classList.remove('hidden');
                });
            });

            closeButtons.forEach(closeButton => {
                closeButton.addEventListener('click', () => {
                    closePopup();
                });
            });

            // Close the popup when clicking outside of it
            document.addEventListener('click', (event) => {
                if (event.target.classList.contains('popup-overlay') && openPopupId !== null) {
                    closePopup();
                }
            });

            function closePopup() {
                if (openPopupId !== null) {
                    const popup = document.getElementById(`${openPopupId}-popup`);
                    openPopupId = null;
                    document.body.style.overflow = ''; // Enable scrolling on the body
                    popup.classList.add('hidden');
                }
            }
        });
    </script>
@endsection
