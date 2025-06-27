<div class="mt-4 border p-4 rounded bg-white shadow">
    <form wire:submit.prevent="save">
        <div class="mb-4">
            <label>Title</label>
            <input type="text" wire:model.live="title" class="form-control w-full">
        </div>

        <div class="mb-4">
            <label>Slug</label>
            <input type="text" wire:model.live="slug" class="form-control w-full" readonly>
        </div>

        <div class="mb-4">
            <label>Excerpt</label>
            <textarea wire:model.live="excerpt" class="form-control w-full"></textarea>
        </div>

        <div class="mb-4" wire:ignore>
            <label class="block mb-1">Content</label>
            <input id="trix-content" type="hidden" name="content" value="{{ $content }}">
            <trix-editor input="trix-content"></trix-editor>
        </div>

        <div class="mb-4">
            <label>Status</label>
            <select wire:model.live="status" class="form-control w-full">
                <option value="draft">Draft</option>
                <option value="published">Published</option>
            </select>
        </div>

        <div class="mb-4">
            <label>Categories</label>
            <select wire:model.live="selectedCategories" multiple class="form-control w-full">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label>Image</label>
            <input type="file" wire:model="uploadedImage" class="form-control w-full">
            @if ($uploadedImage)
                <img src="{{ $uploadedImage->temporaryUrl() }}" class="mt-2 h-20">
            @endif
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            Save Post
        </button>
    </form>
</div>

<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('set-trix-body', ({ body }) => {
            const input = document.getElementById('trix-body');
            const editor = document.querySelector('trix-editor');

            if (input && editor) {
                input.value = body;
                // 🚨 This is the key line to force Trix to render HTML (including <img>)
                editor.editor.loadHTML(body);
            }
        });
    });

    document.addEventListener('trix-change', function (e) {
        @this.set('content', e.target.innerHTML);
    });
</script>
