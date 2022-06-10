@props([
    'id' => false,
    'class' => '',
    'type' => 'button',
])
<button {{ $attributes->merge(['id' => $id, 'type' => $type, 'class' => 'btn-primary ' . $class]) }}>{{ $slot }}</button>
