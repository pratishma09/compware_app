@extends('layout')
@section('layout')
@include('user.events.components.epI.bg')
    <div class="pl-20">
        <h1 class="text-2xl font-medium py-8">Panelist</h1>

        <div class="flex flex-cols flex-wrap justify-center items-center space-x-10 px-20 md:flex-rows">
            @foreach ($events as $event)
                @if ($event->event_role == 'Panelist' && $event->event_ep == 'I')
                    <div class="justify-self-center">
                        <button type="button"
                            class="rounded-md bg-zinc-500 text-sm w-32 lg:w-60 font-medium group-hover:w-32 lg:group-hover:w-64 learn-more-btn"
                            data-popup-id="{{ $event->id }}">
                            <div class=" my-5 flex flex-col justify-center items-center">
                                @if (Str::startsWith($event->event_image, 'http'))
                                    <img class="rounded-full w-20 h-20" src="{{ $event->event_image }}" />
                                @else
                                    <img class="rounded-full w-20 h-20" src="{{ asset('assets/' . $event->event_image) }}" />
                                @endif
                                <h3 class="text-white mt-4">{{ $event->event_name }}</h3>
                            </div>
                        </button>

                        <div id="popup-{{ $event->id }}"
                            class="z-50 hidden fixed top-0 left-0 w-screen h-full bg-gray-800 bg-opacity-75 flex items-center justify-center overflow-hidden popup-overlay">
                            <div
                                class="backdrop-filter backdrop-blur-md bg-white p-8 rounded-md md:h-96 w-1/2 h-1/2 overflow-y-scroll relative">

                                <button type="button"
                                    class="text-blue hover:underline cursor-pointer absolute top-2 right-2 close-popup-btn"
                                    data-popup-id="{{ $event->id }}">
                                    <x-icon name="ri-close-line" class="w-5 h-5 text-current" />
                                </button>
                                <div class="flex flex-col items-center justify-center">
                                    @if (Str::startsWith($event->event_image, 'http'))
                                        <img class="w-28 h-28 rounded-full ring-2 ring-blue"
                                            src="{{ $event->event_image }}" alt="{{ $event->event_image }}">
                                    @else
                                        <img class="w-28 h-28 rounded-full ring-2 ring-blue"
                                            src="{{ asset('assets/' . $event->event_image) }}"
                                            alt="{{ $event->event_image }}">
                                    @endif
                                    <h3 class="text-blue">{{ $event->event_name }}</h3>
                                    <h3 class="font-light text-xs pb-3">{{ $event->event_role }}</h3>
                                </div>
                                <p>{!! $event->event_desc !!}</p>
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
                @if ($event->event_role == 'Host & Moderator' && $event->event_ep == 'I')
                    <div class="justify-self-center">
                        <button type="button"
                            class="rounded-md bg-zinc-500 text-sm w-32 lg:w-60 hover:scale-110 font-medium learn-more-btn"
                            data-popup-id="{{ $event->id }}">
                            <div class=" my-5 flex flex-col justify-center items-center">
                                @if (Str::startsWith($event->event_image, 'http'))
                                    <img class="rounded-full w-20 h-20" src="{{ $event->event_image }}" />
                                @else
                                    <img class="rounded-full w-20 h-20" src="{{ asset('assets/' . $event->event_image) }}" />
                                @endif
                                <h3 class="text-white mt-4">{{ $event->event_name }}</h3>
                            </div>
                        </button>

                        <div id="popup-{{ $event->id }}"
                            class="z-50 hidden fixed top-0 left-0 w-screen h-full bg-gray-800 bg-opacity-75 flex items-center justify-center overflow-hidden popup-overlay">
                            <div
                                class="backdrop-filter backdrop-blur-md bg-white p-8 rounded-md md:h-96 w-3/5 h-3/5 overflow-y-scroll relative">

                                <button type="button"
                                    class="text-blue hover:underline cursor-pointer absolute top-2 right-2 close-popup-btn"
                                    data-popup-id="{{ $event->id }}">
                                    <x-icon name="ri-close-line" class="w-5 h-5 text-current" />
                                </button>
                                <div class="flex flex-col items-center justify-center">
                                    @if (Str::startsWith($event->event_image, 'http'))
                                        <img class="w-28 h-28 rounded-full ring-2 ring-blue"
                                            src="{{ $event->event_image }}" alt="{{ $event->event_image }}">
                                    @else
                                        <img class="w-28 h-28 rounded-full ring-2 ring-blue"
                                            src="{{ asset('assets/' . $event->event_image) }}"
                                            alt="{{ $event->event_image }}">
                                    @endif
                                    <h3 class="text-blue">{{ $event->event_name }}</h3>
                                    <h3 class="font-light text-xs pb-3">{{ $event->event_role }}</h3>
                                </div>
                                <p>{!! $event->event_desc !!}</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    @include('user.events.components.epI.question')

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
