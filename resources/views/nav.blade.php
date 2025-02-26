@include('link')
<body>
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
  </body>