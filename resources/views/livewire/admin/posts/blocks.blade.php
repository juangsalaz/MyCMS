<div>
    <div class="flex gap-2 mb-4">
        <button type="button" wire:click="addBlock('text')" class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">
            + Text Block
        </button>
        <button type="button" wire:click="addBlock('image')" class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">
            + Image Block
        </button>
    </div>

    @foreach ($blocks ?? [] as $index => $block)
        <div class="mt-4 border p-2 rounded shadow-sm">
            <div class="flex justify-between items-center mb-2">
                <span class="font-semibold">{{ ucfirst($block['type']) }} Block</span>
                <button type="button" wire:click="removeBlock({{ $index }})" class="text-red-600">Remove</button>
            </div>

            @if ($block['type'] === 'text')
                <textarea wire:model="blocks.{{ $index }}.data.content"
                          class="w-full p-2 border rounded"
                          placeholder="Your text here..."></textarea>
            @elseif ($block['type'] === 'image')
                <input type="text"
                       wire:model="blocks.{{ $index }}.data.url"
                       class="w-full p-2 border rounded"
                       placeholder="Image URL here...">
            @endif
        </div>
    @endforeach
</div>
