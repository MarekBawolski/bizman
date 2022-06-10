 @props([
    'title' => '',
    'buttonStyle' => false,
    'buttonText' => false,
    'buttonLink' => '',
    'searchAction' => '',
])
 <div class="container mx-auto mt-12  border border-[#D5DAE1] rounded-xl px-12 py-8 relative">
   <div class="flex items-center gap-12 mb-16">
     <h1 class="text-2xl font-semibold leading-tight text-[#6A7C96] ">{{ $title }}</h1>
     @if ($buttonStyle == 'secondary')
       <x-buttons.secondary>
         <a href="{{ $buttonLink }}">
           {{ $buttonText }}
         </a>
       </x-buttons.secondary>
     @elseif($buttonStyle == 'primary')
       <x-buttons.primary>
         <a href="{{ $buttonLink }}">
           {{ $buttonText }}
         </a>
       </x-buttons.primary>
     @endif

     <x-inputs.search action="{{ $searchAction }}" placeholder="Szukaj" name="search"></x-inputs.search>
   </div>
   {{ $slot }}
 </div>
