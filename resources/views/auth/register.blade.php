<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="w-full px-4 sm:px-6">
        @csrf

        <!-- Name -->
        <div class="mb-4">
            <h2 class="text-center text-lg sm:text-xl lg:text-2xl font-bold text-black mb-6">Register on Shoply</h2>
            <x-input-label for="name" :value="__('Name')" class="text-sm sm:text-base" />
            <x-text-input id="name" class="block mt-1 w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-xs sm:text-sm" />
        </div>

        <!-- Email Address -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" class="text-sm sm:text-base" />
            <x-text-input id="email" class="block mt-1 w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs sm:text-sm" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" class="text-sm sm:text-base" />

            <x-text-input id="password" class="block mt-1 w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs sm:text-sm" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-6">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-sm sm:text-base" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-xs sm:text-sm" />
        </div>

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-end gap-3 mb-6">
            <x-primary-button class="w-full sm:w-auto justify-center">
                {{ __('Register') }}
            </x-primary-button>
        </div>
        
        <div class="text-center border-t border-gray-300 pt-6">
            <h2 class="text-sm sm:text-base text-gray-700 font-semibold mb-4">Already have an account?</h2>
            
            <a class="inline-flex items-center justify-center w-full sm:w-auto px-6 sm:px-8 py-3 bg-gray-800 border border-transparent rounded-md font-semibold text-xs sm:text-sm text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" href="{{ route('login') }}">
                {{ __('Login') }}
            </a>
        </div>
    </form>
</x-guest-layout>
