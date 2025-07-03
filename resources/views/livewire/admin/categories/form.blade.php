<div class="mt-4 border p-4 rounded bg-white shadow">
    <h2 class="text-xl font-semibold mb-4">
       {{ $categoryId ? __('category.edit') : __('category.create') }}
    </h2>

    <form wire:submit.prevent="save">
        <div class="mb-4">
            <label class="block mb-1">Category Name</label>
            <input type="text" wire:model.live="name" class="form-control w-full">
            @error('name') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Slug</label>
            <input type="text" wire:model.live="slug" class="form-control w-full" readonly>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
           {{ $categoryId ? __('buttons.update') : __('buttons.create') }}
        </button>
    </form>
</div>
