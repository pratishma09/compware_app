<h1 class="text-5xl font-normal text-center py-8 text-blue">Clients</h1>

<div class="flex flex-cols flex-wrap justify-center items-center space-x-10 md:px-10 lg:px-20 md:flex-rows pb-10">
    @foreach ($clients as $client)
        <img class="h-11 w-30 mb-5" src="assets/{{ $client->client_image }}" />
    @endforeach
</div>