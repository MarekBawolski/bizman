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
              <div class="flex flex-row justify-between">
                  <div class="px-8 py-2">
                      <a href="{{ url('/clients/create') }}" class="px-4 py-2 text-white duration-500 bg-blue-600 rounded hover:bg-blue-500">
                          {{ __('Dodaj nowego klienta') }}
                      </a>
                  </div>
                  <form action="/clients">
                          <div class="mb-3 xl:w-96">
                              <div class="input-group relative flex flex-row items-stretch w-full mb-4">
                                  <input type="search" name="search" class="form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                                  <button type="submit" class="btn inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out flex items-center" id="button-addon2">
                                      <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                          <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                                      </svg>
                                  </button>
                              </div>
                          </div>
                  </form>
              </div>
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
