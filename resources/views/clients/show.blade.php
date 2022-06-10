<x-app-layout>
  @if (\Session::has('success'))
    <x-toast success="success">
      {!! \Session::get('success') !!}
    </x-toast>
  @endif
  <x-containers.outer title="{{ $client->first_name }} {{ $client->last_name }}" buttonStyle="secondary" :buttonLink="url('/clients/' . $client->id . '/edit')" buttonText="Edycja">
    <div class="grid grid-cols-2 gap-16">
      <x-containers.inner title="Dane klienta">
        <div class="grid grid-cols-2 gap-4">
          <x-inputs.text name="first_name" :value="$client->first_name" :disabled="true" label="Imię" />
          <x-inputs.text name="last_name" :value="$client->last_name" :disabled="true" label="Nazwisko" />
          <x-inputs.tel name="phone_number" :value="$client->phone_number" :disabled="true" label="Numer telefonu" />
          <x-inputs.email name="email" :value="$client->email" :disabled="true" label="Adres email" />
          <x-inputs.text name="address" :value="$client->address" :disabled="true" label="Adres" />
          <x-inputs.text name="city" :value="$client->city" :disabled="true" label="Miasto" />
          <x-inputs.text name="company" :value="$client->company" :disabled="true" label="Firma" />
          <x-inputs.text name="tax_id" :value="$client->tax_id" :disabled="true" label="Regon" />
          <x-inputs.text name="company_id" :value="$client->company_id" :disabled="true" label="NIP" />
          <x-inputs.text name="website" :value="$client->website" :disabled="true" label="Strona" />
          <x-inputs.textarea name="notes" :value="$client->notes" class="col-span-2" :disabled="true" label="Notatki" />
          <x-inputs.text name="created_at" :value="\Carbon\Carbon::parse($client->created_at)->format('d.m.Y - H:m:s')" :disabled="true" label="Data dodania" />
          <x-inputs.text name="updated_at" :value="\Carbon\Carbon::parse($client->updated_at)->format('d.m.Y - H:m:s')" :disabled="true" label="Ostatnia aktualizacja" />
        </div>
      </x-containers.inner>
      <x-containers.inner title="Lista wycen">
        @if (count($quotes) > 0)
          <ul class="flex flex-col gap-4 max-h-[600px] overflow-auto">
            @foreach ($quotes as $quote)
              <li class="">
                <a href="{{ url('/quotes/' . $quote->id) }}" class="block px-8 py-4 transition-all bg-white rounded-md hover:bg-blue hover:text-white">
                  <div class="flex gap-4 mb-4">
                    <div class="text-xs created-at">
                      <span>Utworzono:</span> <span class="font-semibold">{{ \Carbon\Carbon::parse($quote->created_at)->format('d.m.Y') }}</span>
                    </div>
                    <div class="text-xs updated-at">
                      <span>Ostatnia aktualizacja:</span> <span class="font-semibold">{{ \Carbon\Carbon::parse($quote->updated_at)->format('d.m.Y') }}</span>
                    </div>
                  </div>
                  <div class="text-base">
                    {{ $quote->name }}
                  </div>
                </a>
              </li>
            @endforeach
          </ul>
        @else
          <div class="empty">
            {{ __('Brak wycen') }}
          </div>
        @endif ($quotes)
      </x-containers.inner>
    </div>

  </x-containers.outer>


</x-app-layout>
