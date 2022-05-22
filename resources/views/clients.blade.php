<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Baza klientów') }}
    </h2>
  </x-slot>

  @isset($clients)
    @foreach ($clients as $client)
      <a href="{{ '/clients/' . $client->id . '/view' }}">{{ $client->first_name }} {{ $client->last_name }}</a><br>
    @endforeach
  @endisset ($clients)


  <div class="flex justify-center">
    {!! $clients->links() !!}
  </div>
</x-app-layout>
