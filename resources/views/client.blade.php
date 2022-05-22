<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Klient') }}
    </h2>
  </x-slot>

  <div class="container">
    @isset($client)
      <h1>{{ $client->first_name }} {{ $client->last_name }}</h1>
    @endisset ($client)
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
