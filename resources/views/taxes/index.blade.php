@extends('link')

<div class="container mx-auto w-full px-4 sm:px-6 lg:px-8 py-6 sm:py-8">
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-6">
        <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold">Tax Management</h1>
        <a href="{{ route('taxes.create') }}" class="w-full sm:w-auto bg-indigo-400 hover:bg-indigo-500 text-white px-4 sm:px-6 py-2 sm:py-3 rounded-lg text-center text-sm sm:text-base font-medium transition duration-200">Add Tax</a>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-x-auto">
        <table class="min-w-full text-xs sm:text-sm">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-left font-semibold text-gray-700">Name</th>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-left font-semibold text-gray-700">Percent (%)</th>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-left font-semibold text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($taxes as $tax)
                <tr class="border-t border-gray-200 hover:bg-gray-50 transition">
                    <td class="px-3 sm:px-6 py-3 sm:py-4 text-gray-900">{{ $tax->name }}</td>
                    <td class="px-3 sm:px-6 py-3 sm:py-4 text-gray-900">{{ $tax->percent }}%</td>
                    <td class="px-3 sm:px-6 py-3 sm:py-4 flex flex-wrap gap-2 sm:gap-3">
                        <a href="{{ route('taxes.edit', $tax) }}" class="text-xs sm:text-sm text-blue-600 hover:text-blue-800 hover:underline transition">Edit</a>
                        <form action="{{ route('taxes.destroy', $tax) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-xs sm:text-sm text-red-600 hover:text-red-800 hover:underline transition" onclick="return confirm('Are you sure you want to delete this tax?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
