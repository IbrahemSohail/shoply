@include('./nav')

<x-app-layout>
<div class="container mx-auto w-full px-4 sm:px-6 lg:px-8 py-6 sm:py-8">
    <div class="w-full max-w-3xl mx-auto bg-white rounded-xl shadow-lg p-4 sm:p-6 lg:p-8">
        <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold mb-6">Edit Category: <span class="text-green-600">{{ $category->name }}</span></h1>
        
        <form action="{{ route('categories.update', $category) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm sm:text-base font-medium text-gray-700 mb-2">Category Name</label>
                <input 
                    type="text" 
                    name="name" 
                    value="{{ old('name', $category->name) }}"
                    class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                    required
                >
            </div>

            <div>
                <label class="block text-sm sm:text-base font-medium text-gray-700 mb-2">Category Image</label>
                <input 
                    type="file" 
                    name="image" 
                    class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 file:mr-4 file:py-2 sm:file:py-3 file:px-4 sm:file:px-6 file:rounded-md file:border-0 file:text-xs sm:file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100"
                    accept="image/*"
                >
                <p class="mt-2 text-xs text-gray-500">Leave empty to keep current image</p>
                @if($category->image_path)
                    <div class="mt-4">
                        <p class="text-xs sm:text-sm font-medium text-gray-700 mb-2">Current Image:</p>
                        <img 
                            src="{{ asset('storage/' . $category->image_path) }}" 
                            class="w-24 h-24 sm:w-32 sm:h-32 object-cover rounded-lg border border-gray-200"
                            alt="Current Image"
                        >
                    </div>
                @endif
            </div>

            <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 pt-4 border-t border-gray-200">
                <button 
                    type="submit" 
                    class="w-full sm:w-auto bg-green-600 text-white px-6 sm:px-8 py-2 sm:py-3 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 text-sm sm:text-base font-semibold transition"
                >
                    Save Update
                </button>
                <a 
                    href="{{ route('categories.index') }}" 
                    class="w-full sm:w-auto text-center bg-gray-200 text-gray-800 px-6 sm:px-8 py-2 sm:py-3 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 text-sm sm:text-base font-semibold transition"
                >
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
</x-app-layout>