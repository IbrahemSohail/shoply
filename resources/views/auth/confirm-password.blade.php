<x-guest-layout>
    <div class="mb-6 text-xs sm:text-sm text-gray-600 leading-relaxed">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}" class="w-full px-4 sm:px-6">
        @csrf

        <!-- Password -->
        <div class="mb-6">
            <x-input-label for="password" :value="__('Password')" class="text-sm sm:text-base" />

            <x-text-input id="password" class="block mt-1 w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs sm:text-sm" />
        </div>

        <div class="flex justify-center sm:justify-end">
            <x-primary-button class="w-full sm:w-auto px-6 sm:px-8 justify-center">
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
