<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <div class="flex flex-col justify-center items-center">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
            <span class="text-3xl font-extrabold mt-4">Zaloguj się</span>
            </div>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Hasło')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me, Forgot Password-->
            <div class="flex justify-between mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Zapamiętaj mnie') }}</span>
                </label>

                <div class="flex items-center">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-blue-600 hover:text-blue-900" href="{{ route('password.request') }}">
                            {{ __('Zapomniałeś hasła?') }}
                        </a>
                    @endif
                </div>
            </div>

            <x-button class="flex justify-center mt-8">
                {{ __('Logowanie') }}
            </x-button>
        </form>

        <div class="flex justify-center mt-4">
            Nie masz konta? <a href="{{ route('register') }}" class="ml-2 text-blue-600">Zarejestruj się</a>
        </div>
        
    </x-auth-card>
</x-guest-layout>
