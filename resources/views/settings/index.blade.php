<x-app-layout>

  <x-containers.outer title="Ustawienia" buttonStyle="secondary" buttonText="Edycja">

    <x-containers.inner title="Statusy wycen">
      @if ($quote_states)
        @foreach ($quote_states as $state)
          <div class="mb-2 state-wrapper gap-4 grid grid-cols-[auto_150px]">
            <x-inputs.text placeholder="Nazwa statusu" name="states[{{ $state->id }}][state]" :value="$state->state" :disabled="true" />
            @php
              $suffix = '<span class="block w-6 h-6" style="background-color:' . $state->color . ';"></span>';
            @endphp
            <x-inputs.text placeholder="Nazwa statusu" name="states[{{ $state->id }}][state]" :value="$state->color" :disabled="true" :suffix="$suffix" />
          </div>
        @endforeach
      @else
        <div class="mb-2 no-states ">
          Brak dodanych statusów
        </div>
      @endif
      <x-buttons.primary class="mx-auto" id="new_quote_status">
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

      <x-buttons.primary class="mx-auto" id="new_job_type">
        Dodaj nowy
        <x-icons.add />
      </x-buttons.primary>

    </x-containers.inner>
  </x-containers.outer>

</x-app-layout>
