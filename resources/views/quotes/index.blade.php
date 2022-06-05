<x-app-layout>
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" />
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Wyceny') }}
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
            <a href="{{ url('/quotes/create') }}" class="mt-4 xl:mt-0 px-8 py-2 mx-4 text-lg text-white duration-500 bg-blue-600 rounded hover:bg-blue-500">
              {{ __('Dodaj nową wycenę') }}
            </a>
            @isset($quotes)
            <div class="flex flex-col">
              <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-5 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                  <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg text-center">
                    <div class="table min-w-min">
                      <div class="table-header-group -50 text-center border-b border-gray-200 bg-gray-300">
                        <div class="table-row">
                          <div scope="col" class="table-cell px-3 py-4 text-xs font-medium text-gray-700 bg-gray-300">
                            Id
                          </div>
                          <div scope="col" class="table-cell px-5 py-4 text-xs font-medium text-gray-700 border-b border-gray-300">
                            Nazwa
                          </div>
                          <div scope="col" class="table-cell px-5 py-4 text-xs font-medium text-gray-700 border-b border-gray-300">
                            Imię i nazwisko
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
                        @foreach ($quotes as $quote)
                        <div class="table-row transition duration-300 ease-in-out hover:bg-gray-200">
                          <a href="{{ url('/quotes/' . $quote->id) }}" class="table-cell px-3 py-4 text-xs font-medium text-gray-700 bg-gray-300">
                            {{ $quote->id }}
                          </a>
                          <a href="{{ url('/quotes/' . $quote->id) }}" class="table-cell px-5 py-4 text-xs font-medium text-gray-700 border-b border-gray-300">
                            {{ $quote->name }}
                          </a>
                          <a href="{{ url('/quotes/' . $quote->id) }}" class="table-cell px-5 py-4 text-xs font-medium text-gray-700 border-b border-gray-300">
                            {{ $quote->client->first_name }}
                            {{ $quote->client->last_name }}
                          </a>
                          <a href="{{ url('/quotes/' . $quote->id . '/edit') }}" class="table-cell px-5 py-4 text-xs font-medium text-yellow-400 border-b border-gray-300">
                            <svg class="h-8 w-8 text-blue-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" />
                              <path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                              <circle cx="12" cy="12" r="3" />
                            </svg>
                          </a>
                          <form method="POST" action="/quotes/{{ $quote->id }}" class="table-cell px-5 py-4 text-xs font-medium text-yellow-400 border-b border-gray-300">
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
                    <div class="flex justify-center mt-8">
                      {!! $quotes->links() !!}
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
    {{ __('Brak wycen') }}
    @endisset ($quotes)
  </div>


</x-app-layout>