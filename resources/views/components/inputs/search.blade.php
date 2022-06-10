@props([
    'action' => '/',
    'placeholder' => '',
    'class' => '',
    'name' => '',
    'labelClass' => '',
])

<form class="flex items-center justify-end flex-1" action="{{ $action }}">
  <label for="{{ $name }}" {{ $attributes->merge(['class' => 'w-[330px] text-gray-500 border rounded-lg text-sm overflow-hidden font-semibold flex flex-col gap-1 ' . $labelClass]) }}>
    <input type="search" name="{{ $name }}" {{ $attributes->merge(['class' => 'w-full py-3 text-black bg-white border-none focus:outline-none focus:border-none focus:shadow-none focus:ring-transparent ' . $class]) }} placeholder="{{ $placeholder }}"
      aria-label="{{ $placeholder }}" aria-describedby="button-addon2">
  </label>
  <button type="submit" class="hidden" id="button-addon2">
    {{ $placeholder }}
  </button>
</form>
