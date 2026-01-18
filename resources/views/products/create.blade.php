@extends('./link')


<div class="container mx-auto w-full px-4 sm:px-6 lg:px-8 py-8 sm:py-10">
    <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold mb-6">Create Product</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="w-full max-w-2xl bg-white p-4 sm:p-6 lg:p-8 rounded shadow-md">
        @csrf

        <div class="mb-4 sm:mb-5">
            <label class="block text-gray-700 text-sm sm:text-base font-medium mb-2">Name</label>
            <input type="text" name="name" class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-orange-600" required>
        </div>

        <div class="mb-4 sm:mb-5">
            <label class="block text-gray-700 text-sm sm:text-base font-medium mb-2">Title</label>
            <input type="text" name="title" class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-orange-600" required>
        </div>

        <div class="mb-4 sm:mb-5">
            <label class="block text-gray-700 text-sm sm:text-base font-medium mb-2">Description</label>
            <textarea name="description" class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-orange-600" rows="3" required></textarea>
        </div>

        <div class="mb-4 sm:mb-5">
            <label class="block text-gray-700 text-sm sm:text-base font-medium mb-2">Size</label>
            <input type="text" name="size" class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-orange-600">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5 mb-4 sm:mb-5">
            <div>
                <label class="block text-gray-700 text-sm sm:text-base font-medium mb-2">Price</label>
                <input type="number" step="0.01" name="price" class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-orange-600" required>
            </div>

            <div>
                <label class="block text-gray-700 text-sm sm:text-base font-medium mb-2">Tax</label>
                <input type="number" 
                       step="0.01" 
                       name="tax" 
                       id="tax_percent" 
                       class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded bg-gray-100 focus:outline-none focus:ring-2 focus:ring-orange-600" 
                       readonly
                       required>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5 mb-4 sm:mb-5">
            <div>
                <label class="block text-gray-700 text-sm sm:text-base font-medium mb-2">Category</label>
                <select name="category_id" class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-orange-600" required>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-gray-700 text-sm sm:text-base font-medium mb-2">Tax Type</label>
                <select name="tax_id" 
                        id="tax_id" 
                        class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-orange-600" 
                        onchange="updateTax()">
                        <option value="">Choose Tax:</option>
                    @foreach($taxes as $tax)
                        <option value="{{ $tax->id }}" data-percent="{{ $tax->percent }}">
                            {{ $tax->name }} ({{ $tax->percent }}%)
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-4 sm:mb-5">
            <label class="block text-gray-700 text-sm sm:text-base font-medium mb-2">Image</label>
            <input type="file" name="image" class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-orange-600">
        </div>

        <button type="submit" class="w-full sm:w-auto bg-orange-600 hover:bg-orange-700 text-white px-6 sm:px-8 py-2 sm:py-3 text-sm sm:text-base font-medium rounded transition duration-200">Create</button>
    </form>
</div>
    <script>
    function updateTax() {
        const taxSelect = document.getElementById('tax_id');
        const selectedTax = taxSelect.options[taxSelect.selectedIndex];
        document.getElementById('tax_percent').value = selectedTax.dataset.percent;
    }
    </script>
