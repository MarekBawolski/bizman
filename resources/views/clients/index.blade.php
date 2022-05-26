<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Baza klientów') }}
    </h2>
  </x-slot>

  <div class="container mx-auto">
    @if (\Session::has('success'))
      <div class="mt-4 text-2xl text-green-500 alert alert-success">
        {!! \Session::get('success') !!}
      </div>
    @endif
    <div class="add-new">
      <a href="{{ url('/clients/create') }}" class="flex px-4 py-2 mx-4 my-8 text-lg text-white duration-500 bg-blue-600 rounded w-fit hover:bg-blue-500">{{ __('Dodaj nowego klienta') }}</a>
    </div>
    @isset($clients)
      <div class="flex flex-col gap-2">
        @foreach ($clients as $client)
          <div class="py-2 border border-gray-200 grid gap-2 grid-cols-[auto_70px_60px_60px]">
            <div class="client-name">
              {{ $client->first_name }} {{ $client->last_name }}
            </div>
            <a href="{{ url('/clients/' . $client->id) }}" class="font-bold text-green-600 client-edit">
              {{ __('Podgląd') }}
            </a>
            <a href="{{ url('/clients/' . $client->id . '/edit') }}" class="font-bold text-yellow-400 client-edit">
              {{ __('Edytuj') }}
            </a>
            <form method="POST" action="/clients/{{ $client->id }}">
              @csrf
              @method('DELETE')
              <button type="submit" class="font-bold text-red-600 client-delete">
                {{ __('Usuń') }}
              </button>
            </form>
          </div>
        @endforeach
      </div>
    @else
      {{ __('Break klientów') }}
    @endisset ($clients)
  </div>

  <div class="flex justify-center">
    {!! $clients->links() !!}
  </div>
</x-app-layout>
