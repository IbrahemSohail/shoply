@include('link')
@include('nav')
        <header>
        <section class="header">
            <div class="head flex place-content-around place-items-center ">
                <div class="tex">
                <p class="text-6xl ">Online Shopping</p>
                <p class="my-6 text-base w-64">"Discover Amazing Deals and Shop Your Favorites Today!"
                </p>
                <button class="bg-orange-600 text-white w-48 h-10 rounded-2xl">Learn More</button>
            </div>
                <img class="w-1/2" src="{{ URL('images/Untitled-1.png') }}" alt="">
            </div>
        </section>
    </header>
    <main>
        <h2 class="font-bold text-center text-5xl mb-10 text-gray-900 ">Store Departments</h2>
        <div class="mx-auto max-w-2xl px-4 py-10 sm:px-6 sm:py-6 lg:max-w-full lg:px-8 bg-indigo-400">      

          <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">

            @foreach ($categories as $category)
            <div class="bg-white rounded-2xl ">
           
            <img src="{{ asset('storage/' . $category->image_path) }}" class="aspect-square w-full rounded-md bg-gray-200 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-60">
            <div class="mt-4 flex text-center place-content-center ">
              <div>
                <p class="mt-1 text-2xl text-black">{{ $category->name }}</p>
                <p class="text-sm font-medium text-black my-4">Here You Find All The {{ $category->name }} Items..</p>
                <h3 class="text-sm text-gray-700">
                  <a href="{{ route('category.products', $category) }}">
                  <button class="bg-orange-600 text-white w-24 h-8 rounded-md mb-6">Shop Now</button> 
                  </a>
                </h3>
              </div>
            </div>            
          </div>
      @endforeach
        </div>           

                
                <!-- More products... -->
              <div class="mt-4">
                {{ $categories->links() }}
            </div>
        </div>
            </div>
            </div>
          </div>
        </div>

          {{-- Start Offer Section --}}
          <section class="offer">
            <h2 class="text-4xl font-bold mt-6 text-center text-gray-900">New Offers</h2>
            <div class="bg-white">
                <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-4 lg:lg:max-w-full  lg:px-8">
                  <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                    <div class="group relative border-2 border-solid my-2 rounded-2xl p-4 border-gray-400">
                      <p class="font-bold">Best Sellers</p>
                      <img src="{{ URL('images/clock.jpg') }}"  class="aspect-square w-full rounded-md bg-gray-400 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-80 border-2 border-solid my-2 rounded-2xl ">
                      <div class="mt-4 flex text-center place-content-center">
                        <div>
                                <p class="mt-1 text-sm text-gray-500">Black</p>
                                <del class="text-gray-400">25$</del>
                                <p class="text-blue-900 my-2">16$</p>
                              <h3 class="text-gray-700">
                                <a href="#">
                                    <button class="w-60 h-8 rounded-2xl bg-gray-200 mb-4">Add To Cart</button>
                            </a>
                          </h3>
                        </div>
                      </div>                
                    </div>

                    <div class="group relative border-2 border-solid my-2 rounded-2xl p-4 border-gray-400">
                        <p class="font-bold">Best Sellers</p>
                        
                      <img src="{{ URL('images/shoes(1).jpg') }}"  class=" bg-white aspect-square w-full rounded-md bg-gray-200 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-80 border-2 border-solid my-2 rounded-2xl  ">
                      <div class="mt-4 flex text-center place-content-center">
                        <div>
                                <p class="mt-1 text-sm text-gray-500">Black</p>
                                <del class="text-gray-400">25$</del>
                                <p class="text-blue-900 my-2">16$</p>
                              <h3 class="text-gray-700">
                                <a href="#">
                                    <button class="w-60 h-8 rounded-2xl bg-gray-200 mb-4">Add To Cart</button>
                            </a>
                          </h3>
                        </div>
                      </div>                
                    </div>

                    <div class="group relative border-2 border-solid my-2 rounded-2xl p-4 border-gray-400">
                        <p class="font-bold">Best Sellers</p>
                        
                      <img src="{{ URL('images/clothes (6).jpg') }}"  class="aspect-square w-full rounded-md bg-gray-200 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-80 border-2 border-solid my-2 rounded-2xl ">
                      <div class="mt-4 flex text-center place-content-center">
                        <div>
                                <p class="mt-1 text-sm text-gray-500">Black</p>
                                <del class="text-gray-400">25$</del>
                                <p class="text-blue-900 my-2">16$</p>
                              <h3 class="text-gray-700">
                                <a href="#">
                                    <button class="w-60 h-8 rounded-2xl bg-gray-200 mb-4">Add To Cart</button>
                            </a>
                          </h3>
                        </div>
                      </div>                
                    </div>

                    <div class="group relative border-2 border-solid my-2 rounded-2xl p-4 border-gray-400">
                        <p class="font-bold">Best Sellers</p>
                        
                      <img src="{{ URL('images/chain.jpg') }}"  class="aspect-square w-full rounded-md bg-gray-200 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-80 border-2 border-solid my-2 rounded-2xl ">
                      <div class="mt-4 flex text-center place-content-center">
                        <div>
                                <p class="mt-1 text-sm text-gray-500">Black</p>
                                <del class="text-gray-400">25$</del>
                                <p class="text-blue-900 my-2">16$</p>
                              <h3 class="text-gray-700">
                                <a href="#">
                                    <button class="w-60 h-8 rounded-2xl bg-gray-200 mb-4">Add To Cart</button>
                            </a>
                          </h3>
                        </div>
                      </div>                
                    </div>
                    <!-- More products... -->
                  </div>
                </div>
              </div>
          </section>
          {{-- End Offer Section --}}
    </main>
        {{-- Start Footer --}}
        <footer>
            <section class="bg-indigo-400">
                <div class="flex place-content-evenly place-items-center text-white text-xl">
                    <div class="img">
                        <img src="{{ URL('images/logo2.png') }}" class="w-40"alt="logo">
                    </div>
                    <div class="flex flex-col ">
                        <a href="{{ route('contact-us') }}">Contact Us</a>
                        <a href="#">Support</a>
                        <a href="#">Services</a>
                    </div>

                    <div class="flex flex-col">
                        <a href="#">Store Departments</a>
                        <a href="#">New Offers</a>
                        <a href="#">Services</a>
                    </div>

                    <div class="flex flex-col">
                        <a href="{{ route('about-us') }}">About Us</a>
                        <a href="#">Favorites</a>
                        <a href="#">Cart</a>
                    </div>
                </div>
                <div class="bg-white w-3/4 h-1 my-4 mx-auto">
                </div>
                <div class="social text-center flex place-content-center place-items-center py-6">
                   
                    <a href="">
                        <img src="{{ URL('images/facebook.svg') }}" class="w-10 bg-white mx-4 rounded-full p-2 " alt="">
                    </a>
                    <a href="">
                        <img src="{{ URL('images/whats-app.svg') }}" class="w-10 bg-white mx-4 rounded-full p-2 " alt="">
                    </a>
                    <a href="">
                        <img src="{{ URL('images/instagram-.svg') }}" class="w-10 bg-white mx-4 rounded-full p-2" alt="">
                    </a>
                    <a href="">
                        <img src="{{ URL('images/telegram.svg') }}" class="w-10 bg-white mx-4 rounded-full p-2" alt="">
                    </a>
                    <a href="">
                        <img src="{{ URL('images/tiktok.svg') }}" class="w-10 bg-white mx-4 rounded-full p-2" alt="">
                    </a>
                    <a href="">
                        <img src="{{ URL('images/twitter-x.svg') }}" class="w-10 bg-white mx-4 rounded-full p-2" alt="">
                    </a>
                        
                </div>
                <p class="text-center text-white font-medium pb-6">Contact Number : +970592834690</p>
            </section>
            
        </footer>
</body>
</html>