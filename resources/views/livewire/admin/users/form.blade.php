<div class="mt-4 border p-4 rounded bg-white shadow">
    <form wire:submit.prevent="save" class="space-y-4">
        <div>
            <label>Name</label>
            <input type="text" wire:model.live="name" class="form-control w-full">
        </div>

        <div>
            <label>Email</label>
            <input type="email" wire:model.live="email" class="form-control w-full">
        </div>

        <div>
            <label>Password</label>
            <input type="password" wire:model.live="password" class="form-control w-full">
            @if($userId)
                <p class="text-xs text-gray-500">Leave blank to keep current password</p>
            @endif
        </div>

        <div>
            <label>Role</label>
            <select wire:model.live="role" class="form-control w-full">
                <option value="">-- Select Role --</option>
                @foreach($roles as $r)
                    <option value="{{ $r }}">{{ ucfirst($r) }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            {{ $userId ? 'Update' : 'Create' }} User
        </button>
    </form>
</div>
