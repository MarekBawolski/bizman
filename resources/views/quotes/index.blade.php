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
      <a href="{{ url('/quotes/create') }}" class="flex px-4 py-2 mx-4 my-8 text-lg text-white duration-500 bg-blue-600 rounded w-fit hover:bg-blue-500">{{ __('Dodaj nową wycenę') }}</a>
    </div>
    @isset($quotes)
      <div class="flex flex-col gap-2">
        <div class="py-2 border bg-gray-200 grid gap-2 grid-cols-[1fr_0.5fr_190px]">
          <div>Wycena</div>
          <div>Klient</div>
          <div>Akcje</div>
        </div>
        @foreach ($quotes as $quote)
          <div class="py-2 border border-gray-200 grid gap-2 grid-cols-[1fr_0.5fr_70px_60px_60px]">
            <div class="quote-name">
              {{ $quote->name }}
            </div>
            <div class="client-name">
              {{ $quote->client->first_name }}
              {{ $quote->client->last_name }}
            </div>
            <a href="{{ url('/quotes/' . $quote->id) }}" class="font-bold text-green-600 quote-edit">
              {{ __('Podgląd') }}
            </a>
            <a href="{{ url('/quotes/' . $quote->id . '/edit') }}" class="font-bold text-yellow-400 quote-edit">
              {{ __('Edytuj') }}
            </a>
            <form method="POST" action="/quotes/{{ $quote->id }}">
              @csrf
              @method('DELETE')
              <button type="submit" class="font-bold text-red-600 quote-delete">
                {{ __('Usuń') }}
              </button>
            </form>
          </div>
        @endforeach
      </div>
    @else
      {{ __('Brak wycen') }}
    @endisset ($quotes)

  </div>

  <div class="flex justify-center mt-8">
    {!! $quotes->links() !!}
  </div>
</x-app-layout>
