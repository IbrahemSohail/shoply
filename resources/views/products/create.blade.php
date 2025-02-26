@extends('./link')


<div class="container mx-auto px-4 mt-8">
    <h1 class="text-2xl font-bold mb-6">Create Product</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="max-w-lg bg-white p-6 rounded shadow">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Name</label>
            <input type="text" name="name" class="w-full px-3 py-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Title</label>
            <input type="text" name="title" class="w-full px-3 py-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Description</label>
            <textarea name="description" class="w-full px-3 py-2 border rounded" rows="3" required></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Size</label>
            <input type="text" name="size" class="w-full px-3 py-2 border rounded">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Price</label>
            <input type="number" step="0.01" name="price" class="w-full px-3 py-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Tax</label>
            <input type="number" 
                   step="0.01" 
                   name="tax" 
                   id="tax_percent" 
                   class="w-full px-3 py-2 border rounded bg-gray-100" 
                   readonly
                   required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Category</label>
            <select name="categories_id" class="w-full px-3 py-2 border rounded" required>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Image</label>
            <input type="file" name="image" class="w-full px-3 py-2 border rounded">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Tax Type</label>
            <select name="taxes_id" 
                    id="tax_id" 
                    class="w-full px-3 py-2 border rounded" 
                    onchange="updateTax()">
                    <option value="">Choose Tax:</option>
                @foreach($taxes as $tax)
                    <option value="{{ $tax->id }}" data-percent="{{ $tax->percent }}">
                        {{ $tax->name }} ({{ $tax->percent }}%)
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-gray-400 hover:bg-gray-600 text-white px-4 py-2 rounded">Create</button>
    </form>
</div>
    <script>
    function updateTax() {
        const taxSelect = document.getElementById('tax_id');
        const selectedTax = taxSelect.options[taxSelect.selectedIndex];
        document.getElementById('tax_percent').value = selectedTax.dataset.percent;
    }
    </script>
