<x-app-layout>
  @if (\Session::has('success'))
    <x-toast success="success">
      {!! \Session::get('success') !!}
    </x-toast>
  @endif


  <x-containers.outer title="{{ $quote->name }}" buttonStyle="secondary" :buttonLink="url('/quotes/' . $quote->id . '/edit')" buttonText="Edycja">
    <div class="grid grid-cols-2 gap-16">
      <x-containers.inner title="Elementy wyceny">
        <div class="max-h-[600px] overflow-auto bg-white rounded-lg px-6 py-6  gap-4 flex flex-col">

          <x-add-item>
            <select name="job_type_id" class="rounded-lg w-full p-3 border-none">
              <option disabled selected hidden>Rodzaj prac</option>
              @foreach($job_types as $type)
              <option value="{{ $type->id }}">
                {{ $type->abbreviation }}
              </option>
              @endforeach
            </select>
            @error('job_type_id')
              <span class="text-xs text-red-700">{{ $message }}</span>
            @enderror
          </x-add-item>

          @isset($selected)
            @foreach ($selected as $item)
              <div class="priced-item-wrapper grid grid-cols-[50px_auto_100px] bg-gray-100  rounded-lg gap-4 py-4">
                <div class="flex flex-col items-center justify-center add-to-quote">
                  <span class="cursor-pointer btn-secondary">-</span>
                </div>
                <div class="flex flex-col gap-2 pl-4 item">
                  <x-inputs.text name="title" :value="old('title', $item->title)">
                    @error('title')
                      <span class="text-xs text-red-700">{{ $message }}</span>
                    @enderror
                  </x-inputs.text>
                  <x-inputs.textarea name="content" :value="old('content', $item->content)" class="text-sm " placeholder="Notatki">
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

        <div class="max-h-[600px] overflow-auto bg-white rounded-lg px-6 py-6  gap-4 flex flex-col">
          @isset($items)
            @foreach ($items as $item)
              <div class="priced-item-wrapper grid grid-cols-[50px_auto_100px] bg-gray-100  rounded-lg gap-4 py-4">
                <div class="flex flex-col items-center justify-center add-to-quote">
                  <span class="cursor-pointer btn-primary">+</span>
                </div>
                <div class="pl-4 item">
                  <div class="mb-2 font-semibold title"> {{ $item->title }}</div>
                  <div class="text-sm content"> {{ $item->content }}</div>
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
