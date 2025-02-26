@extends('link')


<div class="container mx-auto px-4 py-8">
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
            <form action="{{ route('categories.destroy', $category) }}" class="mr-4" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-white bg-red-500 w-full p-3 rounded-2xl" onclick="return confirm('Are you Sure ?')">Delete</button>
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
