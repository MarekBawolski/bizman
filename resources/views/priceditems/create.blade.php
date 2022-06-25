<x-app-layout>
  @if (\Session::has('success'))
    <x-toast success="success">
      {!! \Session::get('success') !!}
    </x-toast>
  @endif
  <form id="priceditems_data" method="POST" action="/priceditems">
        @csrf

  <x-containers.outer title="Tworzenie nowego elementu" buttonStyle="primary" buttonType="submit" buttonText="Dodaj" >
      <x-containers.inner title="">
        <div class="grid grid-cols-2 gap-4">
          <x-inputs.text name="title" :value="old('title')" labelClass="col-span-2" label="Tytuł" >
             @error('title')
              <span class="text-xs text-red-700">{{ $message }}</span>
            @enderror
          </x-inputs.text>
          <x-inputs.text name="work_hours" :value="old('work_hours')" label="Godziny" >
             @error('work_hours')
              <span class="text-xs text-red-700">{{ $message }}</span>
            @enderror
          </x-inputs.text>
          <select name="job_type_id">
          @foreach($types as $type)
          <option value="{{ $type->id }}">
          {{ $type->type }}
          </option>
          @endforeach
          </select>
 @error('job_type_id')
              <span class="text-xs text-red-700">{{ $message }}</span>
            @enderror
          <x-inputs.textarea name="content" :value="old('content')" class="col-span-2" label="Treść" >
            @error('content')
              <span class="text-xs text-red-700">{{ $message }}</span>
            @enderror
          </x-inputs.textarea>
        </div>
      </x-containers.inner>


  </x-containers.outer>
  </form>


</x-app-layout>
