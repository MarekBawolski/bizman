<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Dodawanie klientów') }}
    </h2>
  </x-slot>
  <div class="container mx-auto mt-10">
    <h1 class="text-2xl font-bold">{{ __('Edycja') . ' ' . $client->first_name . ' ' . $client->last_name }}</h1>
    @if (\Session::has('success'))
      <div class="mt-4 text-2xl text-green-500 alert alert-success">
        {!! \Session::get('success') !!}
      </div>
    @endif
    <form method="POST" action="/clients/{{ $client->id }}" class="flex flex-col gap-2 mt-10 ">
      @csrf
      @method('PATCH')
      <x-label for="first_name" :value="__('Imię')" />
      <x-input type="text" name="first_name" :value="$client->first_name" />
      @error('first_name')
        <span class="text-red-700 error">{{ $message }}</span>
      @enderror
      <x-label for="last_name" :value="__('Nazwisko')" />
      <x-input type="text" name="last_name" :value="$client->last_name" />
      @error('last_name')
        <span class="text-red-700 error">{{ $message }}</span>
      @enderror
      <x-label for="phone_number" :value="__('Numer telefonu')" />
      <x-input type="text" name="phone_number" :value="$client->phone_number" />
      @error('phone_number')
        <span class="text-red-700 error">{{ $message }}</span>
      @enderror
      <x-label for="email" :value="__('Email')" />
      <x-input type="email" name="email" :value="$client->email" />
      @error('email')
        <span class="text-red-700 error">{{ $message }}</span>
      @enderror
      <x-label for="address" :value="__('Adres')" />
      <x-input type="text" name="address" :value="$client->address" />
      @error('address')
        <span class="text-red-700 error">{{ $message }}</span>
      @enderror
      <x-label for="city" :value="__('Miasto')" />
      <x-input type="text" name="city" :value="$client->city" />
      @error('city')
        <span class="text-red-700 error">{{ $message }}</span>
      @enderror
      <x-label for="company" :value="__('Firma')" />
      <x-input type="text" name="company" :value="$client->company" />
      @error('company')
        <span class="text-red-700 error">{{ $message }}</span>
      @enderror
      <x-label for="tax_id" :value="__('Regon')" />
      <x-input type="text" name="tax_id" :value="$client->tax_id" />
      @error('tax_id')
        <span class="text-red-700 error">{{ $message }}</span>
      @enderror
      <x-label for="company_id" :value="__('NIP')" />
      <x-input type="text" name="company_id" :value="$client->company_id" />
      @error('company_id')
        <span class="text-red-700 error">{{ $message }}</span>
      @enderror
      <x-label for="website" :value="__('Strona')" />
      <x-input type="text" name="website" :value="$client->website" />
      @error('website')
        <span class="text-red-700 error">{{ $message }}</span>
      @enderror
      <x-label for="notes" :value="__('Notatki')" />
      <x-input type="text" name="notes" :value="$client->notes" />
      @error('notes')
        <span class="text-red-700 error">{{ $message }}</span>
      @enderror

      <button type="submit" class="px-4 py-2 mx-4 text-lg text-white duration-500 bg-blue-600 rounded hover:bg-blue-500">Zapisz</button>
    </form>
  </div>
</x-app-layout>
