<x-app-layout>
  
  <div class="flex flex-col justify-center min-h-screen p-20">
    <div class="container mx-auto bg-white p-4 rounded-xl border border-gray-200 w-full">
      <div class="flex flex-col xl:flex-row justify-center items-center xl:justify-between m-4">
        <div>
          <h1 class="text-3xl font-extrabold">{{ __('Edycja') . ' ' . $client->first_name . ' ' . $client->last_name }}</h1>
          @if (\Session::has('success'))
            <div class="mt-4 text-2xl text-green-500 alert alert-success">
              {!! \Session::get('success') !!}
            </div>
          @endif
        </div>
        <div>
          <button form="client_data" type="submit" class="mt-4 xl:mt-0 px-8 py-2 mx-4 text-lg text-white duration-500 bg-blue-600 rounded hover:bg-blue-500">Zapisz</button>
        </div>
      </div>
      <div class="bg-gray-100 mt-6 p-4 rounded-xl gap-10">
          <form id="client_data" method="POST" action="/clients/{{ $client->id }}" class="grow grid lg:grid-cols-2 gap-6">
            @csrf
            @method('PATCH')
            <div>
            <x-label for="first_name" :value="__('Imię')" />
            <x-input type="text" name="first_name" :value="$client->first_name" class="w-full"/>
            @error('first_name')
              <span class="text-red-700 error">{{ $message }}</span>
            @enderror
            </div>
            <div>
            <x-label for="last_name" :value="__('Nazwisko')" />
            <x-input type="text" name="last_name" :value="$client->last_name" class="w-full"/>
            @error('last_name')
              <span class="text-red-700 error">{{ $message }}</span>
            @enderror
            </div>
            <div>
            <x-label for="phone_number" :value="__('Numer telefonu')" />
            <x-input type="text" name="phone_number" :value="$client->phone_number" class="w-full"/>
            @error('phone_number')
              <span class="text-red-700 error">{{ $message }}</span>
            @enderror
            </div>
            <div>
            <x-label for="email" :value="__('Email')" />
            <x-input type="email" name="email" :value="$client->email" class="w-full"/>
            @error('email')
              <span class="text-red-700 error">{{ $message }}</span>
            @enderror
            </div>
            <div>
            <x-label for="address" :value="__('Adres')" />
            <x-input type="text" name="address" :value="$client->address" class="w-full"/>
            @error('address')
              <span class="text-red-700 error">{{ $message }}</span>
            @enderror
            </div>
            <div>
            <x-label for="city" :value="__('Miasto')" />
            <x-input type="text" name="city" :value="$client->city" class="w-full"/>
            @error('city')
              <span class="text-red-700 error">{{ $message }}</span>
            @enderror
            </div>
            <div>
            <x-label for="company" :value="__('Firma')" />
            <x-input type="text" name="company" :value="$client->company" class="w-full"/>
            @error('company')
              <span class="text-red-700 error">{{ $message }}</span>
            @enderror
            </div>
            <div>
            <x-label for="tax_id" :value="__('Regon')" />
            <x-input type="text" name="tax_id" :value="$client->tax_id" class="w-full"/>
            @error('tax_id')
              <span class="text-red-700 error">{{ $message }}</span>
            @enderror
            </div>
            <div>
            <x-label for="company_id" :value="__('NIP')" />
            <x-input type="text" name="company_id" :value="$client->company_id" class="w-full"/>
            @error('company_id')
              <span class="text-red-700 error">{{ $message }}</span>
            @enderror
            </div>
            <div>
            <x-label for="website" :value="__('Strona')" />
            <x-input type="text" name="website" :value="$client->website" class="w-full"/>
            @error('website')
              <span class="text-red-700 error">{{ $message }}</span>
            @enderror
            </div>
            <div class="lg:col-span-2">
            <x-label for="notes" :value="__('Notatki')" />
            <x-input type="text" name="notes" :value="$client->notes" class="w-full"/>
            @error('notes')
              <span class="text-red-700 error">{{ $message }}</span>
            @enderror
            </div>
          </form>
      </div>
    </div>
  </div>

</x-app-layout>