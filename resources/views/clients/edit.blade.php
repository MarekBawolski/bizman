<x-app-layout>
  @if (\Session::has('success'))
    <x-toast success="success">
      {!! \Session::get('success') !!}
    </x-toast>
  @endif
  <form id="client_data" method="POST" action="/clients/{{ $client->id }}">
    <x-containers.outer title="Edycja: {{ $client->first_name }} {{ $client->last_name }}" buttonStyle="primary" buttonType="submit" buttonText="Zapisz">
      <x-containers.inner title="Dane klienta">
        @csrf
        @method('PATCH')
        <div class="grid grid-cols-2 gap-4">
          <x-inputs.text name="first_name" :value="old('first_name', $client->first_name)" label="Imię">
            @error('first_name')
              <span class="text-xs text-red-700">{{ $message }}</span>
            @enderror
          </x-inputs.text>
          <x-inputs.text name="last_name" :value="old('last_name', $client->last_name)" label="Nazwisko">
            @error('last_name')
              <span class="text-xs text-red-700">{{ $message }}</span>
            @enderror
          </x-inputs.text>
          <x-inputs.tel name="phone_number" :value="old('phone_number', $client->phone_number)" label="Numer telefonu">
            @error('phone_number')
              <span class="text-xs text-red-700">{{ $message }}</span>
            @enderror
          </x-inputs.tel>
          <x-inputs.email name="email" :value="old('email', $client->email)" label="Adres email">
            @error('email')
              <span class="text-xs text-red-700">{{ $message }}</span>
            @enderror
          </x-inputs.email>
          <x-inputs.text name="address" :value="old('address', $client->address)" label="Adres">
            @error('address')
              <span class="text-xs text-red-700">{{ $message }}</span>
            @enderror
          </x-inputs.text>
          <x-inputs.text name="city" :value="old('city', $client->city)" label="Miasto">
            @error('city')
              <span class="text-xs text-red-700">{{ $message }}</span>
            @enderror
          </x-inputs.text>
          <x-inputs.text name="company" :value="old('company', $client->company)" label="Firma">
            @error('company')
              <span class="text-xs text-red-700">{{ $message }}</span>
            @enderror
          </x-inputs.text>
          <x-inputs.text name="tax_id" :value="old('tax_id', $client->tax_id)" label="Regon">
            @error('tax_id')
              <span class="text-xs text-red-700">{{ $message }}</span>
            @enderror
          </x-inputs.text>
          <x-inputs.text name="company_id" :value="old('company_id', $client->company_id)" label="NIP">
            @error('company_id')
              <span class="text-xs text-red-700">{{ $message }}</span>
            @enderror
          </x-inputs.text>
          <x-inputs.text name="website" :value="old('website', $client->website)" label="Strona">
            @error('website')
              <span class="text-xs text-red-700">{{ $message }}</span>
            @enderror
          </x-inputs.text>
          <x-inputs.textarea name="notes" :value="old('notes', $client->notes)" class="col-span-2" label="Notatki">
            @error('notes')
              <span class="text-xs text-red-700">{{ $message }}</span>
            @enderror
          </x-inputs.textarea>
        </div>
      </x-containers.inner>
    </x-containers.outer>
  </form>
</x-app-layout>
