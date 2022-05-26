<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Klient') }}
    </h2>
  </x-slot>

  <div class="container mx-auto">

    <div class="flex flex-col gap-2">
      <x-label for="first_name" :value="__('Imię')" />
      <x-input type="text" name="first_name" :value="old('first_name', $client->first_name)" disabled />
      @error('first_name')
        <span class="text-red-700 error">{{ $message }}</span>
      @enderror
      <x-label for="last_name" :value="__('Nazwisko')" />
      <x-input type="text" name="last_name" :value="$client->last_name" disabled />
      @error('last_name')
        <span class="text-red-700 error">{{ $message }}</span>
      @enderror
      <x-label for="phone_number" :value="__('Numer telefonu')" />
      <x-input type="text" name="phone_number" :value="$client->phone_number" disabled />
      @error('phone_number')
        <span class="text-red-700 error">{{ $message }}</span>
      @enderror
      <x-label for="email" :value="__('Email')" />
      <x-input type="email" name="email" :value="$client->email" disabled />
      @error('email')
        <span class="text-red-700 error">{{ $message }}</span>
      @enderror
      <x-label for="address" :value="__('Adres')" />
      <x-input type="text" name="address" :value="$client->address" disabled />
      @error('address')
        <span class="text-red-700 error">{{ $message }}</span>
      @enderror
      <x-label for="city" :value="__('Miasto')" />
      <x-input type="text" name="city" :value="$client->city" disabled />
      @error('city')
        <span class="text-red-700 error">{{ $message }}</span>
      @enderror
      <x-label for="company" :value="__('Firma')" />
      <x-input type="text" name="company" :value="$client->company" disabled />
      @error('company')
        <span class="text-red-700 error">{{ $message }}</span>
      @enderror
      <x-label for="tax_id" :value="__('Regon')" />
      <x-input type="text" name="tax_id" :value="$client->tax_id" disabled />
      @error('tax_id')
        <span class="text-red-700 error">{{ $message }}</span>
      @enderror
      <x-label for="company_id" :value="__('NIP')" />
      <x-input type="text" name="company_id" :value="$client->company_id" disabled />
      @error('company_id')
        <span class="text-red-700 error">{{ $message }}</span>
      @enderror
      <x-label for="website" :value="__('Strona')" />
      <x-input type="text" name="website" :value="$client->website" disabled />
      @error('website')
        <span class="text-red-700 error">{{ $message }}</span>
      @enderror
      <x-label for="notes" :value="__('Notatki')" />
      <x-input type="text" name="notes" :value="$client->notes" disabled />
      @error('notes')
        <span class="text-red-700 error">{{ $message }}</span>
      @enderror
    </div>


    @isset($quotes)
      <h2>Quotes:</h2>
      <ul>
        @foreach ($quotes as $quote)
          <li>
            Quote name: {{ $quote->name }}
            @if ($quote->quote_elements)
              <ul>
                @foreach (json_decode($quote->quote_elements) as $quote_element_id)
                  <li>
                    {{ $quote_element_id }}
                  </li>
                @endforeach
              </ul>
            @endif
          </li>
        @endforeach
      </ul>
    @endisset ($client)
  </div>
</x-app-layout>
