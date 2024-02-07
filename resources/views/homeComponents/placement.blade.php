<style>
    .row-two {
        animation: allcardsmove2 30s linear infinite;
        margin-top: -185%;
    }

    .row-three {
        animation: allcardsmove 30s linear infinite;
    }

    .row-one {
        animation: allcardsmove 30s linear infinite;
    }

    @keyframes allcardsmove {
        0% {
            margin-top: 0%;
        }

        100% {
            margin-top: -185%;
        }
    }

    @keyframes allcardsmove2 {
        0% {
            margin-top: -185%;
        }

        100% {
            margin-top: 0%;
        }
    }
</style>

    <div class="">
        @if (session()->has('success'))
            <div>
                {{ session('success') }}
            </div>
        @endif

        <div class="flex lg:flex-row md:flex-row flex-col lg:px-20 justify-center items-center">
            <div class="md:w-1/2 pt-10 px-10 lg:pl-20">
                <div class="flex justify-center items-center overflow-hidden left-course h-64 max-h-64 min-h-64">
                    <div class="flex items-center flex-col gap-2 justify-center w-16 lg:w-48 mr-10 row-one row rounded-lg">
                        @foreach ($placements->shuffle() as $placement)
                            <div class="shadow-xl rounded-lg bg-white">
                                <img class="rounded-lg" src="assets/{{ $placement->placement_image }}" />
                                <p class="text-gray-500 text-xs text-center pb-3">{{ $placement->placement_name }}</p>
                            </div>
                        @endforeach
                    </div>
                    <div
                        class="flex items-center flex-col gap-2 justify-center w-16 lg:w-48 mr-10 row-two row rounded-lg">
                        @foreach ($placements->shuffle() as $placement)
                            <div class="shadow-xl rounded-lg bg-white">
                                <img class="rounded-lg" src="assets/{{ $placement->placement_image }}" />
                                <p class="text-gray-500 text-xs text-center pb-3">{{ $placement->placement_name }}</p>
                            </div>
                        @endforeach
                    </div>

                    <div
                        class="flex items-center flex-col gap-2 justify-center w-16 lg:w-48 mr-10 rounded-lg row-three row">
                        @foreach ($placements->shuffle() as $placement)
                            <div class="shadow-xl rounded-lg bg-white">
                                <img class="rounded-lg" src="assets/{{ $placement->placement_image }}" />
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
    </div>