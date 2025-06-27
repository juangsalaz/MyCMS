<div class="mt-4 border p-4 rounded bg-white shadow">
    <livewire:admin.pages.form />

    <table class="table-auto w-full mt-6 border">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2 border">#</th>
                <th class="p-2 border">Title</th>
                <th class="p-2 border">Status</th>
                <th class="p-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pages as $page)
                <tr>
                    <td class="p-2 border">{{ $loop->iteration }}</td>
                    <td class="p-2 border">{{ $page->title }}</td>
                    <td class="p-2 border capitalize">{{ $page->status }}</td>
                    <td class="p-2 border">
                        <button wire:click="edit({{ $page->id }})" class="text-blue-600">Edit</button>
                        <button wire:click="delete({{ $page->id }})" class="text-red-600 ml-2">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
