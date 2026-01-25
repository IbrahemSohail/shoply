@include('./nav')
<div>
    <div class="container mx-auto px-4 py-4">
        <nav class="flex text-sm font-medium text-gray-500 mb-4">
            <a href="{{ route('home') }}" class="hover:text-indigo-600 transition">{{ __('Home') }}</a>
            <span class="mx-2">/</span>
            <a href="{{ route('products.index') }}" class="hover:text-indigo-600 transition">{{ __('Products') }}</a>
            <span class="mx-2">/</span>
            <span class="text-gray-900">{{ $product->name }}</span>
        </nav>
    </div>
    <div class="container mx-auto px-4 py-6 sm:py-8">
      <div class="flex flex-col md:flex-row gap-6 md:gap-8">
        <!-- Product Images -->
        <div class="w-full md:w-1/2">

        @if($product->image_path)
        <img 
            src="{{ asset('storage/' . $product->image_path) }}" 
            class="w-full h-48 sm:h-96 object-cover rounded-lg"
            alt="{{ $product->name }}"
        >
    @else
        <div class="w-full h-48 sm:h-96 bg-gray-100 rounded-lg flex items-center justify-center">
            <svg class="w-16 h-16 sm:w-24 sm:h-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
        </div>
    @endif
</div>
  
        <!-- Product Details -->
        <div class="w-full md:w-1/2">
          <h4 class="text-2xl sm:text-3xl font-bold mb-4">{{ $product->name }}</h3>
          <p class="text-gray-700 mb-6 text-sm sm:text-base">{{ $product->description }}</p>
          <div class="mb-6">
            @if($product->offer_price)
                <span class="text-gray-500 line-through text-lg mr-2">${{ number_format($product->price, 2) }}</span>
                <span class="text-2xl sm:text-3xl font-bold text-red-600">${{ number_format($product->offer_price, 2) }}</span>
            @else
                <span class="text-2xl sm:text-3xl font-bold mr-2">${{ number_format($product->price, 2) }}</span>
            @endif
          </div>
            <div class="mt-4 mb-6">
                <label for="color" class="block font-medium text-sm mb-2">{{ __('Color Available') }}:</label>
                <select name="color" id="color" class="w-full sm:w-48 px-3 py-2 border border-gray-300 rounded-md text-sm">
                    <option value=""></option>
                    <option value="">{{ __('White') }}</option>
                    <option value="">{{ __('Black') }}</option>
                    <option value="">{{ __('Blue') }}</option>
                </select>
              </div>
          
  
          <div class="flex flex-col gap-4 mb-6">
            <form action="{{ route('cart.add', $product) }}" method="POST" class="w-full">
              @csrf
              <input type="hidden" name="product_id" value="{{ $product->id }}">

              <div class="mb-4">
                <label for="quantity" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Quantity') }}:</label>
                <input type="number" id="quantity" name="quantity" min="1" value="1"
                              class="w-full sm:w-24 px-3 py-2 text-center rounded-md border border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-sm">
              </div>
            <button type="submit"
                          class="w-full bg-gray-400 flex gap-2 items-center justify-center text-white px-6 py-2 sm:py-3 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition text-sm sm:text-base">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                              stroke-width="1.5" stroke="currentColor" class="w-5 h-5 sm:w-6 sm:h-6">
                              <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                          </svg>
                          {{ __('Add to Cart') }}
                      </button>
                    </form>

          </div>
        </div>
      </div>
    </div>
  </div>