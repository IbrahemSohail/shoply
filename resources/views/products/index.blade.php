@include('./link')
<section class="offer py-8 px-4 sm:px-6">
    <div class="mb-8"> 
    @if(isset($category))
    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-center text-gray-900">{{ $category->name }} Product</h2>
    @else
    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-center text-gray-900"> Product </h2>
@endif

</div>
<div class="flex flex-col sm:flex-row justify-between items-center gap-4 mb-6">
    @auth
    @if(Auth::user()->is_admin)
    <a 
    href="{{ route('products.create') }}" 
    class="bg-gray-400 hover:bg-gray-700 text-white px-4 py-2 rounded-lg w-full sm:w-auto text-center text-sm">
    Add New Product
</a>
    @endif
@endauth
 
<input 
    type="text" 
    id="liveSearch" 
    placeholder="Search Product .." 
    class="w-full sm:w-1/3 px-4 py-2 border rounded-lg text-sm"
>
</div>
<div id="searchResults" class="mt-4"></div>

    <div class="bg-white">
        <div class="mx-auto w-full px-4 py-8 sm:px-6 sm:py-4 lg:px-8">
            <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-6">
                @forelse($products as $product)
                <a href="{{ route('products.show', $product) }}" class="group relative">
                    <div class="group relative border-2 border-solid rounded-2xl p-4 border-gray-400 hover:shadow-lg transition-shadow">
                        @if($product->image_path)
                            <img 
                                src="{{ asset('storage/'.$product->image_path) }}" 
                                class="w-full h-40 sm:h-48 object-cover rounded-lg"
                                alt="{{ $product->name }}"
                            >
                        @else
                            <div class="w-full h-40 sm:h-48 bg-gray-100 rounded-lg flex items-center justify-center">
                                <svg class="w-10 h-10 sm:w-12 sm:h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        @endif
                        <div class="mt-4">
                            <h3 class="text-base sm:text-lg font-bold">{{ $product->name }}</h3>
                            <p class="text-blue-900 my-2 text-sm sm:text-base">${{ number_format($product->price, 2) }}</p>
                            <button class="w-full px-4 py-2 rounded-2xl bg-gray-200 hover:bg-gray-300 transition-colors text-xs sm:text-sm">
                                Show more..
                            </button>
                        </div>
                        <div class="flex flex-wrap gap-2 mt-2">
                            @auth
                            @if(auth()->user()->is_admin)     
                            <form action="{{ route('products.destroy', $product) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 text-xs sm:text-sm" onclick="return confirm('Are you Sure ?')">Delete</button>
                            </form>
                            @endif
                        @endauth

                            @auth
                            @if(auth()->user()->is_admin)     
                            <form action="{{ route('products.edit', $product) }}">
                                <button type="submit" class="text-blue-500 hover:text-blue-700 text-xs sm:text-sm">edit</button>
                            </form>
                            @endif
                        @endauth

                    
                        </div>
                    </div>
                </a>
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-500 text-sm sm:text-base">No products found</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>

<script>
    document.getElementById('liveSearch').addEventListener('input', function(e) {
        const query = e.target.value;
        if (query.length < 2) {
            document.getElementById('searchResults').innerHTML = '';
            return;
        }
    
        fetch(`/live-search?query=${encodeURIComponent(query)}`)
            .then(response => response.json())
            .then(data => {
                let html = '';
                if (data.products.length > 0 || data.categories.length > 0) {
                    html += '<div class="bg-white p-3 sm:p-4 rounded-lg shadow-md text-sm">';
                    
                    if (data.products.length > 0) {
                        html += '<h3 class="font-bold mb-2">Product</h3>';
                        html += '<div class="grid grid-cols-1 sm:grid-cols-2 gap-2">';
                        data.products.forEach(product => {
                            html += `
                                <div class="p-2 hover:bg-gray-100 rounded">
                                    <a href="/products/${product.id}" class="text-xs sm:text-sm">${product.name}</a>
                                </div>
                            `;
                        });
                        html += '</div>';
                    }
    
                    html += '</div>';
                } else {
                    html = '<p class="text-gray-600 text-sm">No Product</p>';
                }
                document.getElementById('searchResults').innerHTML = html;
            });
    });
    </script>