@include('./link')
@include('./nav')
            <div class="mx-auto w-full px-4 py-8 sm:px-6 sm:py-10 lg:px-8">      
              <div class="mb-6">
              <input 
              type="text" 
              id="Search" 
              placeholder="Search Category..." 
              class="w-full sm:w-1/2 lg:w-1/4 px-4 py-2 border rounded-lg text-sm"
          >
          <div id="searchResults" class="mt-4"></div>
        </div>
            <div class="grid grid-cols-1 gap-4 sm:gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:gap-8">

              @foreach ($categories as $category)
              <div class="bg-indigo-400 rounded-2xl category-item hover:shadow-lg transition-shadow">
              
              <img src="{{ asset('storage/' . $category->image_path) }}" class="aspect-square w-full rounded-md bg-gray-200 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-60">
              <div class="mt-4 flex flex-col text-center place-content-center p-4">
                <div>
                  <p class="mt-1 text-lg sm:text-xl lg:text-2xl font-semibold text-white">{{ $category->name }}</p>
                  <p class="text-xs sm:text-sm font-medium text-white my-4">Here You Find All The {{ $category->name }} Items..</p>
                  <div class="flex flex-wrap gap-2 justify-center">
                  <h3 class="text-sm text-gray-700">
                    <a href="{{ route('category.products', $category) }}">
                    <button class="bg-orange-600 text-white px-4 py-2 rounded-md mb-2 hover:bg-orange-700 transition text-xs sm:text-sm">Shop Now</button> 
                    </a>
                  </h3>

                    @auth
                    @if(Auth::user()->is_admin)
                    <button class="bg-orange-600 text-white px-4 py-2 rounded-md mb-2 hover:bg-orange-700 transition text-xs sm:text-sm">
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
            const name = category.querySelector('p:first-of-type').textContent.toLowerCase();
            const description = category.querySelector('p:nth-of-type(2)').textContent.toLowerCase();
            
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