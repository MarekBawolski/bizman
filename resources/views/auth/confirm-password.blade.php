<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <div class="flex flex-col justify-center items-center">
                <a href="/">
                    <x-auth-logo />
                </a>
                <span class="text-3xl font-extrabold mt-4">Potwierdź hasło</span>
            </div>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <div class="flex justify-end mt-4">
                
                <x-buttons.primary type="submit" class="flex justify-center w-full mt-2">
                    {{ __('Potwierdź') }}
                </x-buttons.primary>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
