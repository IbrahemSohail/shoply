@extends('link')

<div class="container mx-auto w-full px-4 sm:px-6 lg:px-8 py-6 sm:py-8">
    <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold mb-6">Add New Tax</h1>
    
    <form action="{{ route('taxes.store') }}" method="POST" class="w-full max-w-2xl bg-white p-4 sm:p-6 lg:p-8 rounded-lg shadow-md">
        @csrf

        <div class="mb-4 sm:mb-5">
            <label class="block text-gray-700 text-sm sm:text-base font-medium mb-2">Tax Name</label>
            <input type="text" name="name" class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm sm:text-base font-medium mb-2">Percent (%)</label>
            <input type="number" step="0.01" name="percent" class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
        </div>

        <button type="submit" class="w-full sm:w-auto bg-indigo-400 hover:bg-indigo-500 text-white px-6 sm:px-8 py-2 sm:py-3 text-sm sm:text-base font-medium rounded-lg transition duration-200">Save Tax</button>
    </form>
</div>
