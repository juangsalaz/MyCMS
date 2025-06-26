<div class="p-6 space-y-6">
    <livewire:admin.posts.form />

    <table class="table-auto w-full mt-6 border">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2 border">#</th>
                <th class="p-2 border">Title</th>
                <th class="p-2 border">Status</th>
                <th class="p-2 border">Categories</th>
                <th class="p-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td class="p-2 border">{{ $loop->iteration }}</td>
                    <td class="p-2 border">{{ $post->title }}</tSd>
                    <td class="p-2 border capitalize">{{ $post->status }}</td>
                    <td class="p-2 border">
                        @foreach ($post->categories as $cat)
                            <span class="inline-block bg-gray-200 rounded px-2 text-sm">{{ $cat->name }}</span>
                        @endforeach
                    </td>
                    <td class="p-2 border">
                        <button wire:click="edit({{ $post->id }})" class="text-blue-600">Edit</button>
                        <button wire:click="view({{ $post->id }})"
                                x-on:click="$dispatch('show-post-detail')"
                                class="text-indigo-600 mr-2">
                            View
                        </button>
                        <button wire:click="delete({{ $post->id }})" class="text-red-600 ml-2">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div
        x-data="{ showModal: false }"
        x-on:show-post-detail.window="showModal = true"
        x-on:close-post-detail.window="showModal = false"
        x-show="showModal"
        x-transition
        class="fixed inset-0 z-50 bg-black/50 flex items-center justify-center"
    >
        <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6 relative">
            <h2 class="text-xl font-bold mb-2">{{ $selectedPost?->title }}</h2>
            <p class="text-sm text-gray-500 mb-2">Status: {{ $selectedPost?->status }}</p>
            <div class="mb-4">{!! $selectedPost?->content !!}</div>

            <div class="text-sm text-gray-600 mb-2">
                Categories:
                @foreach ($selectedPost?->categories ?? [] as $cat)
                    <span class="inline-block bg-gray-200 px-2 py-0.5 rounded mr-1">{{ $cat->name }}</span>
                @endforeach
            </div>

            @if ($selectedPost?->image)
                <img src="{{ asset('storage/' . $selectedPost->image) }}" class="mt-4 h-40 rounded">
            @endif

            <button
                x-on:click="$dispatch('close-post-detail')"
                class="absolute top-2 right-2 text-gray-600 hover:text-red-500"
            >
                ✕
            </button>
        </div>
    </div>
</div>
