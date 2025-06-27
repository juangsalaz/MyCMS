<div class="mt-4 border p-4 rounded bg-white shadow">
    <livewire:admin.users.form />

    <table class="table-auto w-full mt-6 border">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2 border">#</th>
                <th class="p-2 border">Name</th>
                <th class="p-2 border">Email</th>
                <th class="p-2 border">Role</th>
                <th class="p-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="p-2 border">{{ $loop->iteration }}</td>
                    <td class="p-2 border">{{ $user->name }}</td>
                    <td class="p-2 border">{{ $user->email }}</td>
                    <td class="p-2 border">{{ $user->roles->pluck('name')->join(', ') }}</td>
                    <td class="p-2 border">
                        <button wire:click="edit({{ $user->id }})" class="text-blue-600">Edit</button>
                        <button wire:click="delete({{ $user->id }})" class="text-red-600 ml-2">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
