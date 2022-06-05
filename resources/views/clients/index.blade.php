<x-app-layout>
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" />
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
    <div class="py-12">
      <div class="max-w-7xl mx-auto min-w-min sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 border-b border-gray-200">
            <a href="{{ url('/clients/create') }}" class="mt-4 xl:mt-0 px-8 py-2 mx-4 text-lg text-white duration-500 bg-blue-600 rounded hover:bg-blue-500">
              {{ __('Dodaj nowego klienta') }}
            </a>
            @isset($clients)
            <div class="flex flex-col">
              <div class="-my-2 overflow-x-auto lg:-mx-8">
                <div class="py-5 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                  <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg text-center">
                    <div class="table min-w-min hidden md:block">
                      <div class="table-header-group -50 text-center border-b border-gray-200 bg-gray-300">
                        <div class="table-row">
                          <div scope="col" class="table-cell px-3 py-4 text-xs font-medium text-gray-700 bg-gray-300">
                            Id
                          </div>
                          <div scope="col" class="table-cell px-5 py-4 text-xs font-medium text-gray-700 border-b border-gray-300">
                            Imię i nazwisko
                          </div>
                          <div scope="col" class="table-cell px-5 py-4 text-xs font-medium text-gray-700 border-b border-gray-300">
                            Numer telefonu
                          </div>
                          <div scope="col" class="table-cell px-5 py-4 text-xs font-medium text-gray-700 border-b border-gray-300">
                            E-mail
                          </div>
                          <div scope="col" class="table-cell px-5 py-4 text-xs font-medium text-gray-700 border-b border-gray-300">
                            Stworzone
                          </div>
                          <div scope="col" class="table-cell px-5 py-4 text-xs font-medium text-gray-700 border-b border-gray-300">
                            Modyfikowane
                          </div>
                          <div scope="col" class="table-cell px-5 py-4 text-xs font-medium text-gray-700 border-b border-gray-300">
                            Firma
                          </div>
                          <div scope="col" class="table-cell px-5 py-4 text-xs font-medium text-gray-700 border-b border-gray-300">
                            Edytuj
                          </div>
                          <div scope="col" class="table-cell px-5 py-4 text-xs font-medium text-gray-700 border-b border-gray-300">
                            Usuń
                          </div>
                        </div>
                      </div>
                      <div class="table-row-group bg-white divide-y divide-gray-200">
                        @foreach ($clients as $client)
                        <div class="table-row transition duration-300 ease-in-out hover:bg-gray-200">
                          <a href="{{ url('/clients/' . $client->id) }}" class="table-cell px-3 py-4 text-xs font-medium text-gray-700 bg-gray-300">
                            {{ $client->id}}
                          </a>
                          <a href="{{ url('/clients/' . $client->id) }}" class="table-cell px-5 py-4 text-xs font-medium text-gray-700 border-b border-gray-300">
                            {{ $client->first_name }} {{ $client->last_name }}
                          </a>
                          <a href="{{ url('/clients/' . $client->id) }}" class="table-cell px-5 py-4 text-xs font-medium text-gray-700 border-b border-gray-300">
                            {{ $client->phone_number }}
                          </a>
                          <a href="{{ url('/clients/' . $client->id) }}" class="table-cell px-5 py-4 text-xs font-medium text-gray-700 border-b border-gray-300">
                            {{ $client->email}}
                          </a>
                          <a href="{{ url('/clients/' . $client->id) }}" class="table-cell px-5 py-4 text-xs font-medium text-gray-700 border-b border-gray-300">
                            {{ $client->created_at }}
                          </a>
                          <a href="{{ url('/clients/' . $client->id) }}" class="table-cell px-5 py-4 text-xs font-medium text-gray-700 border-b border-gray-300">
                            {{ $client->updated_at }}
                          </a>
                          <a href="{{ url('/clients/' . $client->id) }}" class="table-cell px-5 py-4 text-xs font-medium text-gray-700 border-b border-gray-300">
                            {{ $client->company }}
                          </a>
                          <a href="{{ url('/clients/' . $client->id . '/edit') }}" class="table-cell px-5 py-4 text-xs font-medium text-yellow-400 border-b border-gray-300">
                            <svg class="h-8 w-8 text-blue-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" />
                              <path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                              <circle cx="12" cy="12" r="3" />
                            </svg>
                          </a>
                          <form method="POST" action="/clients/{{ $client->id }}" class="table-cell px-5 py-4 text-xs font-medium text-yellow-400 border-b border-gray-300">
                            @csrf
                            @method('DELETE')
                            <button type="submit">
                              <svg class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                              </svg>
                            </button>
                          </form>
                        </div>
                        @endforeach
                      </div>
                    </div>
                    @foreach ($clients as $client)
                    <div class="md:hidden">
                      <div class="mt-5 border-b border-gray-300 grid grid-cols-2">
                        <div>
                          <a href="{{ url('/clients/' . $client->id) }}" class="px-3 py-4 text-xs font-medium text-gray-700">
                            ID:
                          </a>
                        </div>
                        <div>
                          <a href="{{ url('/clients/' . $client->id) }}" class="px-3 py-4 text-xs font-medium text-gray-700">
                            {{ $client->id}}
                          </a>
                        </div>
                      </div>
                      <div class="border-b border-gray-300 grid grid-cols-2">
                        <div>
                          <a href="{{ url('/clients/' . $client->id) }}" class="px-5 py-4 text-xs font-medium text-gray-700">
                            Imię i nazwisko:
                          </a>
                        </div>
                        <div>
                          <a href="{{ url('/clients/' . $client->id) }}" class="px-5 py-4 text-xs font-medium text-gray-700">
                            {{ $client->first_name }} {{ $client->last_name }}
                          </a>
                        </div>
                      </div>
                      <div class="border-b border-gray-300 grid grid-cols-2">
                        <div>
                          <a href="{{ url('/clients/' . $client->id) }}" class="px-5 py-4 text-xs font-medium text-gray-700">
                            Numer telefonu:
                          </a>
                        </div>
                        <div>
                          <a href="{{ url('/clients/' . $client->id) }}" class="px-5 py-4 text-xs font-medium text-gray-700">
                            {{ $client->phone_number }}
                          </a>
                        </div>
                      </div>
                      <div class="border-b border-gray-300 grid grid-cols-2">
                        <div>
                          <a href="{{ url('/clients/' . $client->id) }}" class="px-5 py-4 text-xs font-medium text-gray-700">
                            E-mail:
                          </a>
                        </div>
                        <div>
                          <a href="{{ url('/clients/' . $client->id) }}" class="px-5 py-4 text-xs font-medium text-gray-700">
                            {{ $client->email}}
                          </a>
                        </div>
                      </div>
                      <div class="border-b border-gray-300 grid grid-cols-2">
                        <div>
                          <a href="{{ url('/clients/' . $client->id) }}" class="px-5 py-4 text-xs font-medium text-gray-700">
                            Utworzono:
                          </a>
                        </div>
                        <div>
                          <a href="{{ url('/clients/' . $client->id) }}" class="px-5 py-4 text-xs font-medium text-gray-700">
                            {{ $client->created_at }}
                          </a>
                        </div>
                      </div>
                      <div class="border-b border-gray-300 grid grid-cols-2">
                        <div>
                          <a href="{{ url('/clients/' . $client->id) }}" class="px-5 py-4 text-xs font-medium text-gray-700">
                            Zmieniono:
                          </a>
                        </div>
                        <div>
                          <a href="{{ url('/clients/' . $client->id) }}" class="px-5 py-4 text-xs font-medium text-gray-700">
                            {{ $client->updated_at }}
                          </a>
                        </div>
                      </div>
                      <div class="border-b border-gray-300 grid grid-cols-2">
                        <div>
                          <a href="{{ url('/clients/' . $client->id) }}" class="px-5 py-4 text-xs font-medium text-gray-700">
                            Firma:
                          </a>
                        </div>
                        <div>
                          <a href="{{ url('/clients/' . $client->id) }}" class="px-5 py-4 text-xs font-medium text-gray-700">
                            {{ $client->company }}
                          </a>
                        </div>
                      </div>
                      <div class="border-b border-gray-300">
                        <div>
                          <a href="{{ url('/clients/' . $client->id . '/edit') }}" class="px-5 py-4 text-xs font-medium text-yellow-400">
                            Edytuj
                          </a>
                        </div>
                      </div>
                      <div class="border-b border-gray-300">
                        <div>
                          <form method="POST" action="/clients/{{ $client->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="h-0.5 px-5 text-xs font-medium text-red-400">
                              Usuń
                            </button>
                          </form>
                        </div>
                      </div>
                    </div>
                    @endforeach
                    <div class="flex justify-center">
                      {!! $clients->links() !!}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @else
    {{ __('Brak klientów') }}
    @endisset ($clients)
  </div>
</x-app-layout>