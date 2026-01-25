@include('./nav')

<x-app-layout>
<div class="container mx-auto w-full px-4 sm:px-6 lg:px-8 py-6 sm:py-8 m-2 sm:m-4 lg:m-6">
    <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold mb-6">Edit Product</h1>

    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data" class="w-full max-w-2xl bg-white p-4 sm:p-6 lg:p-8 rounded shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4 sm:mb-5">
            <label class="block text-gray-700 text-sm sm:text-base font-medium mb-2">Product Name</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}" class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600" required>
        </div>

        <div class="mb-4 sm:mb-5">
            <label class="block text-gray-700 text-sm sm:text-base font-medium mb-2">Title</label>
            <input type="text" name="title" value="{{ old('title', $product->title) }}" class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600" required>
        </div>

        <div class="mb-4 sm:mb-5">
            <label class="block text-gray-700 text-sm sm:text-base font-medium mb-2">Description</label>
            <textarea name="description" class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600" rows="4" required>{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5 mb-4 sm:mb-5">
            <div>
                <label class="block text-gray-700 text-sm sm:text-base font-medium mb-2">Price</label>
                <input type="number" name="price" step="0.01" value="{{ old('price', $product->price) }}" class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600" required>
            </div>

            <div>
                 <label class="block text-gray-700 text-sm sm:text-base font-medium mb-2">Offer Price (Optional)</label>
                 <input type="number" step="0.01" name="offer_price" value="{{ old('offer_price', $product->offer_price) }}" class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
            </div>

            <div class="sm:col-span-2">
                <label class="block text-gray-700 text-sm sm:text-base font-medium mb-2">Category</label>
                <select name="category_id" class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-4 sm:mb-5">
            <label class="block text-gray-700 text-sm sm:text-base font-medium mb-2">Current Image</label>
            @if($product->image_path)
                <img src="{{ asset('storage/'.$product->image_path) }}" class="w-24 h-24 sm:w-32 sm:h-32 object-cover rounded mb-3">
            @endif
            <input type="file" name="image" class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
            <small class="text-xs sm:text-sm text-gray-500 block mt-2">PNG, JPG up to 2MB (optional)</small>
        </div>

        <div class="flex flex-col sm:flex-row gap-3 sm:gap-4">
            <button type="submit" class="w-full sm:w-auto bg-blue-600 text-white px-6 sm:px-8 py-2 sm:py-3 text-sm sm:text-base font-medium rounded hover:bg-blue-700 transition duration-200">Update Product</button>
            <a href="{{ route('products.index') }}" class="w-full sm:w-auto bg-gray-500 text-white px-6 sm:px-8 py-2 sm:py-3 text-sm sm:text-base font-medium rounded hover:bg-gray-600 text-center transition duration-200">Cancel</a>
        </div>
    </form>
</div>
</x-app-layout>
