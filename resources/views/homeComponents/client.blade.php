<h1 class="text-5xl font-normal text-center py-8 text-blue">Clients</h1>

<div class="flex flex-cols flex-wrap justify-center items-center space-x-10 md:px-10 lg:px-20 md:flex-rows">
    @foreach ($clients as $client)
        @if (Str::startsWith($client->client_image, 'http'))
            <img class="h-20 w-32 mb-5" src="{{ $client->client_image }}" />
        @else
            <img class="h-20 w-32 mb-5" src="assets/{{ $client->client_image }}" />
        @endif
    @endforeach
</div>
