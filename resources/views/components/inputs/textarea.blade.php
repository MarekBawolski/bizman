 @props([
    'name' => '',
    'placeholder' => '',
    'value' => '',
    'disabled' => false,
    'inputClass' => '',
    'labelClass' => '',
    'label' => '',
    'rows' => '5',
])
 <label for="{{ $name }}" {{ $attributes->merge(['class' => 'text-gray-500 text-sm font-semibold flex flex-col gap-1 ' . $labelClass]) }}>
   @if ($label != '')
     <div>{{ $label }}</div>
   @endif
   <span class="relative flex overflow-hidden border-gray-200 rounded-lg shadow-xs">
     <textarea rows="{{ $rows }}" {{ $attributes->merge(['class' => 'w-full py-3 text-black bg-white border-none outline-none focus:outline-none focus:border-none focus:shadow-none focus:ring-transparent ' . $inputClass]) }} placeholder="{{ $placeholder }}"
       name="{{ $name }}" {{ $disabled ? 'disabled' : '' }}>{{ $value }}</textarea>
   </span>
   {{ $slot }}
 </label>
