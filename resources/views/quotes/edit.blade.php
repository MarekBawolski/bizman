<x-app-layout>
  @if (\Session::has('success'))
    <x-toast success="success">
      {!! \Session::get('success') !!}
    </x-toast>
  @endif


  <x-containers.outer title="{{ $quote->name }}" buttonStyle="secondary" :buttonLink="url('/quotes/' . $quote->id . '/edit')" buttonText="Edycja">
    <div class="grid grid-cols-2 gap-16">
      <x-containers.inner title="Elementy wyceny">
        <div class="max-h-[600px] overflow-auto bg-white rounded-lg px-6 py-6  gap-4 flex flex-col here-add-quote">
          @isset($selected)
            @foreach ($selected as $item)
              <div class="priced-item-wrapper grid grid-cols-[50px_auto_100px] bg-gray-100  rounded-lg gap-4 py-4" id="item{{$item->id}}m">
                <div class="flex flex-col items-center justify-center add-to-quote" data-element_id="{{$item->id}}" data-element_title="{{$item->title}}" data-element_content="{{$item->content}}">
                  <span class="cursor-pointer btn-secondary" id="item{{$item->id}}_buttonm">-</span>
                </div>
                <div class="flex flex-col gap-2 pl-4 item">
                  <x-inputs.text name="title" :value="old('title', $item->title)" id="item{{$item->id}}_titlem">
                    @error('title')
                      <span class="text-xs text-red-700">{{ $message }}</span>
                    @enderror
                  </x-inputs.text>
                  <x-inputs.textarea name="content" :value="old('content', $item->content)" class="text-sm " placeholder="Notatki" id="item{{$item->id}}_contentm">
                    @error('content')
                      <span class="text-xs text-red-700">{{ $message }}</span>
                    @enderror
                  </x-inputs.textarea>
                </div>
                <div class="flex flex-col items-center justify-center border-l border-gray-300 job">
                  <span class="font-semibold uppercase">{{ $item->jobType->abbreviation }}</span>
                  <span>{{ $item->work_hours }}</span>
                </div>
              </div>
            @endforeach
          @endisset
        </div>
      </x-containers.inner>
      <x-containers.inner title="Wycenione elementy">
        <input type="text" class="absolute w-1/2 rounded-lg right-0 top-4 new-quote-search" id="search" placeholder="szukaj...">
        <div class="max-h-[600px] overflow-auto bg-white rounded-lg px-6 py-6  gap-4 flex flex-col here-deleted-quotes">
          @isset($items)
            @foreach ($items as $item)
              <div class="priced-item-wrapper grid grid-cols-[50px_auto_100px] bg-gray-100  rounded-lg gap-4 py-4 item" id="item{{$item->id}}">
                <div class="flex flex-col items-center justify-center add-to-quote" data-element_id="{{$item->id}}" data-element_title="{{$item->title}}" data-element_content="{{$item->content}}">
                  <span class="cursor-pointer btn-primary" id="item{{$item->id}}_button">+</span>
                </div>
                <div class="pl-4 item">
                  <div class="mb-2 font-semibold title" id="item{{$item->id}}_title"> {{ $item->title }}</div>
                  <div class="text-sm content" id="item{{$item->id}}_content"> {{ $item->content }}</div>
                </div>
                <div class="flex flex-col items-center justify-center border-l border-gray-300 job">
                  <span class="font-semibold uppercase">{{ $item->jobType->abbreviation }}</span>
                  <span>{{ $item->work_hours }}</span>
                </div>
              </div>
            @endforeach
          @endisset
        </div>


      </x-containers.inner>
    </div>

  </x-containers.outer>


</x-app-layout>
