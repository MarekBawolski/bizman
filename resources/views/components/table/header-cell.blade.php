@props([
    'class' => '',
])
<th {{ $attributes->merge(['class' => 'p-4 font-medium text-left text-gray-900 whitespace-nowrap ' . $class]) }}>
  <div class="flex items-center">
    {{ $slot }}
  </div>
</th>
