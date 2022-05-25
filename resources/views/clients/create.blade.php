<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Dodawanie klientów') }}
    </h2>
  </x-slot>
  <form method="POST" action="/clients" class="container flex flex-col gap-2 mx-auto mt-20">
    @csrf

    <x-label for="first_name" :value="__('Imię')" />
    <x-input type="text" name="first_name" :value="old('first_name')" />
    @error('first_name')
      <span class="text-red-700 error">{{ $message }}</span>
    @enderror
    <x-label for="last_name" :value="__('Nazwisko')" />
    <x-input type="text" name="last_name" :value="old('last_name')" />
    @error('last_name')
      <span class="text-red-700 error">{{ $message }}</span>
    @enderror
    <x-label for="phone_number" :value="__('Numer telefonu')" />
    <x-input type="text" name="phone_number" :value="old('phone_number')" />
    @error('phone_number')
      <span class="text-red-700 error">{{ $message }}</span>
    @enderror
    <x-label for="email" :value="__('Email')" />
    <x-input type="email" name="email" :value="old('email')" />
    @error('email')
      <span class="text-red-700 error">{{ $message }}</span>
    @enderror
    <x-label for="address" :value="__('Adres')" />
    <x-input type="text" name="address" :value="old('address')" />
    @error('address')
      <span class="text-red-700 error">{{ $message }}</span>
    @enderror
    <x-label for="city" :value="__('Miasto')" />
    <x-input type="text" name="city" :value="old('city')" />
    @error('city')
      <span class="text-red-700 error">{{ $message }}</span>
    @enderror
    <x-label for="company" :value="__('Firma')" />
    <x-input type="text" name="company" :value="old('company')" />
    @error('company')
      <span class="text-red-700 error">{{ $message }}</span>
    @enderror
    <x-label for="tax_id" :value="__('Regon')" />
    <x-input type="text" name="tax_id" :value="old('tax_id')" />
    @error('tax_id')
      <span class="text-red-700 error">{{ $message }}</span>
    @enderror
    <x-label for="company_id" :value="__('NIP')" />
    <x-input type="text" name="company_id" :value="old('company_id')" />
    @error('company_id')
      <span class="text-red-700 error">{{ $message }}</span>
    @enderror
    <x-label for="website" :value="__('Strona')" />
    <x-input type="text" name="website" :value="old('website')" />
    @error('website')
      <span class="text-red-700 error">{{ $message }}</span>
    @enderror
    <x-label for="notes" :value="__('Notatki')" />
    <x-input type="textarea" name="notes" :value="old('notes')" />
    @error('notes')
      <span class="text-red-700 error">{{ $message }}</span>
    @enderror

    <button type="submit" class="px-4 py-2 mx-4 text-lg text-white duration-500 bg-blue-600 rounded hover:bg-blue-500">Zapisz</button>
  </form>
</x-app-layout>
