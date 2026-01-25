@include('nav')
        <header>
        <section class="header">
            <div class="container mx-auto flex flex-col lg:flex-row justify-between items-center gap-10 px-4 py-8 lg:py-12">
                <div class="tex text-center lg:text-start w-full lg:w-5/12">
                <p class="text-3xl sm:text-5xl lg:text-6xl font-bold">{{ __('Online Shopping') }}</p>
                <p class="my-6 text-sm sm:text-base">"{{ __('Discover Amazing Deals and Shop Your Favorites Today!') }}"
                </p>
                <button class="bg-orange-600 text-white px-6 sm:px-8 py-2 sm:py-3 rounded-2xl hover:bg-orange-700 transition">{{ __('Learn More') }}</button>
            </div>
                <img class="w-full sm:w-2/3 lg:w-5/12 h-auto" src="{{ URL('images/Untitled-1.png') }}" alt="Shopping Banner">
            </div>
        </section>
    </header>
    <main>
        <h2 class="font-bold text-center text-3xl sm:text-4xl lg:text-5xl mb-10 text-gray-900 px-4">{{ __('Store Departments') }}</h2>
        <div class="mx-auto max-w-full px-4 py-10 sm:px-6 sm:py-6 lg:px-8 bg-indigo-400">      

          <div class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">

            @foreach ($categories as $category)
            <a href="{{ route('category.products', $category) }}" class="block h-full"> 
            <div class="bg-white rounded-2xl overflow-hidden hover:shadow-2xl hover:scale-105 transition duration-300 ease-in-out h-full flex flex-col">
           
            <img src="{{ asset('storage/' . $category->image_path) }}" class="aspect-square w-full rounded-md bg-gray-200 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-60">
            <div class="mt-4 flex flex-col text-center place-content-center p-4 flex-grow">
              <div>
                <p class="mt-1 text-lg sm:text-xl lg:text-2xl font-semibold text-black">{{ $category->name }}</p>
                <p class="text-xs sm:text-sm font-medium text-black my-4">{{ __('Here You Find All The') }} {{ $category->name }} {{ __('Items..') }}</p>
              </div>
            </div>            
          </div>
          </a>
      @endforeach
        </div>           

                
                <!-- More products... -->
              <div class="mt-4 flex justify-center">
                {{ $categories->links() }}
            </div>
        </div>
    </main>
          <section class="offer bg-white py-8 px-4 sm:py-12 sm:px-6">
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold mt-6 text-center text-gray-900">{{ __('New Offers') }}</h2>
            <div class="bg-white">
                <div class="mx-auto w-full px-4 py-12 sm:px-6 lg:px-8">
                  <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 xl:gap-6">
                    @forelse($newOffers as $offer)
                    <a href="{{ route('products.show', $offer) }}" class="block h-full">
                    <div class="group relative border-2 border-solid rounded-2xl p-4 border-gray-400 hover:shadow-2xl hover:scale-105 hover:-translate-y-1 transition duration-300 ease-in-out h-full flex flex-col">
                      <p class="font-bold text-sm sm:text-base">{{ $offer->name }}</p>
                      <img src="{{ asset('storage/' . $offer->image_path) }}"  class="aspect-square w-full bg-gray-400 object-cover group-hover:opacity-75 h-48 sm:h-64 lg:h-80 border-2 border-solid my-2 rounded-2xl">
                      <div class="mt-4 flex flex-col text-center place-content-center flex-grow">
                        <div>
                                <p class="mt-1 text-xs sm:text-sm text-gray-500">{{ $offer->category->name ?? '' }}</p>
                                <del class="text-gray-400 text-xs sm:text-sm">{{ number_format($offer->price, 2) }}$</del>
                                <p class="text-blue-900 my-2 text-sm sm:text-base">{{ number_format($offer->offer_price, 2) }}$</p>
                        </div>
                      </div>                
                    </div>
                    </a>
                    @empty
                    <div class="col-span-full text-center py-10">
                        <p class="text-gray-500">{{ __('No offers available at the moment.') }}</p>
                    </div>
                    @endforelse
                  </div>
                  <div class="mt-8 flex justify-center">
                    {{ $newOffers->appends(request()->query())->links() }}
                  </div>
                </div>
              </div>
          </section>
          {{-- End Offer Section --}}
    </main>
        {{-- Start Footer --}}
        <footer>
            <section class="bg-indigo-400 py-8 px-4">
                <div class="flex flex-col md:flex-row place-content-around place-items-center text-white gap-8">
                    <div class="img text-center md:text-left">
                        <img src="{{ URL('images/logo2.png') }}" class="w-32 md:w-40" alt="logo">
                    </div>
                    <div class="flex flex-col text-center md:text-left">
                        <a href="{{ route('contact-us') }}" class="hover:opacity-80 transition">{{ __('Contact Us') }}</a>
                        <a href="#" class="hover:opacity-80 transition">{{ __('Support') }}</a>
                        <a href="#" class="hover:opacity-80 transition">{{ __('Services') }}</a>
                    </div>

                    <div class="flex flex-col text-center md:text-left">
                        <a href="#" class="hover:opacity-80 transition">{{ __('Store Departments') }}</a>
                        <a href="#" class="hover:opacity-80 transition">{{ __('New Offers') }}</a>
                        <a href="#" class="hover:opacity-80 transition">{{ __('Services') }}</a>
                    </div>

                    <div class="flex flex-col text-center md:text-left">
                        <a href="{{ route('about-us') }}" class="hover:opacity-80 transition">{{ __('About Us') }}</a>
                        <a href="#" class="hover:opacity-80 transition">{{ __('Favorites') }}</a>
                        <a href="#" class="hover:opacity-80 transition">{{ __('Cart') }}</a>
                    </div>
                </div>
                <div class="bg-white w-11/12 md:w-3/4 h-1 my-6 mx-auto">
                </div>
                <div class="social text-center flex justify-center flex-wrap gap-4 py-6">
                   
                    <a href="" class="hover:scale-110 transition">
                        <img src="{{ URL('images/facebook.svg') }}" class="w-10 bg-white rounded-full p-2" alt="Facebook">
                    </a>
                    <a href="" class="hover:scale-110 transition">
                        <img src="{{ URL('images/whats-app.svg') }}" class="w-10 bg-white rounded-full p-2" alt="WhatsApp">
                    </a>
                    <a href="" class="hover:scale-110 transition">
                        <img src="{{ URL('images/instagram-.svg') }}" class="w-10 bg-white rounded-full p-2" alt="Instagram">
                    </a>
                    <a href="" class="hover:scale-110 transition">
                        <img src="{{ URL('images/telegram.svg') }}" class="w-10 bg-white rounded-full p-2" alt="Telegram">
                    </a>
                    <a href="" class="hover:scale-110 transition">
                        <img src="{{ URL('images/tiktok.svg') }}" class="w-10 bg-white rounded-full p-2" alt="TikTok">
                    </a>
                    <a href="" class="hover:scale-110 transition">
                        <img src="{{ URL('images/twitter-x.svg') }}" class="w-10 bg-white rounded-full p-2" alt="Twitter">
                    </a>
                        
                </div>
                <p class="text-center text-white font-medium pb-6 text-xs sm:text-sm">{{ __('Contact Number') }} : +970592834690</p>
            </section>
            
        </footer>
</body>
</html>