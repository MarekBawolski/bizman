<x-app-layout>

<script src="{{ asset('/js/jscolor.js') }} "></script>
  @dump($errors)

  @if (\Session::has('success'))
    <x-toast success="success">
      {!! \Session::get('success') !!}
    </x-toast>
  @endif
  <form id="settings_data" method="POST" action="/user/settings">
    @csrf
    @method('PATCH')
    <x-containers.outer title="Ustawienia" buttonStyle="primary" buttonType="submit" buttonText="Zapsiz zmiany">

      <x-containers.inner title="Statusy wycen">
        <span id="quote_states_wrapper">

          <div class="mb-2  gap-4 grid grid-cols-[auto_180px_50px]">
            <x-titles.text>Nazwa</x-titles.text>
            <x-titles.text>Kolor</x-titles.text>
            <x-titles.text>&nbsp;</x-titles.text>
          </div>
          @if ($quote_states->isNotEmpty())
            @foreach ($quote_states as $state)
              @php
                $suffix = '<span class="block w-6 h-6" style="background-color:' . $state->color . ';"></span>';
              @endphp
              <div class="mb-2 state-wrapper gap-4 grid grid-cols-[auto_180px_50px]">
                <x-inputs.text class="quote-state" placeholder="Nazwa statusu" name="states[{{ $loop->iteration }}][state]" :value="$state->state" :errorKey="'states.' . $loop->iteration . '.state'" />
                <x-inputs.text class="quote-color" placeholder="Nazwa statusu" name="states[{{ $loop->iteration }}][color]" :value="$state->color" :suffix="$suffix" :errorKey="'states.' . $loop->iteration . '.color'" data-jscolor="{}"/>
                <x-inputs.hidden name="states[{{ $loop->iteration }}][id]" :value="$state->id" />
                <x-buttons.delete class="h-full px-3 mx-auto text-sm reverse delete-quote-state" data-quotestate_id="{{ $state->id }}">
                  Usuń
                </x-buttons.delete>
              </div>
            @endforeach
          @else
          @endif
          {{-- <div class="mb-2 state-wrapper gap-4 grid grid-cols-[auto_150px]">
            <x-inputs.text placeholder="Nazwa statusu" name="states[6][state]" value="dupa" />
            <x-inputs.text placeholder="Nazwa statusu" name="states[6][color]" value="#fff" />
          </div> --}}
          {{-- <x-inputs.text placeholder="ID statusu do usunięcia" name="delete[states][]" value="" />
          <x-inputs.text placeholder="ID statusu do usunięcia" name="delete[states][]" value="" /> --}}
        </span>

        <x-buttons.primary class="mx-auto" id="new_quote_status">
          Dodaj nowy
          <x-icons.add />
        </x-buttons.primary>
      </x-containers.inner>

      <x-containers.inner title="Rodzaje wykonywanych prac">
        @if ($job_types->isNotEmpty())
          <div class="grid grid-cols-[auto_180px_50px] gap-4 mb-2 ">
            <x-titles.text>Nazwa</x-titles.text>
            <x-titles.text>Skrót</x-titles.text>
            <x-titles.text>&nbsp;</x-titles.text>

          </div>
          @foreach ($job_types as $job)
            <div class="grid grid-cols-[auto_180px_50px] gap-4 mb-2 " data-jobtype_id="{{ $job->id }}">
              <x-inputs.text class="job-name" placeholder="Nazwa" name="jobtypes[{{ $loop->iteration }}][type]" :value="$job->type" :errorKey="'jobtypes.' . $loop->iteration . '.type'" />
              <x-inputs.text class="job-handle" placeholder="Nazwa" name="jobtypes[{{ $loop->iteration }}][abbreviation]" :value="$job->abbreviation" :errorKey="'jobtypes.' . $loop->iteration . '.abbreviation'" />
              <x-inputs.hidden name="jobtypes[{{ $loop->iteration }}][id]" :value="$job->id" />
              <x-buttons.delete class="h-full px-3 mx-auto text-sm reverse" data-state_id="{{ $job->id }}">
                Usuń
              </x-buttons.delete>
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
  </form>

</x-app-layout>
