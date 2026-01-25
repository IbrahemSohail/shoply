<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    @include('layouts.partials.head', ['title' => 'Shoply'])
</head>
<body>
@if (Route::has('login'))
  <nav class="bg-indigo-400 text-white shadow-lg" x-data="{ open: false }">
    <div class="flex justify-between items-center px-4 py-3 sm:px-6">
      <!-- Logo and Navigation Left -->
      <div class="flex items-center space-x-2 sm:space-x-4 flex-shrink-0">
        <a href="{{route('home') }}" class="flex items-center">
          <img class="w-24 sm:w-32 lg:w-36" src="{{ URL('images/logo2.png') }}" alt="Shoply Logo">
        </a>

        <!-- Navigation Menu -->
        <div class="hidden md:flex items-center space-x-1 lg:space-x-2">
          <a href="{{ route('categories.index') }}"
              class="rounded-md px-3 lg:px-4 py-2 text-xs lg:text-sm xl:text-base text-white transition hover:text-orange-400 hover:bg-indigo-500">
              {{ __('Category') }}
          </a>
          <a href="{{ route('about-us') }}"
              class="rounded-md px-3 lg:px-4 py-2 text-xs lg:text-sm xl:text-base text-white transition hover:text-orange-400 hover:bg-indigo-500">
              {{ __('About Us') }}
          </a>
          <a href="{{ route('contact-us') }}"
              class="rounded-md px-3 lg:px-4 py-2 text-xs lg:text-sm xl:text-base text-white transition hover:text-orange-400 hover:bg-indigo-500">
              {{ __('Contact Us') }}
          </a>
          <a href="{{ route('cart.index')}}"
              class="rounded-md px-3 lg:px-4 py-2 text-xs lg:text-sm xl:text-base text-white transition hover:text-orange-400 hover:bg-indigo-500">
              {{ __('Cart') }}
          </a>
          <a href="{{ route('order')}}"
              class="rounded-md px-3 lg:px-4 py-2 text-xs lg:text-sm xl:text-base text-white transition hover:text-orange-400 hover:bg-indigo-500">
              {{ __('Orders') }}
          </a>
        </div>
      </div>

      <!-- Desktop Auth Section Right -->
      <div class="hidden sm:flex items-center space-x-2 lg:space-x-3">
        <!-- Language Switcher -->
        <a href="{{ route('lang.switch', App::getLocale() == 'ar' ? 'en' : 'ar') }}" 
           class="rounded-md px-3 lg:px-4 py-2 text-xs lg:text-sm xl:text-base text-white border border-white/50 hover:bg-white/10 transition font-bold">
            {{ App::getLocale() == 'ar' ? 'English' : 'عربي' }}
        </a>
        @if(Auth::check() && Auth::user()->is_admin)
        <a href="{{ route('dashboard') }}"
            class="rounded-md px-3 lg:px-4 py-2 text-xs lg:text-sm xl:text-base text-white bg-blue-600 hover:bg-blue-700 transition">
            {{ __('Dashboard') }}
        </a>
        @endif
        @auth
        <div class="relative group">
          <button class="rounded-md px-3 lg:px-4 py-2 text-xs lg:text-sm xl:text-base text-white hover:text-orange-400 transition">
            {{ Auth::user()->name }}
          </button>
          <div class="hidden group-hover:block absolute right-0 mt-0 w-48 bg-white text-gray-800 rounded-lg shadow-lg z-50">
            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm hover:bg-gray-100">{{ __('Profile') }}</a>
            <form method="POST" action="{{ route('logout') }}" class="block">
              @csrf
              <button type="submit" class="w-full text-left px-4 py-2 text-sm hover:bg-gray-100">{{ __('Logout') }}</button>
            </form>
          </div>
        </div>
        @else
        <a href="{{ route('login') }}"
            class="rounded-md px-3 lg:px-4 py-2 text-xs lg:text-sm xl:text-base text-white border border-white hover:bg-orange-600 hover:border-orange-600 transition">
            {{ __('Log In') }}
        </a>
        @if (Route::has('register'))
            <a href="{{ route('register') }}"
                class="rounded-md px-3 lg:px-4 py-2 text-xs lg:text-sm xl:text-base text-white hover:text-orange-400 transition">
                {{ __('Sign Up') }}
            </a>
        @endif
        @endauth
      </div>

      <!-- Mobile Menu Button -->
      <button @click="open = !open" class="md:hidden inline-flex items-center justify-center p-2 rounded-md text-white hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
        <svg class="h-6 w-6" :class="{ 'hidden': open, 'block': !open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <svg class="h-6 w-6" :class="{ 'block': open, 'hidden': !open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" @click.outside="open = false" class="md:hidden bg-indigo-500">
      <div class="px-2 pt-2 pb-3 space-y-1">
        <a href="{{ route('lang.switch', App::getLocale() == 'ar' ? 'en' : 'ar') }}" 
           class="block rounded-md px-3 py-2 text-base text-white hover:bg-indigo-600 transition font-bold border-b border-indigo-400 mb-2">
            Change Language: {{ App::getLocale() == 'ar' ? 'English' : 'عربي' }}
        </a>
        <a href="{{ route('categories.index') }}"
            class="block rounded-md px-3 py-2 text-base text-white hover:bg-indigo-600 transition">
            {{ __('Category') }}
        </a>
        <a href="{{ route('about-us') }}"
            class="block rounded-md px-3 py-2 text-base text-white hover:bg-indigo-600 transition">
            {{ __('About Us') }}
        </a>
        <a href="{{ route('contact-us') }}"
            class="block rounded-md px-3 py-2 text-base text-white hover:bg-indigo-600 transition">
            {{ __('Contact Us') }}
        </a>
        <a href="{{ route('cart.index')}}"
            class="block rounded-md px-3 py-2 text-base text-white hover:bg-indigo-600 transition">
            {{ __('Cart') }}
        </a>
        <a href="{{ route('order')}}"
            class="block rounded-md px-3 py-2 text-base text-white hover:bg-indigo-600 transition">
            {{ __('Orders') }}
        </a>

        <!-- Mobile Auth Section -->
        <div class="border-t border-indigo-600 pt-2 mt-2">
          @if(Auth::check() && Auth::user()->is_admin)
          <a href="{{ route('dashboard') }}"
              class="block rounded-md px-3 py-2 text-base text-white bg-blue-600 hover:bg-blue-700 transition mb-2">
              {{ __('Dashboard') }}
          </a>
          @endif
          @auth
          <a href="{{ route('profile.edit') }}" class="block rounded-md px-3 py-2 text-base text-white hover:bg-indigo-600 transition">
            {{ __('My Profile') }}
          </a>
          <form method="POST" action="{{ route('logout') }}" class="block">
            @csrf
            <button type="submit" class="w-full text-left rounded-md px-3 py-2 text-base text-white hover:bg-indigo-600 transition">
              {{ __('Logout') }}
            </button>
          </form>
          @else
          <a href="{{ route('login') }}"
              class="block rounded-md px-3 py-2 text-base text-white border border-white hover:bg-orange-600 transition mb-2">
              {{ __('Log In') }}
          </a>
          @if (Route::has('register'))
              <a href="{{ route('register') }}"
                  class="block rounded-md px-3 py-2 text-base text-white hover:text-orange-400 transition">
                  {{ __('Sign Up') }}
              </a>
          @endif
          @endauth
        </div>
      </div>
    </div>
  </nav>
@endif
@include('partials.chatbot')