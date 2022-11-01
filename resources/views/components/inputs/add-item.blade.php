<button type="button" id="add" onclick="addElement()" class="bg-[#EEF0F3] rounded-lg flex justify-center p-1">
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
  </svg>
</button>

<template>
  <div class="bg-[#EEF0F3] p-5 rounded-lg flex justify-center gap-[10px]">

    <div class="basis-0 grow-[3] flex flex-col gap-[5px] border-r-[1px] border-gray-300 pr-[10px]">
      <x-inputs.text name="title" :value="old('title')" placeholder="Tytuł">
        @error('title')
          <span class="text-xs text-red-700">{{ $message }}</span>
        @enderror
      </x-inputs.text>
      <x-inputs.textarea name="content" :value="old('content')" class="col-span-2" placeholder="Notatki">
        @error('content')
          <span class="text-xs text-red-700">{{ $message }}</span>
        @enderror
      </x-inputs.textarea>
    </div>

    <div class="basis-0 grow-[1] flex flex-col justify-around">
      <select class="rounded-lg w-full p-3 border-none">
        <option disabled selected hidden>Rodzaj prac</option>
        <option>option 1</option>
        <option>option 2</option>
        <option>option 3</option>
      </select>
      <x-inputs.text name="work_hours" :value="old('work_hours')" placeholder="Czas">
        @error('work_hours')
          <span class="text-xs text-red-700">{{ $message }}</span>
        @enderror
      </x-inputs.text>
      <button onClick="this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode);"
      class="w-full bg-white rounded-lg p-3 flex justify-between bg-[#9E0000] text-white">
        <span>Usuń</span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>

  </div>
</template>

<script>
  function addElement() {
    var temp = document.getElementsByTagName("template")[0];
    var clon = temp.content.cloneNode(true);
    document.getElementById("add").after(clon);
  }
</script>