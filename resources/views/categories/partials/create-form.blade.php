<form action="{{ route('categories.store') }}" method="POST" class="max-w-lg">
    @csrf
    <div class="mb-4">
        <label class="block text-gray-700 mb-2">Category Name</label>
        <input type="text" name="name" class="w-full px-3 py-2 border rounded">
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create</button>
</form>
