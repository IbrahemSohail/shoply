@extends('link')

<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Edit Tax: {{ $tax->name }}</h1>
    
    <form action="{{ route('taxes.update', $tax) }}" method="POST" class="max-w-lg bg-white p-6 rounded-lg shadow">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Tax Name</label>
            <input type="text" name="name" value="{{ $tax->name }}" class="w-full px-3 py-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Percent (%)</label>
            <input type="number" step="0.01" name="percent" value="{{ $tax->percent }}" class="w-full px-3 py-2 border rounded-lg" required>
        </div>

        <button type="submit" class="bg-indigo-400 text-white px-4 py-2 rounded-lg">Update</button>
    </form>
</div>
