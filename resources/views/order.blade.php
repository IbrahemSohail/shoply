@extends('link') 

@if (Route::has('login'))
<nav class="bg-indigo-400 text-sm sm:text-base px-4 sm:px-6 py-3 sm:py-4">
  <div class="flex justify-between items-center flex-wrap gap-3">
    <div class="link flex items-center gap-2 sm:gap-4 flex-wrap">
      <a href="{{route('home')  }}">
        <img class="w-24 sm:w-32 lg:w-36" src="{{ URL('images/logo2.png') }}">
      </a>
      <a href="{{ route('categories.index') }}"
          class="rounded-md px-2 sm:px-3 py-1 text-white transition hover:text-orange-600 text-xs sm:text-sm">
          Category
      </a>
      <a href="{{ route('about-us') }}"
          class="rounded-md px-2 sm:px-3 py-1 text-white transition hover:text-orange-600 text-xs sm:text-sm">
          About us
      </a>
      <a href="{{ route('contact-us') }}"
          class="rounded-md px-2 sm:px-3 py-1 text-white transition hover:text-orange-600 text-xs sm:text-sm">
          Contact us
      </a>
      <a href="{{ route('cart.index')}}"
          class="rounded-md px-2 sm:px-3 py-1 text-white transition hover:text-orange-600 text-xs sm:text-sm">
          Cart
      </a>
      <a href="{{ route('order')}}"
          class="rounded-md px-2 sm:px-3 py-1 text-white transition hover:text-orange-600 text-xs sm:text-sm">
          Order
      </a>
    </div>
    <div class="auth flex gap-2">
      @auth
      @else
        <a href="{{ route('login') }}"
            class="border-2 border-solid px-3 py-1 transition duration-150 text-white hover:bg-orange-600 rounded text-xs sm:text-sm">
            Log in
        </a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}"
                class="rounded-md px-3 py-1 transition text-white hover:text-orange-600 text-xs sm:text-sm">
                Sign Up
            </a>
        @endif
    @endauth
    </div>
  </div>
</nav>
@endif
<div class="container mx-auto mt-6 sm:mt-10 p-4 sm:p-6 bg-white shadow-lg rounded-lg">

    <h1 class="text-xl sm:text-2xl font-bold mb-6 text-center">Order Details</h1>

    @if ($orders->isEmpty())
        <p class="text-center text-gray-600 text-sm sm:text-base">don't have orders yet</p>
    @else
    @foreach ($orders as $order)
        <div class="mb-8 p-4 sm:p-6 border rounded-lg">
                <h2 class="text-lg sm:text-xl font-semibold mb-4">Order Id {{ $order->id }}</h2>
                <p class="text-gray-600 text-xs sm:text-sm">Order Date {{ $order->order_date }}</p>

                <div class="overflow-x-auto mt-4">
                  <table class="w-full text-xs sm:text-sm">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-2 sm:px-4 py-2 text-left">Product</th>
                            <th class="px-2 sm:px-4 py-2 text-left">Quantity</th>
                            <th class="px-2 sm:px-4 py-2 text-left">Price</th>
                            <th class="px-2 sm:px-4 py-2 text-left">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->carts as $cart)
                            <tr class="border-t">
                                <td class="px-2 sm:px-4 py-2">{{ $cart->product->name }}</td>
                                <td class="px-2 sm:px-4 py-2">{{ $cart->quantity }}</td>
                                <td class="px-2 sm:px-4 py-2">${{ number_format($cart->product->price, 2) }}</td>
                                <td class="px-2 sm:px-4 py-2">${{ number_format($cart->product->price * $cart->quantity, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>

                <div class="mt-4 text-right">
                    <p class="text-base sm:text-lg font-semibold">Total: ${{ number_format($order->carts->sum(function ($cart) {
                        return $cart->product->price * $cart->quantity;
                    }), 2) }}</p>
                </div>
            </div>
        @endforeach
    @endif
</div>
