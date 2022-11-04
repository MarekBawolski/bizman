<x-app-layout>
  @if (\Session::has('success'))
    <x-toast success="success">
      {!! \Session::get('success') !!}
    </x-toast>
  @endif
  <x-containers.outer title="{{ $quote->name }}" buttonStyle="secondary" :buttonLink="url('/quotes/' . $quote->id . '/edit')" buttonText="Edycja">
    <div class="grid grid-cols-2 gap-16">
      <x-containers.inner title="Elementy wyceny">

        <div class="px-6 py-6 bg-white max-h-[600px] overflow-auto">
          @foreach ($quote->pricedItems as $item)
            <div class="priced-item bg-[#F2F2F2] px-6 py-6 rounded-lg mb-4 ">
              <div class="grid grid-cols-[auto_50px]">
                <div class="flex flex-col">
                  <div class="mb-2 font-semibold title"> {{ $item->title }}</div>
                  <div class="content">
                    {{ $item->content }}
                  </div>
                </div>
                <div class="flex flex-col items-center gap-2 border-l border-gray-300 job">
                  <div class="font-bold text-center uppercase abb" title="{{ $item->jobType->type }}">
                    {{ $item->jobType->abbreviation }}
                  </div>
                  <div class="text-center hours">
                    {{ $item->work_hours }}
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </x-containers.inner>


      <x-containers.inner title="Estymacja czasowa">
        <div class="grid grid-cols-[auto_auto_auto_140px]">
          <x-titles.text>Przewidywany czas</x-titles.text>
          <x-titles.text>Dodatkowy czas</x-titles.text>
          <x-titles.text>Stawka</x-titles.text>
          <x-titles.text>Suma</x-titles.text>

        </div>
        <div class="grid grid-cols-[auto_auto_auto_140px] gap-4">


          @if ($jobtypes)
            @foreach ($jobtypes as $job)
              <x-inputs.text placeholder="Czas" name="" :prefix="$job->abbreviation" inputClass="bg-gray-50 opacity-80" :disabled="true" />
              <x-inputs.text placeholder="Czas" name="" suffix="h" />

              <x-inputs.text placeholder="Stawka" name="" suffix="zł" />
              <x-inputs.text placeholder="Suma" name="" />
            @endforeach
          @endif




        </div>
        <x-buttons.primary><a href="{{ url('/quotes/' . $quote->id . '/pdf') }}" class="">PDF</a></x-buttons.primary>
      </x-containers.inner>
    </div>

  </x-containers.outer>


</x-app-layout>
