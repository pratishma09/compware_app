@extends('layout')
@section('layout')
    <div class="pl-20">
        <h1 class="text-2xl font-medium py-8">Panelist</h1>

        <div class="flex flex-cols flex-wrap justify-center items-center space-x-10 px-20 md:flex-rows">
            @foreach ($events as $event)
                @if ($event->event_role == 'Panelist')
                    <div class="group relative justify-self-center">
                        <div class="h-64">
                            <div class="bg-gray-100 h-32">
                                <img class="h-54 w-64 absolute" src="assets/{{ $event->event_image }}" />
                            </div>
                            <div
                                class="bg-blue rounded-t-xl h-28 w-64 md:w-60 sm:w-60 group-hover:bg-gray-400 focus:bg-gray-400">
                            </div>
                        </div>
                        <div class="text-center w-60 h-20 pt-2">
                            <h3 class="text-blue">{{ $event->event_name }}</h3>
                        </div>
                        <div class="text-center w-60">
                            <button type="button"
                                class="text-blue uppercase border border-blue hover:bg-gray-200 font-medium rounded-lg text-sm px-3.5 py-2 mt-5 my-2 learn-more-btn"
                                data-popup-id="{{ $event->id }}">Learn
                                more</button>
                        </div>

                        <!-- Unique Popup Content -->
                        <div id="popup-{{ $event->id }}"
                            class="z-50 hidden fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-75 flex items-center justify-center overflow-hidden popup-overlay">
                            <div
                                class="backdrop-filter backdrop-blur-md bg-white p-8 rounded-md w-3/5 h-4/5 overflow-y-scroll relative">
                                <!-- Close Button Icon using Blade UI Kit's x-icon component -->

                                <button type="button"
                                    class="text-blue hover:underline cursor-pointer absolute top-2 right-2 close-popup-btn"
                                    data-popup-id="{{ $event->id }}">
                                    <x-icon name="ri-close-line" class="w-5 h-5 text-current" />
                                </button>
                                <div class="flex flex-col items-center justify-center">
                                    <img class="w-15 h-15 rounded-full ring-2 ring-blue"
                                        src="assets/{{ $event->event_image }}" alt="{{ $event->event_image }}">
                                    <h3 class="text-blue">{{ $event->event_name }}</h3>
                                    <h3 class="font-light text-xs pb-3">{{ $event->event_role }}</h3>
                                </div>
                                <p>{!! nl2br(e($event->event_description)) !!}</p>
                                <div class="flex items-end justify-end">
                                    <img class="w-30 h-10" src="assets/{{ $event->event_signature }}"
                                        alt={{ $event->event_signature }} />
                                </div>
                            </div>

                        </div>

                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <div class="pl-20">
        <h1 class="text-2xl font-medium py-8">Host & Moderator</h1>
        <div class="flex flex-cols flex-wrap justify-center items-center space-x-10 px-20 md:flex-rows">
            @foreach ($events as $event)
                @if ($event->event_role == 'Host & Moderator')
                    <div class="group relative justify-self-center">
                        <div class="h-64">
                            <div class="bg-gray-100 h-32">
                                <img class="h-54 w-64 absolute" src="assets/{{ $event->event_image }}" />
                            </div>
                            <div
                                class="bg-blue rounded-t-xl h-28 w-64 md:w-60 sm:w-60 group-hover:bg-gray-400 focus:bg-gray-400">
                            </div>
                        </div>
                        <div class="text-center w-60 h-20 pt-2">
                            <h3 class="text-blue">{{ $event->event_name }}</h3>
                            <h3 class="">{{ $event->event_role }}</h3>
                        </div>
                        <div class="text-center w-60">
                            <button type="button"
                                class="text-blue uppercase border border-blue hover:bg-gray-200 font-medium rounded-lg text-sm px-3.5 py-2 mt-5 my-2 learn-more-btn"
                                data-popup-id="{{ $event->id }}">Learn
                                more</button>
                        </div>

                        <div id="popup-{{ $event->id }}"
                            class="z-50 hidden fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-75 flex items-center justify-center overflow-hidden popup-overlay">
                            <div
                                class="backdrop-filter backdrop-blur-md bg-white p-8 rounded-md w-3/5 h-4/5 overflow-y-scroll relative">
                                <!-- Close Button Icon using Blade UI Kit's x-icon component -->
                                <button type="button"
                                    class="text-blue hover:underline cursor-pointer absolute top-2 right-2 close-popup-btn"
                                    data-popup-id="{{ $event->id }}">
                                    <x-icon name="ri-close-line" class="w-5 h-5 text-current" />
                                </button>
                                <div class="flex flex-col items-center justify-center">
                                    <img class="w-15 h-15 rounded-full ring-2 ring-blue"
                                        src="assets/{{ $event->event_image }}" alt="{{ $event->event_image }}">
                                    <h3 class="text-blue">{{ $event->event_name }}</h3>
                                    <h3 class="font-light text-xs pb-3">{{ $event->event_role }}</h3>
                                </div>
                                <p>{!! nl2br(e($event->event_description)) !!}</p>
                                <div class="flex items-end justify-end">
                                    <img class="w-30 h-10 mt-5" src="assets/{{ $event->event_signature }}"
                                        alt={{ $event->event_signature }} />
                                </div>
                            </div>

                        </div>

                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const buttons = document.querySelectorAll('.learn-more-btn');
            const closeButtons = document.querySelectorAll('.close-popup-btn');
            let openPopupId = null;

            buttons.forEach(button => {
                button.addEventListener('click', () => {
                    const popupId = button.getAttribute('data-popup-id');
                    const popup = document.getElementById(`popup-${popupId}`);
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
                    const popup = document.getElementById(`popup-${openPopupId}`);
                    openPopupId = null;
                    document.body.style.overflow = ''; // Enable scrolling on the body
                    popup.classList.add('hidden');
                }
            }
        });
    </script>
@endsection
