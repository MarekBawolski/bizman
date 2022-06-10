<x-app-layout>
  @if (\Session::has('success'))
    <x-toast success="success">
      {!! \Session::get('success') !!}
    </x-toast>
  @endif

  <x-containers.outer-archive title="Baza klientów" buttonStyle="primary" :buttonLink="url('/clients/create')" buttonText="Dodaj nowego klienta" searchAction="/clients">

    @isset($clients)
      <x-table.wrapper>
        <x-table.header>
          <x-table.header-row>
            <x-table.header-cell class="sticky left-0">
              ID
            </x-table.header-cell>
            <x-table.header-cell>
              Imię
            </x-table.header-cell>
            <x-table.header-cell>
              Nazwisko
            </x-table.header-cell>
            <x-table.header-cell>
              Email
            </x-table.header-cell>
            <x-table.header-cell>
              Telefon
            </x-table.header-cell>
            <x-table.header-cell>
              Firma
            </x-table.header-cell>
            <x-table.header-cell>
              Wyceny
            </x-table.header-cell>
            <x-table.header-cell>
              &nbsp;
            </x-table.header-cell>
          </x-table.header-row>
        </x-table.header>
        <x-table.body>
          @foreach ($clients as $client)
            <x-table.row>
              <x-table.cell class="sticky left-0">
                <a href="{{ url('/clients/' . $client->id) }}">
                  {{ $client->id }}
                </a>
              </x-table.cell>
              <x-table.cell>
                <a href="{{ url('/clients/' . $client->id) }}">
                  {{ $client->first_name }}
                </a>
              </x-table.cell>
              <x-table.cell>
                <a href="{{ url('/clients/' . $client->id) }}">
                  {{ $client->last_name }}
                </a>
              </x-table.cell>
              <x-table.cell>
                <a href="mailto:{{ $client->email }}">{{ $client->email }}</a>
              </x-table.cell>
              <x-table.cell>
                <a href="tel:{{ $client->phone_number }}">{{ $client->phone_number }}</a>
              </x-table.cell>
              <x-table.cell>
                {{ $client->company }}
              </x-table.cell>
              <x-table.cell>
                {{ count($client->quotes) }}
              </x-table.cell>
              <x-table.cell>
                <form method="POST" action="/clients/{{ $client->id }}">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="hover:text-red-600">
                    <svg class="text-blue-500" width="18" height="18" viewBox="0 0 24 24" stroke="currentColor">
                      <path fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  </button>
                </form>
              </x-table.cell>
            </x-table.row>
          @endforeach
        </x-table.body>
      </x-table.wrapper>

      {!! $clients->links() !!}
    @else
      {{ __('Brak klientów') }}
    @endisset ($clients)
  </x-containers.outer-archive>

</x-app-layout>
