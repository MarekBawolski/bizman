<div class="flex flex-col bg-white min-h-screen">
    <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-main-gray grow">
        <div>
            {{ $logo }}
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-main-gray overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
    <svg class="mb-10" viewBox="0 0 1920 116" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1920 51.4091H1453.44C1111.12 51.4091 773.639 116 480 116C186.361 116 0 51.4091 0 51.4091V0H1920V51.4091Z" fill="#F7F8F9"/>
    </svg>
</div>

