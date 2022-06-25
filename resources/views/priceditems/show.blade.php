<x-app-layout>
  @if (\Session::has('success'))
    <x-toast success="success">
      {!! \Session::get('success') !!}
    </x-toast>
  @endif
  <x-containers.outer title="Element: {{ $pricedItem->id }}" buttonStyle="secondary" :buttonLink="url('/priceditems/' . $pricedItem->id . '/edit')" buttonText="Edycja">
      <x-containers.inner title="">
        <div class="grid grid-cols-2 gap-4">
          <x-inputs.text name="title" :value="$pricedItem->title" labelClass="col-span-2" :disabled="true" label="Tytuł" />
          <x-inputs.text name="title" :value="$pricedItem->work_hours" :disabled="true" label="Godziny" />
          <x-inputs.text name="title"  :value="$pricedItem->jobType->type" :disabled="true" label="Rodzaj pracy" />

          <x-inputs.textarea name="notes" :value="$pricedItem->content" class="col-span-2" :disabled="true" label="Treść" />
          <x-inputs.hidden name="created_at" :value="\Carbon\Carbon::parse($pricedItem->created_at)->format('d.m.Y - H:m:s')" :disabled="true" label="Data dodania" />
          <x-inputs.hidden name="updated_at" :value="\Carbon\Carbon::parse($pricedItem->updated_at)->format('d.m.Y - H:m:s')" :disabled="true" label="Ostatnia aktualizacja" />
        </div>
      </x-containers.inner>


  </x-containers.outer>


</x-app-layout>
