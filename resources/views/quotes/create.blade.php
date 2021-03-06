<x-app-layout>

  @if (\Session::has('success'))
    <x-toast success="success">
      {!! \Session::get('success') !!}
    </x-toast>
  @endif

  <form method="POST" action="/quotes">
    @csrf
    <x-containers.outer title="Nowa wycena" buttonStyle="primary" buttonType="submit" buttonText="Dodaj">
      <x-containers.inner title="Dane wyceny">

        <x-inputs.text name="name" :value="old('name')" label="Tytuł">
          @error('name')
            <span class="text-xs text-red-700">{{ $message }}</span>
          @enderror
        </x-inputs.text>


        <x-label for="status_id" :value="__('Status')" />
        <select name="status_id" id="status_id">
          <option value="" {{ !old('status_id') ? 'selected' : '' }}>{{ __('Wybierz status') }}</option>
          @foreach ($states as $state)
            <option value="{{ $state->id }}" {{ old('status_id') == $state->id ? 'selected' : '' }}>
              {{ $state->state }}</option>
          @endforeach
        </select>
        @error('status_id')
          <span class="text-red-700 error">{{ $message }}</span>
        @enderror


        <x-label for="client_id" :value="__('Klient')" />
        <select name="client_id" id="client_id">
          <option value="" {{ !old('client_id') ? 'selected' : '' }}>{{ __('Wybierz klienta') }}</option>
          @foreach ($clients as $client)
            <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>{{ $client->first_name }} {{ $client->last_name }}</option>
          @endforeach
        </select>
        @error('client_id')
          <span class="text-red-700 error">{{ $message }}</span>
        @enderror


        <x-inputs.textarea name="notes" :value="old('notes')" class="col-span-2" label="Notatki">
          @error('notes')
            <span class="text-xs text-red-700">{{ $message }}</span>
          @enderror
        </x-inputs.textarea>
      </x-containers.inner>


      <div class="grid grid-cols-2 gap-16">


        <x-containers.inner title="Elementy wyceny">
          <div class="max-h-[600px] h-full overflow-auto bg-white rounded-lg px-6 py-6  gap-4 flex flex-col">

          </div>
        </x-containers.inner>


        <x-containers.inner title="Wycenione elementy">
          <div class="max-h-[600px] overflow-auto bg-white rounded-lg px-6 py-6  gap-4 flex flex-col">
            @foreach ($priced_items as $item)
              <div class="priced-item-wrapper grid grid-cols-[50px_auto_100px] bg-gray-100  rounded-lg gap-4 py-4">
                <div class="flex flex-col items-center justify-center add-to-quote">
                  <span class="cursor-pointer btn-primary">+</span>
                </div>
                <div class="pl-4 item">
                  <div class="mb-2 font-semibold title"> {{ $item->title }}</div>
                  <div class="text-sm content"> {{ $item->content }}</div>
                </div>
                <div class="flex flex-col items-center justify-center border-l border-gray-300 job">
                  <span class="font-semibold uppercase">{{ $item->jobType->abbreviation }}</span>
                  <span>{{ $item->work_hours }}</span>
                </div>
              </div>
            @endforeach
          </div>
        </x-containers.inner>
      </div>
    </x-containers.outer>
  </form>
</x-app-layout>
