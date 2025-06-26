<?php

namespace App\Livewire\Admin\Posts;

use Livewire\Component;
use App\Models\Post;
use Livewire\Attributes\On;

class Index extends Component
{

    public $selectedPost = null;

    #[On('post-saved')]
    public function refresh()
    {
        // Just re-render
    }

    public function edit($id)
    {
        $this->dispatch('edit-post', id: $id);
    }

    public function delete($id)
    {
        Post::findOrFail($id)->delete();
    }

    public function view($id)
    {
        $this->selectedPost = \App\Models\Post::with('categories')->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.admin.posts.index', [
                'posts' => Post::with('categories')->latest()->get(),
            ])->layout('components.layouts.admin', [
                'title' => 'Posts',
            ]);
    }
}
