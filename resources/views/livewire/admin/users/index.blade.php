<div class="mt-4 border p-4 rounded bg-white shadow">

    @if (session('success'))
        <div class="p-3 mb-4 bg-green-100 text-green-800 rounded shadow">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-end mb-4">
        <a href="{{ route('admin.users.create') }}"
           class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            + {{ __('user.create') }}
        </a>
    </div>

    <table class="table-auto w-full border">
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
                        <a href="{{ route('admin.users.edit', $user->id) }}"
                           class="text-blue-600 hover:underline">Edit</a>
                        <button wire:click="delete({{ $user->id }})"
                                class="text-red-600 ml-2">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
