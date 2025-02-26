@include('./link')
@include('./nav')
            <div class="mx-auto max-w-2xl px-4 py-10 sm:px-6 sm:py-6 lg:max-w-full lg:px-8">      
              <div class="">
              <input 
              type="text" 
              id="Search" 
              placeholder="Search Category..." 
              class="w-1/4 px-4 py-2 border rounded-lg"
          >
          <div id="searchResults" class="mt-4"></div>
        </div>
            <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8 ">

              @foreach ($categories as $category)
              <div class="bg-indigo-400 rounded-2xl category-item">
              
              <img src="{{ asset('storage/' . $category->image_path) }}" class="aspect-square w-full rounded-md bg-gray-200 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-60">
              <div class="mt-4 flex text-center place-content-center  ">
                <div>
                  <p class="mt-1 text-2xl text-white">{{ $category->name }}</p>
                  <p class="text-sm font-medium text-white my-4">Here You Find All The {{ $category->name }} Items..</p>
                  <div class="flex">
                  <h3 class="text-sm text-gray-700">
                    <a href="{{ route('category.products', $category) }}">
                    <button class="bg-orange-600 text-white w-24 h-8 rounded-md mb-6">Shop Now</button> 
                    </a>
                  </h3>

                    @auth
                    @if(Auth::user()->is_admin)
                    <button class="ml-4 bg-orange-600 text-white w-24 h-8 rounded-md mb-6">
                      <a href="{{ route('categories.show', $category) }}"
                      >Procedures
                     </a>  
                   </button> 
                    @endif
                @endauth
              </div>
                </div>
              </div>    
            </div>
        @endforeach
          </div>           
        </div>
  <script>
    document.getElementById('Search').addEventListener('input', function(e) {
        const query = e.target.value.toLowerCase();
        const categories = document.querySelectorAll('.category-item');
    
        categories.forEach(category => {
            const name = category.querySelector('h3').textContent.toLowerCase();
            const description = category.querySelector('p').textContent.toLowerCase();
            
            if (name.includes(query) || description.includes(query)) {
                category.style.display = 'block';
            } else {
                category.style.display = 'none';
            }
        });
    });
    </script>
  </body>
</html>