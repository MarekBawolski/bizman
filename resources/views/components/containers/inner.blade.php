@props([
    'title' => '',
    'id' => '',
])
<div class="relative mb-20" id="{{ $id }}">
  <div class="bg-[#EEF0F3] rounded-lg absolute w-[calc(100%+50px)] h-[calc(100%+50px)] left-1/2 top-1/2 -translate-y-1/2 -translate-x-1/2 z-[-1]"></div>
  <x-titles.dash>{{ $title }}</x-titles.dash>
  <div class="flex flex-col h-full gap-2 py-4 statuses-wrapper">
    {{ $slot }}
  </div>
</div>
