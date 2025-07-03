<div class="mt-4 border p-4 rounded bg-white shadow">
    @if (session('success'))
        <div class="p-3 mb-4 bg-green-100 text-green-800 rounded shadow">
            {{ session('success') }}
        </div>
    @endif
    <div class="flex justify-end mb-4">
        <a href="{{ route('admin.categories.create') }}"
        class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            + {{ __('category.create') }}
        </a>
    </div>

    <table class="table-auto w-full mt-6 border">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2 border">#</th>
                <th class="p-2 border">Name</th>
                <th class="p-2 border">Slug</th>
                <th class="p-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td class="p-2 border">{{ $loop->iteration }}</td>
                <td class="p-2 border">{{ $category->name }}</td>
                <td class="p-2 border">{{ $category->slug }}</td>
                <td class="p-2 border">
                    <a href="{{ route('admin.categories.edit', $category->id) }}"
                        class="text-blue-600 hover:underline">Edit</a>
                    <button wire:click="delete({{ $category->id }})" class="text-red-600 ml-2">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
