<x-app-layout>
<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" />
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-700">
      {{ __('Baza klientów') }}
    </h2>
  </x-slot>
  
  @isset($clients)
  <div class="py-12">
        <div class="max-w-7xl mx-auto min-w-min sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded">
                        Dodaj klienta
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </button>
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg text-center">
                                    <table class="min-w-min divide-y divide-gray-200">
                                        <thead class="-50 text-center">
                                        <tr>
                                            <th scope="col" class="px-3 py-4 text-xs font-medium text-gray-700 bg-gray-300">
                                                Id
                                            </th>
                                            <th scope="col" class="px-6 py-4 text-xs font-medium text-gray-700">
                                                Name
                                            </th>
                                            <th scope="col" class="px-6 py-4 text-xs font-medium text-gray-700">
                                                Phone number
                                            </th>
                                            <th scope="col" class="px-6 py-4 text-xs font-medium text-gray-700">
                                                Email
                                            </th>
                                            <th scope="col" class="px-6 py-4 text-xs font-medium text-gray-700">
                                                Stworzone
                                            </th>
                                            <th scope="col" class="px-6 py-4 text-xs font-medium text-gray-700">
                                                Modyfikowane
                                            </th>
                                            <th scope="col" class="px-6 py-4 text-xs font-medium text-gray-700">
                                                Firma
                                            </th>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($clients as $client)
                                        <tr>
                                            <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-700 bg-gray-300">
                                                {{ $client->id}}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                {{ $client->first_name }} {{ $client->last_name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                {{ $client->phone_number }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                {{ $client->email}}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                {{ $client->created_at }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                {{ $client->updated_at }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                {{ $client->company }}
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-4">
                                {{ $clients->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  @endisset
</x-app-layout>
