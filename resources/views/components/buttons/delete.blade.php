@props([
    'id' => false,
    'class' => '',
    'type' => 'button',
])
<button {{ $attributes->merge(['id' => $id, 'type' => $type]) }} {{ $attributes->merge(['class' => 'btn-delete ' . $class]) }}>{{ $slot }}</button>
