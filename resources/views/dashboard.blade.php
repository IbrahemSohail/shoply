<x-app-layout>
    <div class="py-6 sm:py-12" x-data="{ activeTab: 'categories' }">
        <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Home Button -->
            <div class="mb-6">
                <a href="{{ route('home') }}" class="inline-flex items-center px-3 sm:px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition text-xs sm:text-sm">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2.293-2.293a1 1 0 011.414 0L9 9.414l6.293-6.293a1 1 0 011.414 0l2.293 2.293M3 12a9 9 0 1118 0m0 0v-5m0 5H9"/>
                    </svg>
                    Back to Home
                </a>
            </div>

            <!-- Dashboard Tabs Navigation -->
            <div class="flex flex-wrap border-b border-gray-200 mb-6 gap-4 sm:gap-0">
                <button @click="activeTab = 'categories'" 
                    :class="activeTab === 'categories' ? 'border-b-2 border-indigo-500 text-indigo-600' : 'text-gray-600 hover:text-gray-900'"
                    class="px-4 sm:px-6 py-3 font-medium transition-colors cursor-pointer text-xs sm:text-base">
                    Categories
                </button>
                <button @click="activeTab = 'products'" 
                    :class="activeTab === 'products' ? 'border-b-2 border-indigo-500 text-indigo-600' : 'text-gray-600 hover:text-gray-900'"
                    class="px-4 sm:px-6 py-3 font-medium transition-colors cursor-pointer text-xs sm:text-base">
                    Products
                </button>
                <button @click="activeTab = 'taxes'" 
                    :class="activeTab === 'taxes' ? 'border-b-2 border-indigo-500 text-indigo-600' : 'text-gray-600 hover:text-gray-900'"
                    class="px-4 sm:px-6 py-3 font-medium transition-colors cursor-pointer text-xs sm:text-base">
                    Taxes
                </button>
            </div>

            <!-- Categories Tab -->
            <div x-show="activeTab === 'categories'" x-transition class="space-y-4">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-900">Categories</h2>
                    <button @click="$dispatch('open-modal', 'create-category')" 
                        class="w-full sm:w-auto bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition text-sm">
                        Add Category
                    </button>
                </div>

                <div class="bg-white rounded-lg shadow overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-3 sm:px-6 py-3 text-left text-gray-700 text-xs sm:text-sm">Name</th>
                                <th class="px-3 sm:px-6 py-3 text-left text-gray-700 text-xs sm:text-sm">Image</th>
                                <th class="px-3 sm:px-6 py-3 text-left text-gray-700 text-xs sm:text-sm">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $category)
                            <tr class="border-t hover:bg-gray-50">
                                <td class="px-3 sm:px-6 py-3 text-xs sm:text-sm">{{ $category->name }}</td>
                                <td class="px-3 sm:px-6 py-3">
                                    @if($category->image_path)
                                        <img src="{{ asset('storage/' . $category->image_path) }}" alt="{{ $category->name }}" class="h-8 w-8 sm:h-10 sm:w-10 rounded">
                                    @endif
                                </td>
                                <td class="px-3 sm:px-6 py-3 flex flex-wrap gap-2">
                                    <button @click="$dispatch('open-modal', 'show-category'); window.categoryId = {{ $category->id }}; window.categoryData = {
                                        id: {{ $category->id }},
                                        name: '{{ $category->name }}',
                                        image: '{{ $category->image_path ? asset('storage/' . $category->image_path) : '' }}'
                                    }" 
                                        class="text-blue-500 hover:text-blue-700 text-xs sm:text-sm">
                                        Show
                                    </button>
                                    <button @click="$dispatch('open-modal', 'edit-category'); window.categoryId = {{ $category->id }}; window.categoryData = {
                                        id: {{ $category->id }},
                                        name: '{{ $category->name }}'
                                    }" 
                                        class="text-yellow-500 hover:text-yellow-700 text-xs sm:text-sm">
                                        Edit
                                    </button>
                                    <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline" id="delete-category-dashboard-{{ $category->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="text-red-500 hover:text-red-700 text-xs sm:text-sm" onclick="confirmDelete('delete-category-dashboard-{{ $category->id }}')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="px-3 sm:px-6 py-3 text-center text-gray-500 text-xs sm:text-sm">No categories found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Products Tab -->
            <div x-show="activeTab === 'products'" x-transition class="space-y-4">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-900">Products</h2>
                    <button @click="$dispatch('open-modal', 'create-product')" 
                        class="w-full sm:w-auto bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition text-sm">
                        Add Product
                    </button>
                </div>

                <div class="bg-white rounded-lg shadow overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-3 sm:px-6 py-3 text-left text-gray-700 text-xs sm:text-sm">Name</th>
                                <th class="px-3 sm:px-6 py-3 text-left text-gray-700 text-xs sm:text-sm">Category</th>
                                <th class="px-3 sm:px-6 py-3 text-left text-gray-700 text-xs sm:text-sm">Price</th>
                                <th class="px-3 sm:px-6 py-3 text-left text-gray-700 text-xs sm:text-sm">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)
                            <tr class="border-t hover:bg-gray-50">
                                <td class="px-3 sm:px-6 py-3 text-xs sm:text-sm">{{ $product->name }}</td>
                                <td class="px-3 sm:px-6 py-3 text-xs sm:text-sm">{{ $product->category->name ?? 'N/A' }}</td>
                                <td class="px-3 sm:px-6 py-3 text-xs sm:text-sm">${{ number_format($product->price, 2) }}</td>
                                <td class="px-3 sm:px-6 py-3 flex flex-wrap gap-2">
                                    <button @click="$dispatch('open-modal', 'show-product'); window.productId = {{ $product->id }}; window.productData = {
                                        id: {{ $product->id }},
                                        name: '{{ $product->name }}',
                                        title: '{{ $product->title }}',
                                        description: '{{ $product->description }}',
                                        price: {{ $product->price }},
                                        category: '{{ $product->category->name ?? '' }}'
                                    }" 
                                        class="text-blue-500 hover:text-blue-700 text-xs sm:text-sm">
                                        Show
                                    </button>
                                    <button @click="$dispatch('open-modal', 'edit-product'); window.productId = {{ $product->id }}; window.productData = {
                                        id: {{ $product->id }},
                                        name: '{{ $product->name }}',
                                        title: '{{ $product->title }}',
                                        description: '{{ $product->description }}',
                                        price: {{ $product->price }},
                                        offer_price: {{ $product->offer_price ?? 'null' }}
                                    }" 
                                        class="text-yellow-500 hover:text-yellow-700 text-xs sm:text-sm">
                                        Edit
                                    </button>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline" id="delete-product-dashboard-{{ $product->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="text-red-500 hover:text-red-700 text-xs sm:text-sm" onclick="confirmDelete('delete-product-dashboard-{{ $product->id }}')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-3 sm:px-6 py-3 text-center text-gray-500 text-xs sm:text-sm">No products found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Taxes Tab -->
            <div x-show="activeTab === 'taxes'" x-transition class="space-y-4">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-900">Taxes</h2>
                    <button @click="$dispatch('open-modal', 'create-tax')" 
                        class="w-full sm:w-auto bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition text-sm">
                        Add Tax
                    </button>
                </div>

                <div class="bg-white rounded-lg shadow overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-3 sm:px-6 py-3 text-left text-gray-700 text-xs sm:text-sm">Name</th>
                                <th class="px-3 sm:px-6 py-3 text-left text-gray-700 text-xs sm:text-sm">Percent</th>
                                <th class="px-3 sm:px-6 py-3 text-left text-gray-700 text-xs sm:text-sm">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($taxes as $tax)
                            <tr class="border-t hover:bg-gray-50">
                                <td class="px-3 sm:px-6 py-3 text-xs sm:text-sm">{{ $tax->name }}</td>
                                <td class="px-3 sm:px-6 py-3 text-xs sm:text-sm">{{ $tax->percent }}%</td>
                                <td class="px-3 sm:px-6 py-3 flex flex-wrap gap-2">
                                    <button @click="$dispatch('open-modal', 'show-tax'); window.taxId = {{ $tax->id }}; window.taxData = {
                                        id: {{ $tax->id }},
                                        name: '{{ $tax->name }}',
                                        percent: {{ $tax->percent }}
                                    }" 
                                        class="text-blue-500 hover:text-blue-700 text-xs sm:text-sm">
                                        Show
                                    </button>
                                    <button @click="$dispatch('open-modal', 'edit-tax'); window.taxId = {{ $tax->id }}; window.taxData = {
                                        id: {{ $tax->id }},
                                        name: '{{ $tax->name }}',
                                        percent: {{ $tax->percent }}
                                    }" 
                                        class="text-yellow-500 hover:text-yellow-700 text-xs sm:text-sm">
                                        Edit
                                    </button>
                                    <form action="{{ route('taxes.destroy', $tax) }}" method="POST" class="inline" id="delete-tax-dashboard-{{ $tax->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="text-red-500 hover:text-red-700" onclick="confirmDelete('delete-tax-dashboard-{{ $tax->id }}')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="px-6 py-3 text-center text-gray-500">No taxes found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Category Modal -->
    <x-modal name="create-category" :show="false" focusable>
        <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data" class="p-6">
            @csrf
            <h2 class="text-lg font-semibold mb-4">Create Category</h2>
            
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Category Name</label>
                <input type="text" name="name" class="w-full px-3 py-2 border rounded-lg" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Image</label>
                <input type="file" name="image_path" class="w-full px-3 py-2 border rounded-lg" accept="image/*" required>
            </div>

            <div class="flex justify-end gap-3">
                <button type="button" @click="$dispatch('close')" class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg">
                    Cancel
                </button>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                    Create
                </button>
            </div>
        </form>
    </x-modal>

    <!-- Show Category Modal -->
    <x-modal name="show-category" :show="false" focusable>
        <div class="p-6">
            <h2 class="text-lg font-semibold mb-4">Category Details</h2>
            
            <div class="mb-4">
                <p class="text-gray-600">Name: <span id="show-cat-name" class="font-semibold text-gray-900"></span></p>
            </div>

            <div class="mb-4">
                <p class="text-gray-600">Image:</p>
                <img id="show-cat-image" class="mt-2 h-32 w-32 rounded object-cover" src="" alt="Category Image">
            </div>

            <div class="flex justify-end">
                <button @click="$dispatch('close')" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">
                    Close
                </button>
            </div>
        </div>
    </x-modal>

    <!-- Edit Category Modal -->
    <x-modal name="edit-category" :show="false" focusable>
        <form method="POST" class="p-6" id="edit-category-form">
            @csrf
            @method('PUT')
            <h2 class="text-lg font-semibold mb-4">Edit Category</h2>
            
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Category Name</label>
                <input type="text" id="edit-cat-name" name="name" class="w-full px-3 py-2 border rounded-lg" required>
            </div>

            <div class="flex justify-end gap-3">
                <button type="button" @click="$dispatch('close')" class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg">
                    Cancel
                </button>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                    Update
                </button>
            </div>
        </form>
    </x-modal>

    <!-- Show Product Modal -->
    <x-modal name="show-product" :show="false" focusable>
        <div class="p-6">
            <h2 class="text-lg font-semibold mb-4">Product Details</h2>
            
            <div class="space-y-3">
                <p class="text-gray-600">Name: <span id="show-prod-name" class="font-semibold text-gray-900"></span></p>
                <p class="text-gray-600">Title: <span id="show-prod-title" class="font-semibold text-gray-900"></span></p>
                <p class="text-gray-600">Description: <span id="show-prod-desc" class="font-semibold text-gray-900"></span></p>
                <p class="text-gray-600">Price: $<span id="show-prod-price" class="font-semibold text-gray-900"></span></p>
                <p class="text-gray-600">Category: <span id="show-prod-cat" class="font-semibold text-gray-900"></span></p>
            </div>

            <div class="flex justify-end mt-6">
                <button @click="$dispatch('close')" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">
                    Close
                </button>
            </div>
        </div>
    </x-modal>

    <!-- Edit Product Modal -->
    <x-modal name="edit-product" :show="false" focusable>
        <form method="POST" class="p-6" id="edit-product-form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h2 class="text-lg font-semibold mb-4">Edit Product</h2>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-gray-700 mb-2">Name</label>
                    <input type="text" id="edit-prod-name" name="name" class="w-full px-3 py-2 border rounded-lg" required>
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">Title</label>
                    <input type="text" id="edit-prod-title" name="title" class="w-full px-3 py-2 border rounded-lg" required>
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">Description</label>
                    <textarea id="edit-prod-desc" name="description" class="w-full px-3 py-2 border rounded-lg" required></textarea>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 mb-2">Price</label>
                        <input type="number" id="edit-prod-price" name="price" step="0.01" class="w-full px-3 py-2 border rounded-lg" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2">Offer Price (Optional)</label>
                        <input type="number" id="edit-prod-offer-price" name="offer_price" step="0.01" class="w-full px-3 py-2 border rounded-lg">
                    </div>
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">Category</label>
                    <select name="category_id" id="edit-prod-category" class="w-full px-3 py-2 border rounded-lg" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                 <div>
                    <label class="block text-gray-700 mb-2">Update Image (Optional)</label>
                    <input type="file" name="image" class="w-full px-3 py-2 border rounded-lg" accept="image/*">
                </div>
            </div>

            <div class="flex justify-end gap-3 mt-6">
                <button type="button" @click="$dispatch('close')" class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg">
                    Cancel
                </button>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                    Update
                </button>
            </div>
        </form>
    </x-modal>

    <!-- Show Tax Modal -->
    <x-modal name="show-tax" :show="false" focusable>
        <div class="p-6">
            <h2 class="text-lg font-semibold mb-4">Tax Details</h2>
            
            <div class="space-y-3">
                <p class="text-gray-600">Name: <span id="show-tax-name" class="font-semibold text-gray-900"></span></p>
                <p class="text-gray-600">Percent: <span id="show-tax-percent" class="font-semibold text-gray-900"></span>%</p>
            </div>

            <div class="flex justify-end mt-6">
                <button @click="$dispatch('close')" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">
                    Close
                </button>
            </div>
        </div>
    </x-modal>

    <!-- Edit Tax Modal -->
    <x-modal name="edit-tax" :show="false" focusable>
        <form method="POST" class="p-6" id="edit-tax-form">
            @csrf
            @method('PUT')
            <h2 class="text-lg font-semibold mb-4">Edit Tax</h2>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-gray-700 mb-2">Name</label>
                    <input type="text" id="edit-tax-name" name="name" class="w-full px-3 py-2 border rounded-lg" required>
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">Percent</label>
                    <input type="number" id="edit-tax-percent" name="percent" step="0.01" min="0" max="100" class="w-full px-3 py-2 border rounded-lg" required>
                </div>
            </div>

            <div class="flex justify-end gap-3 mt-6">
                <button type="button" @click="$dispatch('close')" class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg">
                    Cancel
                </button>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                    Update
                </button>
            </div>
        </form>
    </x-modal>

    <!-- Create Product Modal -->
    <x-modal name="create-product" :show="false" focusable>
        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" class="p-6">
            @csrf
            <h2 class="text-lg font-semibold mb-4">Create Product</h2>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-gray-700 mb-2">Name</label>
                    <input type="text" name="name" class="w-full px-3 py-2 border rounded-lg" required>
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">Title</label>
                    <input type="text" name="title" class="w-full px-3 py-2 border rounded-lg" required>
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">Description</label>
                    <textarea name="description" class="w-full px-3 py-2 border rounded-lg" required></textarea>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 mb-2">Price</label>
                        <input type="number" name="price" step="0.01" class="w-full px-3 py-2 border rounded-lg" required>
                    </div>
                     <div>
                        <label class="block text-gray-700 mb-2">Offer Price (Optional)</label>
                        <input type="number" name="offer_price" step="0.01" class="w-full px-3 py-2 border rounded-lg">
                    </div>
                </div>
                 <div>
                    <label class="block text-gray-700 mb-2">Tax</label>
                    <input type="number" name="tax" step="0.01" class="w-full px-3 py-2 border rounded-lg" required>
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">Category</label>
                    <select name="category_id" class="w-full px-3 py-2 border rounded-lg" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                 <div>
                    <label class="block text-gray-700 mb-2">Tax Type</label>
                    <select name="tax_id" class="w-full px-3 py-2 border rounded-lg" required>
                        <option value="">Select Tax</option>
                        @foreach($taxes as $tax)
                        <option value="{{ $tax->id }}">{{ $tax->name }} ({{ $tax->percent }}%)</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">Image</label>
                    <input type="file" name="image" class="w-full px-3 py-2 border rounded-lg" accept="image/*" required>
                </div>
            </div>

            <div class="flex justify-end gap-3 mt-6">
                <button type="button" @click="$dispatch('close')" class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg">
                    Cancel
                </button>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                    Create
                </button>
            </div>
        </form>
    </x-modal>

    <!-- Create Tax Modal -->
    <x-modal name="create-tax" :show="false" focusable>
        <form method="POST" action="{{ route('taxes.store') }}" class="p-6">
            @csrf
            <h2 class="text-lg font-semibold mb-4">Create Tax</h2>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-gray-700 mb-2">Name</label>
                    <input type="text" name="name" class="w-full px-3 py-2 border rounded-lg" required>
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">Percent</label>
                    <input type="number" name="percent" step="0.01" min="0" max="100" class="w-full px-3 py-2 border rounded-lg" required>
                </div>
            </div>

            <div class="flex justify-end gap-3 mt-6">
                <button type="button" @click="$dispatch('close')" class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg">
                    Cancel
                </button>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                    Create
                </button>
            </div>
        </form>
    </x-modal>

    <script>
        // Populate show category modal
        document.addEventListener('open-modal', (e) => {
            if (e.detail === 'show-category' && window.categoryData) {
                document.getElementById('show-cat-name').textContent = window.categoryData.name;
                if (window.categoryData.image) {
                    document.getElementById('show-cat-image').src = window.categoryData.image;
                }
            }
            
            // Populate edit category modal
            if (e.detail === 'edit-category' && window.categoryData) {
                document.getElementById('edit-cat-name').value = window.categoryData.name;
                const form = document.getElementById('edit-category-form');
                form.action = `/categories/${window.categoryData.id}`;
            }
            
            // Populate show product modal
            if (e.detail === 'show-product' && window.productData) {
                document.getElementById('show-prod-name').textContent = window.productData.name;
                document.getElementById('show-prod-title').textContent = window.productData.title;
                document.getElementById('show-prod-desc').textContent = window.productData.description;
                document.getElementById('show-prod-price').textContent = window.productData.price.toFixed(2);
                document.getElementById('show-prod-cat').textContent = window.productData.category;
            }
            
            // Populate edit product modal
            if (e.detail === 'edit-product' && window.productData) {
                document.getElementById('edit-prod-name').value = window.productData.name;
                document.getElementById('edit-prod-title').value = window.productData.title;
                document.getElementById('edit-prod-desc').value = window.productData.description;
                document.getElementById('edit-prod-price').value = window.productData.price;
                
                // Set offer price
                document.getElementById('edit-prod-offer-price').value = window.productData.offer_price || '';

                // Set category
                if(window.productData.category_id) {
                     document.getElementById('edit-prod-category').value = window.productData.category_id;
                }
                
                const form = document.getElementById('edit-product-form');
                form.action = `/products/${window.productData.id}`;
            }
            
            // Populate show tax modal
            if (e.detail === 'show-tax' && window.taxData) {
                document.getElementById('show-tax-name').textContent = window.taxData.name;
                document.getElementById('show-tax-percent').textContent = window.taxData.percent;
            }
            
            // Populate edit tax modal
            if (e.detail === 'edit-tax' && window.taxData) {
                document.getElementById('edit-tax-name').value = window.taxData.name;
                document.getElementById('edit-tax-percent').value = window.taxData.percent;
                const form = document.getElementById('edit-tax-form');
                form.action = `/taxes/${window.taxData.id}`;
            }
        });
    </script>
        </div>
    </div>
</x-app-layout>