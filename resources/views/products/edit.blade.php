@extends('./link')

<div class="container mx-auto p-6 m-6">
    <h1 class="text-2xl font-bold mb-6">Edit Product</h1>

    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data" class="max-w-lg bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div class="mb-4 ">
            <label class="block text-gray-700 mb-2">Name</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}" class="w-full px-3 py-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Price</label>
            <input type="text" name="price" value="{{ old('price', $product->price) }}" class="w-full px-3 py-2 border rounded" required>
        </div>


        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Current Image</label>
            @if($product->image_path)
            <img src="{{ asset('storage/'.$product->image_path) }}" class="w-32 h-32 object-cover">
            @endif
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
