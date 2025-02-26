@extends('link')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-lg p-6">
        <h1 class="text-2xl font-bold mb-6">Edit Category: {{ $category->name }}</h1>
        
        <form action="{{ route('categories.update', $category) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Category Name</label>
                <input 
                    type="text" 
                    name="name" 
                    value="{{ old('name', $category->name) }}"
                    class="w-full px-3 py-2 border rounded-lg"
                    required
                >
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 mb-2">Category Image</label>
                <input 
                    type="file" 
                    name="image" 
                    class="w-full px-3 py-2 border rounded-lg"
                >
                @if($category->image_path)
                    <div class="mt-4">
                        <img 
                            src="{{ asset('storage/' . $category->image_path) }}" 
                            class="w-32 h-32 object-cover rounded-lg"
                            alt="Current Image"
                        >
                    </div>
                @endif
            </div>

            <button 
                type="submit" 
                class="bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-600"
            >
            Save Update
        </button>
        </form>
    </div>
</div>
@endsection