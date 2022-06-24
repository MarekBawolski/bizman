<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <div class="flex flex-col justify-center items-center">
                <a href="/">
                    <x-auth-logo />
                </a>
                <span class="text-3xl font-extrabold mt-4">Resetowanie hasła</span>
            </div>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                
                <x-buttons.primary type="submit" class="flex justify-center w-full mt-2">
                    {{ __('Email Password Reset Link') }}
                </x-buttons.primary>

            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
