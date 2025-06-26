<div>
    <livewire:admin.categories.form />

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
                    <button wire:click="edit({{ $category->id }})" class="text-blue-600">Edit</button>
                    <button wire:click="delete({{ $category->id }})" class="text-red-600 ml-2">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
