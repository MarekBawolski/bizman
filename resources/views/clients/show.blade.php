<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Klient') }}
    </h2>
  </x-slot>

  <div class="container mx-auto bg-white m-4 p-4 rounded-xl border border-gray-200">

    <div class="sm:flex justify-between m-4">
      <div>
        @isset($client)
          <h1 class="text-3xl font-extrabold">{{ $client->first_name }} {{ $client->last_name }}</h1>
        @endisset ($client)
      </div>
      <div>
        <button type="submit" class="mt-4 sm:mt-0 px-8 py-2 mx-4 text-lg text-white duration-500 bg-blue-600 rounded hover:bg-blue-500">Edycja</button>
      </div>
    </div>

    <div class="sm:flex bg-gray-100 mt-6 p-4 rounded-xl">
      <div class="sm:w-1/2 grid lg:grid-cols-2 gap-4">
        <div>
        <x-label for="first_name" :value="__('Imię')" />
        <x-input type="text" name="first_name" :value="old('first_name', $client->first_name)" class="bg-gray-100" disabled />
        @error('first_name')
          <span class="text-red-700 error">{{ $message }}</span>
        @enderror
        </div>
        <div>
        <x-label for="last_name" :value="__('Nazwisko')" />
        <x-input type="text" name="last_name" :value="$client->last_name" class="bg-gray-100" disabled />
        @error('last_name')
          <span class="text-red-700 error">{{ $message }}</span>
        @enderror
        </div>
        <div>
        <x-label for="phone_number" :value="__('Numer telefonu')" />
        <x-input type="text" name="phone_number" :value="$client->phone_number" class="bg-gray-100" disabled />
        @error('phone_number')
          <span class="text-red-700 error">{{ $message }}</span>
        @enderror
        </div>
        <div>
        <x-label for="email" :value="__('Email')" />
        <x-input type="email" name="email" :value="$client->email" class="bg-gray-100" disabled />
        @error('email')
          <span class="text-red-700 error">{{ $message }}</span>
        @enderror
        </div>
        <div>
        <x-label for="address" :value="__('Adres')" />
        <x-input type="text" name="address" :value="$client->address" class="bg-gray-100" disabled />
        @error('address')
          <span class="text-red-700 error">{{ $message }}</span>
        @enderror
        </div>
        <div>
        <x-label for="city" :value="__('Miasto')" />
        <x-input type="text" name="city" :value="$client->city" class="bg-gray-100" disabled />
        @error('city')
          <span class="text-red-700 error">{{ $message }}</span>
        @enderror
        </div>
        <div>
        <x-label for="company" :value="__('Firma')" />
        <x-input type="text" name="company" :value="$client->company" class="bg-gray-100" disabled />
        @error('company')
          <span class="text-red-700 error">{{ $message }}</span>
        @enderror
        </div>
        <div>
        <x-label for="tax_id" :value="__('Regon')" />
        <x-input type="text" name="tax_id" :value="$client->tax_id" class="bg-gray-100" disabled />
        @error('tax_id')
          <span class="text-red-700 error">{{ $message }}</span>
        @enderror
        </div>
        <div>
        <x-label for="company_id" :value="__('NIP')" />
        <x-input type="text" name="company_id" :value="$client->company_id" class="bg-gray-100" disabled />
        @error('company_id')
          <span class="text-red-700 error">{{ $message }}</span>
        @enderror
        </div>
        <div>
        <x-label for="website" :value="__('Strona')" />
        <x-input type="text" name="website" :value="$client->website" class="bg-gray-100" disabled />
        @error('website')
          <span class="text-red-700 error">{{ $message }}</span>
        @enderror
        </div>
        <div>
        <x-label for="notes" :value="__('Notatki')" />
        <x-input type="text" name="notes" :value="$client->notes" class="bg-gray-100" disabled />
        @error('notes')
          <span class="text-red-700 error">{{ $message }}</span>
        @enderror
        </div>
      </div>
      <div class="sm:w-1/2 bg-white p-4 rounded-xl mt-4 sm:mt-0 h-96 overflow-auto"">
        <h2 class="my-4 text-xl font-bold">Wyceny:</h2>

        @if (count($quotes) > 0)
          <ul class="flex flex-col gap-4">
            @foreach ($quotes as $quote)
              <li class="">
                <a class="block px-8 py-4 bg-white rounded-md hover:bg-green-100" href="">
                  {{ $quote->name }}

                </a>
              </li>
            @endforeach
          </ul>
        @else
          <div class="empty">
            {{ __('Brak wycen') }}
          </div>
        @endif ($quotes)
      </div>    
    </div>
  </div>

</x-app-layout>