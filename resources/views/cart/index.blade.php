@include('link')
@include('nav')

<section class="bg-white py-6 sm:py-8 antialiased md:py-12">
    <div class="mx-auto w-full px-4 sm:px-6 lg:max-w-screen-xl lg:px-8 2xl:px-0">
      <h2 class="text-lg sm:text-xl font-semibold text-gray-900">Shopping Cart</h2>
  
      <div class="mt-6 sm:mt-8 flex flex-col lg:flex-row gap-6 lg:gap-8">
        <div class="w-full lg:max-w-3xl flex-1">
           @if($cartItems->isEmpty())
        <div class="alert alert-info text-center py-4 px-4 bg-blue-50 border border-blue-200 rounded-lg text-sm sm:text-base">Cart Empty</div>
    @else
          <div class="space-y-4 sm:space-y-6">
                @foreach($cartItems as $item)

            <div class="rounded-lg border border-gray-200 bg-white p-3 sm:p-6 shadow-sm">
              <div class="flex flex-col space-y-4 sm:flex-row sm:items-center sm:justify-between sm:gap-6 sm:space-y-0">
                
                <a href="#" class="shrink-0">
                  <img class="h-20 w-20 sm:h-24 sm:w-24 object-cover rounded" src="{{ asset('storage/' . $item->product->image_path) }}" alt="Product" />
  
                </a>

                <div class="flex flex-col flex-1">
                  <a href="#" class="text-base font-medium text-gray-900 hover:underline mb-2">{{ $item->product->description }}</a>
                  <p class="text-sm text-gray-600">Quantity: {{ $item->quantity }}</p>
                </div>

                <div class="flex flex-col items-end gap-4">
                  <div>
                    <p class="text-base sm:text-lg font-bold text-gray-900">${{ number_format($item->product->price, 2) }}</p>
                  </div>
                  
                  <form action="{{ route('cart.remove', $item) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center text-xs sm:text-sm font-medium text-red-600 hover:underline">
                      <svg class="me-1.5 h-4 w-4 sm:h-5 sm:w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                      </svg>
                      Remove
                    </button>
                  </form>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>

        <div class="w-full lg:w-96 space-y-6 lg:space-y-4">
          <div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 sm:p-6 shadow-sm">
            <p class="text-lg sm:text-xl font-semibold text-gray-900">Order summary</p>
  
            <div class="space-y-4 text-sm sm:text-base">
              <div class="space-y-2">
                <dl class="flex items-center justify-between gap-4">
                  <dt class="font-normal text-gray-500">Original price</dt>
                  <dd class="font-medium text-gray-900">${{ number_format($originalPrice, 2) }}</dd>
                </dl>
  
                <dl class="flex items-center justify-between gap-4">
                  <dt class="font-normal text-gray-500">Savings</dt>
                  <dd class="font-medium text-green-600">-${{ number_format($savings, 2) }}</dd>
                </dl>
  
                <dl class="flex items-center justify-between gap-4">
                  <dt class="font-normal text-gray-500">Store Pickup</dt>
                  <dd class="font-medium text-gray-900">${{ number_format($storePickup, 2) }}</dd>
                </dl>
  
                <dl class="flex items-center justify-between gap-4">
                  <dt class="font-normal text-gray-500">Tax</dt>
                  <dd class="font-medium text-gray-900">${{ number_format($tax, 2) }}</dd>
                </dl>
              </div>
  
              <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2">
                <dt class="font-bold text-gray-900">Total</dt>
                <dd class="font-bold text-gray-900">${{ number_format($total, 2) }}</dd>
              </dl>
            </div>
  
            <a href="{{route('checkout')}}" class="flex w-full items-center justify-center rounded-lg bg-gray-700 px-4 sm:px-5 py-2 sm:py-2.5 text-xs sm:text-sm font-medium text-white hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-gray-300 transition">Checkout</a>
  
            <div class="flex items-center justify-center gap-2 text-xs sm:text-sm">
              <span class="font-normal text-gray-500"> or </span>
              <a href="{{ route('home') }}" class="inline-flex items-center gap-2 font-medium text-indigo-700 underline hover:no-underline">
                Continue Shopping
                <svg class="h-4 w-4 sm:h-5 sm:w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
        @endif

  </section>
