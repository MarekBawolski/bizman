<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-3 bg-blue border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue active:bg-blue focus:outline-none focus:border-blue focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 w-full']) }}>
    {{ $slot }}
</button>
