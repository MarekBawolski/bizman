 @props([
    'title' => '',
    'buttonStyle' => false,
    'buttonText' => false,
    'buttonLink' => false,
    'buttonType' => 'button',
])
 <div class="container mx-auto mt-12  border border-[#D5DAE1] rounded-xl px-12 py-8 relative">
   <h1 class="text-2xl font-semibold leading-tight text-[#6A7C96] mb-16">{{ $title }}</h1>
   @if ($buttonStyle == 'secondary')
     <x-buttons.secondary type="{{ $buttonType }}" class="absolute top-5 right-7">
       @if ($buttonLink)
         <a href="{{ $buttonLink }}">{{ $buttonText }}</a>
       @else
         {{ $buttonText }}
       @endif
     </x-buttons.secondary>
   @elseif($buttonStyle == 'primary')
     <x-buttons.primary type="{{ $buttonType }}" class="absolute top-5 right-7">
       @if ($buttonLink)
         <a href="{{ $buttonLink }}">{{ $buttonText }}</a>
       @else
         {{ $buttonText }}
       @endif
     </x-buttons.primary>
   @endif
   {{ $slot }}
 </div>
