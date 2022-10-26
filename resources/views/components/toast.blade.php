<div {{ $attributes->class(['toast flex items-center w-full max-w-xs p-4 text-black rounded-2xl fixed z-10 right-8 bottom-8 shadow-toast border-l-8 border-blue overflow-hidden ', 'success' => $success]) }} role="alert">
  <div class="flex items-center">
    <svg class="w-10 h-10 text-blue" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd"
        d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z"
        clip-rule="evenodd"></path>
    </svg>
    <div class="m-5">
      <span>{{ $slot }}</span>
    </div>
    <svg class="close w-4 h-4 absolute top-4 right-4 cursor-pointer opacity-50 hover:opacity-100" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
    </svg>
    <div class="progress absolute bottom-0 left-0 h-1 w-full bg-white before:absolute before:bottom-0 before:right-0 before:h-full before:w-full before:bg-blue">
    </div>
  </div>
</div>
