<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="w-full px-4 sm:px-6">
        @csrf
        <!-- Email Address -->
        <div class="mb-4">
            <h2 class="text-center text-lg sm:text-xl lg:text-2xl font-bold text-black mb-6">{{ __('Login to Shoply') }}</h2>
            <x-input-label for="email" :value="__('Email')" class="text-sm sm:text-base" />
            <x-text-input id="email" class="block mt-1 w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs sm:text-sm" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" class="text-sm sm:text-base" />

            <x-text-input id="password" class="block mt-1 w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs sm:text-sm" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4 mb-6">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-xs sm:text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <!-- Login Button -->
        <div class="mb-4">
            <x-primary-button class="w-full justify-center whitespace-nowrap">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <!-- Forgot Password Link -->
        <div class="text-center mb-6">
            @if (Route::has('password.request'))
                <a class="text-xs sm:text-sm text-gray-600 hover:text-gray-900 hover:underline rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>
        
        <div class="text-center sign-up border-t border-gray-300 pt-6 mt-6">
            <h2 class="block font-semibold text-sm sm:text-base text-gray-700 mb-4">{{ __("Don't have an account?") }}</h2>
    
                <a class="inline-flex items-center justify-center w-full sm:w-auto px-6 sm:px-8 py-3 mt-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs sm:text-sm text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" href="{{ route('register') }}">
                    {{ __('Sign Up') }}
                </a>
        </div>
    </form>
</x-guest-layout>
