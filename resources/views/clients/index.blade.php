<x-app-layout>

  <div class="px-16 mx-16 py-8 mt-20 border border-gray-200 rounded-[21px]">
    <div class="container mx-auto">
      @if (\Session::has('success'))
        <div class="fixed mt-4 text-sm px-8 py-4 text-white  bg-[#139b13] alert alert-success top-1 right-10 rounded-lg">
          {!! \Session::get('success') !!}
        </div>
      @endif
      <div class="flex items-center gap-4 mb-8 add-new">
        <h1 class="text-[20px] font-bold text-[#6a7c96]">{{ __('Lista klientów') }}</h1>
        <a href="{{ url('/clients/create') }}" class="flex px-8 py-2 mx-4 text-base items-center gap-4 font-bold text-white duration-500 bg-[#3B82F6] rounded-[10px] w-fit hover:bg-blue-500">
          {{ __('Dodaj klienta') }}
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M15 7H9V1C9 0.734784 8.89464 0.48043 8.70711 0.292893C8.51957 0.105357 8.26522 0 8 0C7.73478 0 7.48043 0.105357 7.29289 0.292893C7.10536 0.48043 7 0.734784 7 1V7H1C0.734784 7 0.48043 7.10536 0.292893 7.29289C0.105357 7.48043 0 7.73478 0 8C0 8.26522 0.105357 8.51957 0.292893 8.70711C0.48043 8.89464 0.734784 9 1 9H7V15C7 15.2652 7.10536 15.5196 7.29289 15.7071C7.48043 15.8946 7.73478 16 8 16C8.26522 16 8.51957 15.8946 8.70711 15.7071C8.89464 15.5196 9 15.2652 9 15V9H15C15.2652 9 15.5196 8.89464 15.7071 8.70711C15.8946 8.51957 16 8.26522 16 8C16 7.73478 15.8946 7.48043 15.7071 7.29289C15.5196 7.10536 15.2652 7 15 7Z"
              fill="currentColor" />
          </svg>
        </a>
      </div>
      @isset($clients)
        <div class="flex flex-col gap-2">
          <div class="flex gap-2 py-2 table-header">
            <span class="text-base text-[#6A7C96] w-[40px] font-bold">
              Lp.
            </span>
            <span class="text-base text-[#6A7C96] flex-auto font-bold">
              Imię i nazwisko
            </span>
            <span class="text-base text-[#6A7C96] flex-auto font-bold">
              Numer telefonu
            </span>
            <span class="text-base text-[#6A7C96] flex-auto font-bold">
              Adres e-mail
            </span>
            <span class="text-base text-[#6A7C96] flex-auto font-bold">
              Data dodania
            </span>
            <span class="text-base text-[#6A7C96] flex-auto font-bold">
              Data edycji
            </span>
            <span class="text-base text-[#6A7C96] flex-auto font-bold">
              Akcje
            </span>
          </div>
          @foreach ($clients as $client)
            <div class="grid grid-cols-6 gap-2 overflow-hidden border border-gray-200 rounded-lg">

              <div class="grid grid-cols-[40px_auto] gap-4 font-bold border-r border-gray-300 client-name">
                <div class="client-count  py-3 flex justify-center items-center text-base text-gray-700 bg-[#D5DAE1] font-bold">
                  {{ $loop->iteration }}
                </div>
                <a href="{{ url('/clients/' . $client->id) }}" class="flex items-center px-4 overflow-hidden text-sm font-bold hover:text-yellow-500 text-ellipsis">
                  {{ $client->first_name }} {{ $client->last_name }}
                </a>
              </div>
              <div class="flex items-center justify-center px-4 overflow-hidden text-sm font-bold border-r border-gray-300 text-ellipsis">
                {{ $client->phone_number }}
              </div>
              <div class="flex items-center justify-center px-4 overflow-hidden text-sm font-bold border-r border-gray-300 text-ellipsis">
                {{ $client->email }}
              </div>
              <div class="flex items-center px-4 overflow-hidden text-sm font-bold border-r border-gray-300 text-ellipsis">
                {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $client->created_at)->format('Y-m-d') }}
              </div>
              <div class="flex items-center px-4 overflow-hidden text-sm font-bold border-r border-gray-300 text-ellipsis">
                {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $client->updated_at)->format('Y-m-d') }}
              </div>
              <div class="flex items-center gap-4 px-4 overflow-hidden text-sm font-bold border-r border-gray-300 text-ellipsis">

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
            </div>
          @endforeach
        </div>
      @else
        {{ __('Break klientów') }}
      @endisset ($clients)
    </div>

    <div class="flex justify-center gap-4 mt-8">
      {!! $clients->links() !!}
    </div>
  </div>
</x-app-layout>
