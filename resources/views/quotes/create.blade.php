<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Dodawanie wycen') }}
    </h2>
  </x-slot>
  <form method="POST" action="/quotes" class="container flex flex-col gap-2 mx-auto mt-20">
    @csrf
    <x-label for="name" :value="__('Nazwa')" />
    <x-input type="text" name="name" :value="old('name')" />
    @error('name')
      <span class="text-red-700 error">{{ $message }}</span>
    @enderror

    <x-label for="quote_elements" :value="__('Wycenione elementy')" />
    <select name="quote_elements[]" id="quote_elements" multiple>
      @foreach ($priced_items as $priced_item)
        <option value="{{ $priced_item->id }}" @if (!empty(old('quote_elements')) && in_array($priced_item->id, old('quote_elements'))) {{ 'selected' }} @endif>{{ $priced_item->title }} ({{ $priced_item->work_hours }} rh - {{ $priced_item->jobType->abbreviation }})</option>
      @endforeach
    </select>
    @error('quote_elements')
      <span class="text-red-700 error">{{ $message }}</span>
    @enderror

    <x-label for="status_id" :value="__('Status')" />
    <select name="status_id" id="status_id">
      <option value="" @if (!old('status_id')) {{ 'selected' }} @endif>{{ __('Wybierz status') }}</option>
      @foreach ($states as $state)
        <option value="{{ $state->id }}" @if (old('status_id') == $state->id) {{ 'selected' }} @endif>{{ $state->state }}</option>
      @endforeach
    </select>
    @error('status_id')
      <span class="text-red-700 error">{{ $message }}</span>
    @enderror

    <x-label for="client_id" :value="__('Klient')" />
    <select name="client_id" id="client_id">
      <option value="" @if (!old('client_id')) {{ 'selected' }} @endif>{{ __('Wybierz klienta') }}</option>
      @foreach ($clients as $client)
        <option value="{{ $client->id }}" @if (old('client_id') == $client->id) {{ 'selected' }} @endif>{{ $client->first_name }} {{ $client->last_name }}</option>
      @endforeach
    </select>
    @error('client_id')
      <span class="text-red-700 error">{{ $message }}</span>
    @enderror

    <x-label for="calculate" :value="__('Kalkulator')" />
    <textarea name="calculate" id="calculate">

    </textarea>
    @error('calculate')
      <span class="text-red-700 error">{{ $message }}</span>
    @enderror

    <x-label for="notes" :value="__('Uwagi')" />
    <textarea name="notes" id="notes">

    </textarea>
    @error('notes')
      <span class="text-red-700 error">{{ $message }}</span>
    @enderror

    <button type="submit" class="px-4 py-2 mx-4 text-lg text-white duration-500 bg-blue-600 rounded hover:bg-blue-500">Zapisz</button>
  </form>
</x-app-layout>
