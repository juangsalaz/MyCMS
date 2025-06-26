<?php

namespace App\Livewire\Admin;

use App\Models\Post;
use App\Models\Page;
use App\Models\Category;
use Livewire\Component;

class Dashboard extends Component
{
    public $postCount, $pageCount, $categoryCount;

    public function mount()
    {
        $this->postCount = Post::count();
        $this->pageCount = Page::count();
        $this->categoryCount = Category::count();
    }

    public function render()
    {
        return view('livewire.admin.dashboard')
            ->layout('components.layouts.admin', [
                'title' => 'Dashboard',
            ]);
    }
}
