<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Baza klientów') }}
    </h2>
  </x-slot>

  @isset($clients)
    @dump($clients)
  @endisset ($clients)
</x-app-layout>
