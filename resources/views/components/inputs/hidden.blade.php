 @props([
    'name' => '',
    'value' => '',
    'inputClass' => '',
])

 <input type="hidden" {{ $attributes->merge(['class' => ' ' . $inputClass]) }} name="{{ $name }}" value="{{ $value }}">
