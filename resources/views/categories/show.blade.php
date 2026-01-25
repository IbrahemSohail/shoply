@include('./nav')
<div class="container mx-auto px-4 py-8">
    <div class="mb-4">
        <a href="{{ route('categories.index') }}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-indigo-600 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Categories
        </a>
    </div>
    <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-lg p-6">
        <!-- الصورة -->
        @if($category->image_path)
            <img 
                src="{{ asset('storage/' . $category->image_path) }}" 
                class="w-full h-64 object-cover rounded-lg mb-6"
                alt="{{ $category->name }}"
            >
        @endif

        <h1 class="text-3xl font-bold mb-4">{{ $category->name }}</h1>

        <div class="flex">
            @auth
            @if(auth()->user()->is_admin)     
            <form action="{{ route('categories.destroy', $category) }}" class="mr-4" method="POST" id="delete-category-{{ $category->id }}">
                @csrf
                @method('DELETE')
                <button type="button" class="text-white bg-red-500 w-full p-3 rounded-2xl" onclick="confirmDelete('delete-category-{{ $category->id }}')">Delete</button>
            </form>
            @endif
        @endauth

            @auth
            @if(auth()->user()->is_admin)     
            <form action="{{ route('categories.edit', $category) }}">
                <button type="submit" class="text-white bg-blue-500 w-full p-3 rounded-2xl" >edit</button>
            </form>
            @endif
        @endauth
    </div>
</div>
