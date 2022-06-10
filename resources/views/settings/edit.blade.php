<x-app-layout>
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" />

  <x-containers.outer title="Ustawienia">

    <x-containers.inner title="Statusy wycen">
      @if ($quote_states)
        @foreach ($quote_states as $state)
          <div class="mb-2 state-wrapper ">
            <input placeholder="Nazwa statusu" type="text" class="w-full bg-white border-gray-200 rounded-lg" value="{{ $state->state }}" disabled>
          </div>
        @endforeach
      @else
        <div class="mb-2 no-states ">
          Brak dodanych statusów
        </div>
      @endif
      <x-buttons.primary id="new_quote_status">
        Dodaj nowy
        <x-icons.add />
      </x-buttons.primary>
    </x-containers.inner>

    <x-containers.inner title="Rodzaje wykonywanych prac">
      @if ($job_types)
        <div class="grid grid-cols-2 gap-8 mb-2 state-wrapper">
          <x-titles.text>Nazwa</x-titles.text>
          <x-titles.text>Skrót</x-titles.text>
        </div>
        @foreach ($job_types as $job)
          <div class="grid grid-cols-2 gap-8 mb-2 state-wrapper">
            <x-inputs.text placeholder="Nazwa" name="jobs[{{ $job->id }}][type]" :value="$job->type" :disabled="true" />
            <x-inputs.text placeholder="Nazwa" name="jobs[{{ $job->id }}][abbreviation]" :value="$job->abbreviation" :disabled="true" />
          </div>
        @endforeach
      @else
        <div class="mb-2 no-states ">
          Brak dodanych wartości
        </div>
      @endif

      <x-buttons.primary id="new_job_type">
        Dodaj nowy
        <x-icons.add />
      </x-buttons.primary>

    </x-containers.inner>
  </x-containers.outer>




  @dump($quote_states)


  @dump($job_types)


</x-app-layout>
