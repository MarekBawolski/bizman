<x-app-layout>
  @if (\Session::has('success'))
    <x-toast success="success">
      {!! \Session::get('success') !!}
    </x-toast>
  @endif
  <x-containers.outer-archive title="Wycenione elementy" buttonStyle="primary" :buttonLink="url('/priceditems/create')" buttonText="Dodaj nowy element" searchAction="/priceditems">
    @isset($items)
      <x-table.wrapper>
        <x-table.header>
          <x-table.header-row>
            <x-table.header-cell class="sticky left-0">
              ID
            </x-table.header-cell>
            <x-table.header-cell>
              Tytuł
            </x-table.header-cell>
            <x-table.header-cell>
              Rodzaj prac
            </x-table.header-cell>
            <x-table.header-cell>
              Godziny
            </x-table.header-cell>
            <x-table.header-cell>
               &nbsp;
            </x-table.header-cell>
          </x-table.header-row>
        </x-table.header>
        <x-table.body>
          @foreach ($items as $item)
            <x-table.row>
              <x-table.cell class="sticky left-0">
                <a href="{{ url('/priceditems/' . $item->id) }}">
                  {{ $item->id }}
                </a>
              </x-table.cell>
              <x-table.cell>
                <a href="{{ url('/priceditems/' . $item->id) }}">
                  {{ $item->title }}
                </a>
              </x-table.cell>
              <x-table.cell>
                 <span title="{{  $item->jobType->type }}"> {{ $item->jobType->abbreviation }}</span>
              </x-table.cell>
              <x-table.cell>
                {{ $item->work_hours }}
              </x-table.cell>
              <x-table.cell>
                <form method="POST" action="/priceditems/{{ $item->id }}">
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
      {!! $items->links() !!}
    @endisset
  </x-containers.outer-archive>
</x-app-layout>
