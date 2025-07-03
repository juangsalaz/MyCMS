<div class="mt-4 border p-4 rounded bg-white shadow">
    <h2 class="text-xl font-semibold mb-4">
        {{ $userId ? 'Edit User' : 'Create New User' }}
    </h2>

    <form wire:submit.prevent="save" class="space-y-4">
        <div>
            <label>{{ __('user.name') }}</label>
            <input type="text" wire:model.live="name" class="form-control w-full">
            @error('name') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
        </div>

        <div>
            <label>Email</label>
            <input type="email" wire:model.live="email" class="form-control w-full">
            @error('email') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
        </div>

        <div>
            <label>{{ __('user.password') }}</label>
            <input type="password" wire:model.live="password" class="form-control w-full">
            @if($userId)
                <p class="text-xs text-gray-500">Leave blank to keep current password</p>
            @endif
            @error('password') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
        </div>

        <div>
            <label>Role</label>
            <select wire:model.live="role" class="form-control w-full">
                <option value="">-- Select Role --</option>
                @foreach($roles as $r)
                    <option value="{{ $r }}">{{ ucfirst($r) }}</option>
                @endforeach
            </select>
            @error('role') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            {{ $userId ? __('buttons.update') : __('buttons.create') }}
        </button>
    </form>
</div>
