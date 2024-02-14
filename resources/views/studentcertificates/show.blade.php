@extends('template')
@section('title', 'studentcertificates Today')

@section('content')
    <div class="container mx-auto py-8">
        <div class="flex justify-between items-center">
            <h1 class=" text-5xl mb-4 text-blue pl-6">Congratulations {{ $studentcertificate->name }} !</h1>
            <div class="flex">
                <p class=" text-lg text-blue pr-2">Share: </p>
                <a href="https://www.facebook.com/deerwalktrainingcenter/" target="_blank">
                    <img src="../static/facebook.png" class="h-6" alt="Facebook" />
                </a>
                <a href="https://www.linkedin.com/company/deerwalktrainingcenter?originalSubdomain=np" target="_blank">
                    <img src="../static/download.png" class="h-7" alt="LinkedIn" />
                </a>
            </div>
        </div>
        <div class="flex">
            <div class="bg-white shadow-xl w-1/3 py-2">
                <img class="h-10 rounded-full" src="{{ asset('assets/' . $studentcertificate->image) }}" alt="studentcertificate">
                <p class="uppercase text-center w-full py-2 border-b-2 border-gray-400">{{ $studentcertificate->name }}</p>

                <div class="flex justify-between items-center px-2 mt-2">
                    <p class="font-medium text-lg">Course</p>
                    <p class="uppercase">{{ $studentcertificate->course->course_name }}</p>
                </div>
                <div class="flex justify-between items-center px-2">
                    <p class="font-medium text-lg">Started On</p>
                    <p class="uppercase">{{ $studentcertificate->startdate }}</p>
                </div>
                <div class="flex justify-between items-center px-2">
                    <p class="font-medium text-lg">Completed On</p>
                    <p class="uppercase">{{ $studentcertificate->enddate }}</p>
                </div>
                <div class="flex justify-between items-center px-2">
                    <p class="font-medium text-lg">Verification Id</p>
                    <p class="">{{ $studentcertificate->verificationId }}</p>
                </div>
                <div class="flex justify-between items-center px-2">
                    <p class="font-medium text-lg">Trainer</p>
                    <p class="">{{ $studentcertificate->team->team_name }}</p>
                </div>
                <div class="flex justify-end items-end px-2">
                    <p class="">{{ $studentcertificate->trainer_title }}</p>
                </div>
            </div>
            <div class="w-full">
                
                <iframe src="{{ route('studentcertificate.pdf', $studentcertificate->id) }}" 
                    width="100%" 
                    height="600px" 
                    frameborder="0" 
                    scrolling="no" 
                    style="border: none; overflow: hidden; display: block;"></iframe>
            </div>
        </div>
    </div>
    </div>
@endsection
