<div>
    <form wire:submit.prevent="save">
        <div class="mb-4">
            <label class="block mb-1">Title</label>
            <input type="text" wire:model.live="title" class="form-control w-full">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Slug</label>
            <input type="text" wire:model.live="slug" class="form-control w-full" readonly>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Body</label>
            <div class="mb-4" wire:ignore>
                <input id="trix-body" type="hidden" name="body" value="{{ $body }}">
                <trix-editor input="trix-body"></trix-editor>
            </div>
        </div>

        <div class="mb-4">
            <label>Status</label>
            <select wire:model.live="status" class="form-control w-full">
                <option value="draft">Draft</option>
                <option value="published">Published</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            Save Page
        </button>
    </form>

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('set-trix-body', ({ body }) => {
                const input = document.getElementById('trix-body');
                const editor = document.querySelector('trix-editor');
                if (input && editor) {
                    input.value = body;
                    editor.editor.loadHTML(body);
                }
            });
        });

        document.addEventListener('trix-change', function (e) {
            @this.set('body', e.target.innerHTML);
        });

        document.addEventListener("trix-attachment-add", function(event) {
            const attachment = event.attachment;

            if (attachment.file) {
                uploadAttachment(attachment);
            }
        });

        function uploadAttachment(attachment) {
            const file = attachment.file;
            const form = new FormData();
            form.append("attachment", file);

            fetch("{{ route('admin.trix-upload') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: form
            })
            .then(response => response.json())
            .then(result => {
                attachment.setAttributes({
                    url: result.url,
                    href: result.url
                });
            })
            .catch(error => {
                console.error("Upload failed:", error);
            });
        }
    </script>
</div>
