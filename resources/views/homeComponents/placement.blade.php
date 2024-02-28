<style>
    /* Animation */
    @keyframes allcardsmove {
        0% {
            transform: translateY(0%);
        }

        100% {
            transform: translateY(100%);
        }
    }

    @keyframes allcardsmove2 {
        0% {
            transform: translateY(100%);
        }

        100% {
            transform: translateY(0%);
        }
    }

    .row-one {
        animation: allcardsmove 20s linear infinite;
    }

    .row-two {
        animation: allcardsmove2 20s linear infinite;
    }

    .row-three {
        animation: allcardsmove 20s linear infinite;
    }
</style>
<div class="flex lg:flex-row md:flex-row flex-col lg:px-20 justify-center items-center">
    <div class="md:w-1/2 pt-10 px-10 lg:pl-20">
        <div class="flex justify-center items-center overflow-hidden h-64 max-h-64 min-h-64">
            <div class="flex items-center flex-col gap-2 justify-center w-16 lg:w-48 mr-10 row-one rounded-lg">
                @foreach ($placements->shuffle() as $placement)
                    <div class="shadow-xl rounded-lg bg-white">
                        @if (Str::startsWith($placement->placement_image, 'http'))
                            <img class="rounded-lg" src="{{ $placement->placement_image }}" />
                        @else
                            <img class="rounded-lg" src="assets/{{ $placement->placement_image }}" />
                        @endif
                        <p class="text-gray-500 text-xs text-center pb-3">{{ $placement->placement_name }}</p>
                    </div>
                @endforeach
            </div>
            <div class="flex items-center flex-col gap-2 justify-center w-16 lg:w-48 mr-10 row-two rounded-lg">
                @foreach ($placements->shuffle() as $placement)
                    <div class="shadow-xl rounded-lg bg-white">
                        @if (Str::startsWith($placement->placement_image, 'http'))
                            <img class="rounded-lg" src="{{ $placement->placement_image }}" />
                        @else
                            <img class="rounded-lg" src="assets/{{ $placement->placement_image }}" />
                        @endif
                        <p class="text-gray-500 text-xs text-center pb-3">{{ $placement->placement_name }}</p>
                    </div>
                @endforeach
            </div>

            <div class="flex items-center flex-col gap-2 justify-center w-16 lg:w-48 mr-10 rounded-lg row-three">
                @foreach ($placements->shuffle() as $placement)
                    <div class="shadow-xl rounded-lg bg-white">
                        @if (Str::startsWith($placement->placement_image, 'http'))
                            <img class="rounded-lg" src="{{ $placement->placement_image }}" />
                        @else
                            <img class="rounded-lg" src="assets/{{ $placement->placement_image }}" />
                        @endif
                        <p class="text-gray-500 text-xs text-center pb-3">{{ $placement->placement_name }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="lg:w-1/2 md:w-1/2 px-5 lg:pr-20">
        <h1 class="text-4xl lg:text-start text-center pt-8 text-blue">Placement</h1>
        <h1 class="text-4xl text-center lg:text-start text-blue">Partners</h1>
        <p class="pt-5 pr-5 text-md lg:text-start text-center ">Several esteemed companies have partnered with us and
            experienced remarkable
            success with our graduates. They have not only found exceptional talent through our Placement Partner
            Program but also witnessed increased productivity and innovation within their teams.</p>
    </div>
</div>
