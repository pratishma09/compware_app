@extends('template')
@section('title', 'studentcertificates Today')

@section('content')
    <div class="container lg:ml-10 py-8 w-screen">
        <div class="flex justify-between items-center pt-20">
            <h1 class="text-5xl mb-4 text-blue">Congratulations {{ $studentcertificate->name }} !</h1>
            <div class="hidden lg:flex">
                <p class=" text-lg text-blue pr-2">Share: </p>
                <a href="https://www.facebook.com/deerwalktrainingcenter/" target="_blank">
                    <img src="../static/facebook.png" class="h-6" alt="Facebook" />
                </a>
                <a href="https://www.linkedin.com/company/deerwalktrainingcenter?originalSubdomain=np" target="_blank">
                    <img src="../static/download.png" class="h-7" alt="LinkedIn" />
                </a>
            </div>
        </div>
        <div class="flex flex-col lg:items-start lg:flex-row">
            <div class=" bg-white shadow-xl h-1/3 lg:w-1/4 py-2 mr-5">
                @if (Str::startsWith($studentcertificate->image, 'http'))
                    <img class="h-10 w-10 rounded-full" src="{{ $studentcertificate->image }}" alt="studentcertificate">
                @else
                    <img class="h-10 w-10 rounded-full" src="{{ asset('assets/' . $studentcertificate->image) }}" alt="studentcertificate">
                @endif
                <p class="uppercase text-center w-full py-2 border-b-2 border-gray-400">{{ $studentcertificate->name }}</p>

                <div class="flex space-x-10 items-center px-2 mt-2">
                    <p class="font-medium text-md mr-1">Course</p>
                    <p class="uppercase pl-8 text-sm">{{ $studentcertificate->course->course_name }}</p>
                </div>
                <div class="flex space-x-1 items-center px-2">
                    <p class="font-medium text-md pr-5">Started On</p>
                    <p class="uppercase text-sm pl-5 ">{{ $studentcertificate->startdate }}</p>
                </div>
                <div class="flex items-center px-2">
                    <p class="font-medium text-md pr-2">Completed On</p>
                    <p class="uppercase text-sm pl-2">{{ $studentcertificate->enddate }}</p>
                </div>
                <div class="flex items-center px-2">
                    <p class="font-medium text-md">Verification Id</p>
                    <p class="text-sm pl-5">{{ $studentcertificate->verificationId }}</p>
                </div>
                <div class="flex items-center px-2">
                    <p class="font-medium text-md mr-2">Trainer</p>
                    <p class="text-sm pl-14 ml-2">{{ $studentcertificate->team->team_name }}</p>
                </div>
                
                    <p class="text-sm ml-28 pl-5">{{ $studentcertificate->trainer_title }}</p>
                
            </div>

            <div class="pt-3 w-full object-cover flex-1 flex flex-col justify-center items-center">

                <iframe src="{{ route('studentcertificate.pdf', $studentcertificate->id) }}" width="100%" height="600px"
                    frameborder="0" scrolling="no" style="border: none; display:block;"
                    class="lg:w-full"></iframe>
            
                <div class="text-center">
                    <div class="text-center">
                        <div class="bg-blue mb-5 rounded">
                            <form action="{{ route('download.image', $studentcertificate->id) }}" method="GET">
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Download Image
                                </button>
                            </form>
                        </div>
                        <div class="bg-blue rounded">
                            <form action="{{ route('download.pdf', $studentcertificate->id) }}" method="GET">
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Download PDF
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
