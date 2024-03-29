<button type="button" id="add" onclick="addElement()" class="bg-[#EEF0F3] rounded-lg flex justify-center p-1">
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
  </svg>
</button>

<template>
  <div class="bg-[#EEF0F3] p-5 rounded-lg flex justify-center gap-[10px] add-template">
    <div class="basis-0 grow-[3] flex flex-col gap-[5px] border-r-[1px] border-gray-300 pr-[10px]">
      <x-inputs.text inputClass="element_title" :value="old('title')" placeholder="Tytuł">
        @error('title')
          <span class="text-xs text-red-700">{{ $message }}</span>
        @enderror
      </x-inputs.text>
      <x-inputs.textarea :value="old('content')" inputClass="element_content" class="col-span-2 " placeholder="Notatki">
        @error('content')
          <span class="text-xs text-red-700">{{ $message }}</span>
        @enderror
      </x-inputs.textarea>
    </div>

    <div class="basis-0 grow-[1] flex flex-col justify-around">
      {{ $slot }}
      <x-inputs.text :value="old('work_hours')" inputClass="element_time" class="" placeholder="Czas">
        @error('work_hours')
          <span class="text-xs text-red-700">{{ $message }}</span>
        @enderror
      </x-inputs.text>
      <button onClick="this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode);" class="w-full bg-white rounded-lg p-3 flex justify-between bg-[#9E0000] text-white">
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
    updateElementsIndex()
  }

  function updateElementsIndex() {

    let all_elements = document.querySelectorAll('.here-add-quote .add-template');

    all_elements.forEach(function(el, index) {

      const title = el.querySelector('.here-add-quote .add-template .element_title'),
        content = el.querySelector('.here-add-quote .add-template .element_content'),
        job_type = el.querySelector('.here-add-quote .add-template .element_job_type'),
        time = el.querySelector('.here-add-quote .add-template .element_time');

      title.name = `quote_elements[${index}][title]`;
      content.name = `quote_elements[${index}][content]`;
      job_type.name = `quote_elements[${index}][job_type]`;
      time.name = `quote_elements[${index}][time]`;

    })

  }
</script>
