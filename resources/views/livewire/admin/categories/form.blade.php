<div>
    <form wire:submit.prevent="save">
        <div class="mb-4">
            <label class="block mb-1">Category Name</label>
            <input type="text" wire:model.live="name" class="form-control w-full">
        </div>
        <div class="mb-4">
            <label class="block mb-1">Slug</label>
            <input type="text" wire:model.live="slug" class="form-control w-full" readonly>
        </div>
        
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            Save
        </button>
    </form>
</div>
