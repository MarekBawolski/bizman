 @props([
    'name' => '',
    'placeholder' => '',
    'value' => '',
    'disabled' => false,
    'inputClass' => '',
    'labelClass' => '',
    'label' => '',
    'prefix' => false,
    'suffix' => false,
    'datasets' => [],
    'errorKey' => '',
])
 <label for="{{ $name }}" {{ $attributes->merge(['class' => 'text-gray-500 text-sm font-semibold flex flex-col gap-1 ' . $labelClass]) }}>
   @if ($label != '')
     <div>{{ $label }}</div>
   @endif
   <span class="relative flex overflow-hidden border-gray-200 rounded-lg shadow-xs">
     @if ($prefix)
       <span class="prefix bg-[#D5DAE1]  text-sm text-[#5E5E5E] flex justify-center items-center px-3 font-medium min-w-[45px]">{!! $prefix !!}</span>
     @endif
     <input type="password" {{ $attributes->merge(['class' => 'w-full py-3 text-black bg-white border-none outline-none focus:outline-none focus:border-none focus:shadow-none focus:ring-transparent ' . $inputClass]) }} placeholder="{{ $placeholder }}"
       name="{{ $name }}" value="{{ $value }}" @if (!empty($datasets)) @foreach ($datasets as $dataset){{ ' data-' . $dataset[0] . '=' . $dataset[1] . ' ' }}@endforeach @endif {{ $disabled ? 'disabled' : '' }}>
     @if ($suffix)
       <span class="suffix bg-[#D5DAE1] text-sm text-[#5E5E5E] flex justify-center items-center px-3 font-medium min-w-[45px]">{!! $suffix !!}</span>
     @endif
   </span>
   {{ $slot }}
   @error($errorKey)
     <span class="text-xs text-red-700">{{ $message }}</span>
   @enderror
 </label>
