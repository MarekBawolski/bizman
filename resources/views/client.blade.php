<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Klient') }}
    </h2>
  </x-slot>

  @isset($client)
    @dump($client)
  @endisset ($client)
</x-app-layout>
