<?php

namespace App\Livewire\Admin\Posts;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Form extends Component
{
    use WithFileUploads, AuthorizesRequests;

    public $postId;
    public $title = '';
    public $slug = '';
    public $excerpt = '';
    public $content = '';
    public $status = 'draft';
    public $published_at;
    public $image;
    public $selectedCategories = [];
    public $blocks = [];

    #[Validate('image|max:1024')]
    public $uploadedImage;

    public function mount()
    {
        $this->authorize('manage posts');
    }

    #[On('blocksUpdated')]
    public function updateBlocks($blocks)
    {
        $this->blocks = $blocks;
    }

    public function updatedTitle($value)
    {
        $this->slug = Str::slug($value);
    }

    public function save()
    {
        $this->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts,slug,' . $this->postId,
            'content' => 'required|string',
            'status' => 'required|in:draft,published',
        ]);

        $post = Post::updateOrCreate(
            ['id' => $this->postId],
            [
                'title' => $this->title,
                'slug' => $this->slug,
                'excerpt' => $this->excerpt,
                'content' => $this->content,
                'status' => $this->status,
                'published_at' => $this->status === 'published' ? now() : null,
                'user_id' => Auth::id(),
                'image' => $this->uploadedImage ? $this->uploadedImage->store('posts', 'public') : null,
                'block_content' => json_encode($this->blocks),
            ]
        );

        $post->categories()->sync($this->selectedCategories);

        $this->dispatch('post-saved');
        $this->resetExcept('postId');
    }

    #[On('edit-post')]
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        $this->postId = $post->id;
        $this->title = $post->title;
        $this->slug = $post->slug;
        $this->excerpt = $post->excerpt;
        $this->content = $post->content;
        $this->status = $post->status;
        $this->published_at = $post->published_at;
        $this->blocks = json_decode($post->block_content, true) ?? [];
        $this->selectedCategories = $post->categories->pluck('id')->toArray();

        $this->dispatch('set-trix-content', content: $post->content);
    }

    public function render()
    {
        return view('livewire.admin.posts.form', [
            'categories' => Category::orderBy('name')->get(),
        ])->layout('components.layouts.admin', [
            'title' => $this->postId ? 'Edit Post' : 'Create Post',
        ]);
    }
}
