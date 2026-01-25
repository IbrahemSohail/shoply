@include('nav')


<div class="container mx-auto w-full px-4 sm:px-6 lg:px-8 py-8 sm:py-10">
    <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold mb-6">Create Product</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="w-full max-w-2xl bg-white p-4 sm:p-6 lg:p-8 rounded shadow-md">
        @csrf

        <div class="mb-4 sm:mb-5">
            <label class="block text-gray-700 text-sm sm:text-base font-medium mb-2">Name</label>
            <input type="text" name="name" id="name" class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-orange-600" required>
        </div>

        <div class="mb-4 sm:mb-5">
            <label class="block text-gray-700 text-sm sm:text-base font-medium mb-2">Title</label>
            <input type="text" name="title" class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-orange-600" required>
        </div>

        <div class="mb-4 sm:mb-5">
            <div class="flex justify-between items-center mb-2">
                <label class="block text-gray-700 text-sm sm:text-base font-medium">Description</label>
                <button type="button" onclick="generateAiDescription()" class="text-xs sm:text-sm bg-indigo-100 text-indigo-700 hover:bg-indigo-200 px-3 py-1 rounded-full transition flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd" d="M10 1c3.866 0 7 1.79 7 4s-3.134 4-7 4-7-1.79-7-4 3.134-4 7-4zm5.694 8.13c.464-.264.91-.583 1.306-.952V10c0 2.21-3.134 4-7 4s-7-1.79-7-4V8.178c.396.37.842.688 1.306.953C5.838 10.006 7.854 10.5 10 10.5s4.162-.494 5.694-1.37zM10 16c2.146 0 4.162-.494 5.694-1.37.464-.265.91-.583 1.306-.953v1.823c0 2.21-3.134 4-7 4s-7-1.79-7-4v-1.823c.396.37.842.688 1.306.953C5.838 15.506 7.854 16 10 16z" clip-rule="evenodd" />
                    </svg>
                    Generate with AI ✨
                </button>
            </div>
            <textarea name="description" id="description" class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-orange-600" rows="3" required></textarea>
        </div>

        <div class="mb-4 sm:mb-5">
            <label class="block text-gray-700 text-sm sm:text-base font-medium mb-2">Size</label>
            <input type="text" name="size" class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-orange-600">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-5 mb-4 sm:mb-5">
            <div>
                <label class="block text-gray-700 text-sm sm:text-base font-medium mb-2">Price</label>
                <input type="number" step="0.01" name="price" class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-orange-600" required>
            </div>

            <div>
                <label class="block text-gray-700 text-sm sm:text-base font-medium mb-2">Offer Price (Optional)</label>
                <input type="number" step="0.01" name="offer_price" class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-orange-600">
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
                <select name="category_id" id="category_id" class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-orange-600" required>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    function updateTax() {
        const taxSelect = document.getElementById('tax_id');
        const selectedTax = taxSelect.options[taxSelect.selectedIndex];
        document.getElementById('tax_percent').value = selectedTax.dataset.percent;
    }

    function generateAiDescription() {
        const name = document.getElementById('name').value;
        const categorySelect = document.getElementById('category_id');
        const categoryName = categorySelect.options[categorySelect.selectedIndex].text;
        const descField = document.getElementById('description');

        if (!name) {
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Please enter a product name first!',
                confirmButtonColor: '#ea580c'
            });
            return;
        }

        // Show loading state
        const originalText = descField.value;
        descField.value = "Creating magic with AI... ✨";
        
        fetch('{{ route("ai.generate") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                name: name,
                category_name: categoryName
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.description) {
                descField.value = data.description;
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                });
                Toast.fire({
                    icon: 'success',
                    title: 'Description Generated! ✨'
                });
            } else {
                descField.value = originalText;
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Could not generate description.',
                    confirmButtonColor: '#ea580c'
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            descField.value = originalText;
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Something went wrong!',
                confirmButtonColor: '#ea580c'
            });
        });
    }
    </script>
