@extends('link')

<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Tax</h1>
        <a href="{{ route('taxes.create') }}" class="bg-indigo-400 text-white px-4 py-2 rounded-lg">Add Tax</a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-x-auto">
        <table class="min-w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 ">Name</th>
                    <th class="px-6 py-3 ">Percent (%)</th>
                    <th class="px-6 py-3 ">Procedures</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($taxes as $tax)
                <tr class="border-t">
                    <td class="px-6 py-3">{{ $tax->name }}</td>
                    <td class="px-6 py-3">{{ $tax->percent }}%</td>
                    <td class="px-6 py-3 flex gap-2">
                        <a href="{{ route('taxes.edit', $tax) }}" class="text-blue-500">Edit</a>
                        <form action="{{ route('taxes.destroy', $tax) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500" onclick="return confirm('Are you Sure ?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
