<x-app-layout>
  @if (\Session::has('success'))
    <x-toast success="success">
      {!! \Session::get('success') !!}
    </x-toast>
  @endif
  <form id="client_data" method="POST" action="/clients">
    <x-containers.outer title="Nowy klient" buttonStyle="primary" buttonType="submit" buttonText="Dodaj">
      <x-containers.inner title="Dane klienta">
        @csrf
        <div class="grid grid-cols-2 gap-4">
          <x-inputs.text name="first_name" :value="old('first_name')" label="Imię">
            @error('first_name')
              <span class="text-xs text-red-700">{{ $message }}</span>
            @enderror
          </x-inputs.text>
          <x-inputs.text name="last_name" :value="old('last_name')" label="Nazwisko">
            @error('last_name')
              <span class="text-xs text-red-700">{{ $message }}</span>
            @enderror
          </x-inputs.text>
          <x-inputs.tel name="phone_number" :value="old('phone_number')" label="Numer telefonu">
            @error('phone_number')
              <span class="text-xs text-red-700">{{ $message }}</span>
            @enderror
          </x-inputs.tel>
          <x-inputs.email name="email" :value="old('email')" label="Adres email">
            @error('email')
              <span class="text-xs text-red-700">{{ $message }}</span>
            @enderror
          </x-inputs.email>
          <x-inputs.text name="address" :value="old('address')" label="Adres">
            @error('address')
              <span class="text-xs text-red-700">{{ $message }}</span>
            @enderror
          </x-inputs.text>
          <x-inputs.text name="city" :value="old('city')" label="Miasto">
            @error('city')
              <span class="text-xs text-red-700">{{ $message }}</span>
            @enderror
          </x-inputs.text>
          <x-inputs.text name="company" :value="old('company')" label="Firma">
            @error('company')
              <span class="text-xs text-red-700">{{ $message }}</span>
            @enderror
          </x-inputs.text>
          <x-inputs.text name="tax_id" :value="old('tax_id')" label="Regon">
            @error('tax_id')
              <span class="text-xs text-red-700">{{ $message }}</span>
            @enderror
          </x-inputs.text>
          <x-inputs.text name="company_id" :value="old('company_id')" label="NIP">
            @error('company_id')
              <span class="text-xs text-red-700">{{ $message }}</span>
            @enderror
          </x-inputs.text>
          <x-inputs.text name="website" :value="old('website')" label="Strona">
            @error('website')
              <span class="text-xs text-red-700">{{ $message }}</span>
            @enderror
          </x-inputs.text>
          <x-inputs.textarea name="notes" :value="old('notes')" class="col-span-2" label="Notatki">
            @error('notes')
              <span class="text-xs text-red-700">{{ $message }}</span>
            @enderror
          </x-inputs.textarea>
        </div>
      </x-containers.inner>
    </x-containers.outer>
  </form>
  {{-- <div class="flex flex-col justify-center min-h-screen p-20">
    <div class="container w-full p-4 mx-auto bg-white border border-gray-200 rounded-xl">
      <div class="flex flex-col items-center justify-center m-4 xl:flex-row xl:justify-between">
        <div>
          <h1 class="text-3xl font-extrabold">Nowy klient</h1>
        </div>
        <div>
          <button form="new_client_data" type="submit" class="px-8 py-2 mx-4 mt-4 text-lg text-white duration-500 bg-blue-600 rounded xl:mt-0 hover:bg-blue-500">Utwórz</button>
        </div>
      </div>
      <div class="gap-10 p-4 mt-6 bg-gray-100 rounded-xl">
          <form id="new_client_data" method="POST" action="/clients" class="grid gap-6 grow lg:grid-cols-2">
            @csrf
            <div>
            <x-label for="first_name" :value="__('Imię')" />
            <x-input type="text" name="first_name" :value="old('first_name')" class="w-full"/>
            @error('first_name')
              <span class="text-red-700 error">{{ $message }}</span>
            @enderror
            </div>
            <div>
            <x-label for="last_name" :value="__('Nazwisko')" />
            <x-input type="text" name="last_name" :value="old('last_name')" class="w-full"/>
            @error('last_name')
              <span class="text-red-700 error">{{ $message }}</span>
            @enderror
            </div>
            <div>
            <x-label for="phone_number" :value="__('Numer telefonu')" />
            <x-input type="text" name="phone_number" :value="old('phone_number')" class="w-full"/>
            @error('phone_number')
              <span class="text-red-700 error">{{ $message }}</span>
            @enderror
            </div>
            <div>
            <x-label for="email" :value="__('Email')" />
            <x-input type="email" name="email" :value="old('email')" class="w-full"/>
            @error('email')
              <span class="text-red-700 error">{{ $message }}</span>
            @enderror
            </div>
            <div>
            <x-label for="address" :value="__('Adres')" />
            <x-input type="text" name="address" :value="old('address')" class="w-full"/>
            @error('address')
              <span class="text-red-700 error">{{ $message }}</span>
            @enderror
            </div>
            <div>
            <x-label for="city" :value="__('Miasto')" />
            <x-input type="text" name="city" :value="old('city')" class="w-full"/>
            @error('city')
              <span class="text-red-700 error">{{ $message }}</span>
            @enderror
            </div>
            <div>
            <x-label for="company" :value="__('Firma')" />
            <x-input type="text" name="company" :value="old('company')" class="w-full"/>
            @error('company')
              <span class="text-red-700 error">{{ $message }}</span>
            @enderror
            </div>
            <div>
            <x-label for="tax_id" :value="__('Regon')" />
            <x-input type="text" name="tax_id" :value="old('tax_id')" class="w-full"/>
            @error('tax_id')
              <span class="text-red-700 error">{{ $message }}</span>
            @enderror
            </div>
            <div>
            <x-label for="company_id" :value="__('NIP')" />
            <x-input type="text" name="company_id" :value="old('company_id')" class="w-full"/>
            @error('company_id')
              <span class="text-red-700 error">{{ $message }}</span>
            @enderror
            </div>
            <div>
            <x-label for="website" :value="__('Strona')" />
            <x-input type="text" name="website" :value="old('website')" class="w-full"/>
            @error('website')
              <span class="text-red-700 error">{{ $message }}</span>
            @enderror
            </div>
            <div class="lg:col-span-2">
            <x-label for="notes" :value="__('Notatki')" />
            <x-input type="text" name="notes" :value="old('notes')" class="w-full"/>
            @error('notes')
              <span class="text-red-700 error">{{ $message }}</span>
            @enderror
            </div>
          </form>
      </div>
    </div>
  </div> --}}

</x-app-layout>
