@extends('link') 

@if (Route::has('login'))
<nav class="flex bg-indigo-400 text-xl place-items-center place-content-between ">
  <div class="link flex place-items-center">
    <a href="{{route('home')  }}">
      <img class="w-36" src="{{ URL('images/logo2.png') }}">
    </a>
        <a href="{{ route('categories.index') }}"
            class="rounded-md px-3 text-white transition hover:text-orange-600">
            Category
        </a>
        <a href="{{ route('about-us') }}"
            class="rounded-md px-3 text-white transition hover:text-orange-600">
            About us
        </a>
        <a href="{{ route('contact-us') }}"
            class="rounded-md px-3 text-white transition hover:text-orange-600">
            Contact us
        </a>
        <a href="{{ route('cart.index')}}"
        class="rounded-md px-3 text-white transition hover:text-orange-600">
        Cart
    </a>
        <a href="{{ route('order')}}"
        class="rounded-md px-3 text-white transition hover:text-orange-600">
        Order
    </a>
      </div>
    <div class="auth flex ">
      @auth
      @else
        <a href="{{ route('login') }}"
            class="border-2 border-solid w-24 h-8 transition duration-150 text-white hover:bg-orange-600">
            <p class="text-center">Log in</p>
        </a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}"
                class="rounded-md px-4 transition text-white dark:focus-visible:ring-black">
                <p class="hover:text-orange-600">Sign Up</p>
            </a>
        @endif
    @endauth
  </div>
</nav>
@endif
<div class="container mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">

    <h1 class="text-2xl font-bold mb-6 text-center">Order Details</h1>

    @if ($orders->isEmpty())
        <p class="text-center text-gray-600">don't have orders yet</p>
    @else
    @foreach ($orders as $order)
        <div class="mb-8 p-6 border rounded-lg">
                <h2 class="text-xl font-semibold mb-4">Order Id {{ $order->id }}</h2>
                <p class="text-gray-600">Order Date {{ $order->order_date }}</p>

                <table class="w-full mt-4">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Product</th>
                            <th class="px-4 py-2">Quantity</th>
                            <th class="px-4 py-2">Price</th>
                            <th class="px-4 py-2">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->carts as $cart)
                            <tr>
                                <td class="border px-4 py-2">{{ $cart->product->name }}</td>
                                <td class="border px-4 py-2">{{ $cart->quantity }}</td>
                                <td class="border px-4 py-2">${{ number_format($cart->product->price, 2) }}</td>
                                <td class="border px-4 py-2">${{ number_format($cart->product->price * $cart->quantity, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4 text-right">
                    <p class="text-lg font-semibold">Total ${{ number_format($order->carts->sum(function ($cart) {
                        return $cart->product->price * $cart->quantity;
                    }), 2) }}</p>
                </div>
            </div>
        @endforeach
    @endif
</div>
