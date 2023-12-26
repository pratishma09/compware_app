@extends('template')
@section('title', 'Client')

@section('content')
    <div class="bg-gray-100 border">
        @if (session()->has('success'))
            <div>
                {{ session('success') }}
            </div>
        @endif
        <h1 class="text-5xl font-normal text-center py-8 text-blue">Clients</h1>

        <div class="flex flex-cols flex-wrap justify-center items-center space-x-10 px-20 md:flex-rows pb-10">
            @foreach ($clients as $client)
            <img class="h-11 w-30 mb-5" src="assets/{{ $client->client_image }}" />
            @endforeach
        </div>
    </div>
@endsection
