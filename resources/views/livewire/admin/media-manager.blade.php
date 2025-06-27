<div>
    <form wire:submit.prevent="save" enctype="multipart/form-data" class="mb-10">
        <input type="file" wire:model="image">

        @error('image') <span class="text-red-500">{{ $message }}</span> @enderror

        @if ($image)
            <p>Preview:</p>
            <img src="{{ $image->temporaryUrl() }}" alt="Preview" class="w-48 h-48 object-cover">
        @endif

        <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Upload</button>
    </form>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @foreach ($images as $img)
            <div class="bg-white shadow rounded overflow-hidden text-center">
                <img src="{{ Storage::url($img) }}" class="w-full h-32 object-cover">
                <div class="p-2 text-sm truncate">{{ basename($img) }}</div>
                <div class="p-2">
                    <button wire:click="delete('{{ $img }}')" class="text-red-600 text-xs">Delete</button>
                </div>
            </div>
        @endforeach
    </div>

</div>