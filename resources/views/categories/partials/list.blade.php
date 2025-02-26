<div class="bg-white rounded-lg shadow">
    <table class="min-w-full">
        @foreach ($categories as $category)
        <tr class="border-t">
            <td class="px-6 py-4">{{ $category->name }}</td>
        </tr>
        @endforeach
    </table>
</div>