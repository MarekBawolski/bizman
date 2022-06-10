@props([
    'class' => '',
])
<td {{ $attributes->merge(['class' => 'p-4 font-medium text-gray-900 whitespace-nowrap ' . $class]) }}>
  {{ $slot }}
</td>
