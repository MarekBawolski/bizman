<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <div class="flex flex-col justify-center items-center">
                <a href="/">
                    <x-auth-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
                <span class="text-3xl font-extrabold mt-4">Rejestracja</span>
            </div>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Nazwa')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Hasło')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Powtórz hasło')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <x-buttons.primary type="submit" class="flex justify-center w-full mt-8">
                {{ __('Zarejestruj się') }}
            </x-buttons.primary>
        </form>

        <div class="flex justify-center mt-4">
            Masz już konto?<a class="ml-2 text-blue" href="{{ route('login') }}">{{ __('Zaloguj się') }}</a>
        </div>
        
    </x-auth-card>
</x-guest-layout>
