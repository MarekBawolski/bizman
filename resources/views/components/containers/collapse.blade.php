@props([
    'title' => '',
    'id' => '',
])
<div class="relative mb-20" id="{{ $id }}">
	<div class="bg-[#EEF0F3] rounded-lg absolute w-[calc(100%+50px)] h-[calc(100%+50px)] left-1/2 top-1/2 -translate-y-1/2 -translate-x-1/2 z-[-1]"></div>
	<input type="checkbox" class="peer absolute top-[-25px] w-[calc(100%+50px)] left-1/2 -translate-x-1/2 h-[104px] opacity-0 z-10 cursor-pointer">
	<div class="relative top-4 left-0 w-[calc(100%-100px)]">
	<x-titles.dash>{{ $title }}</x-titles.dash>
	</div>
	<div class="absolute top-0 right-0 text-[#6A7C96] transition-transform duration-500 rotate-0 peer-checked:rotate-180">
		<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16">
			<path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
		</svg>
	</div>
	<div class="overflow-hidden transition-all duration-500 max-h-0 peer-checked:max-h-[1000px] px-5 peer-checked:py-5">
		{{$slot}}	
  	</div>
</div>