<?php

namespace App\Livewire\Admin\Categories;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;

class Index extends Component
{
    public $editing = false;
    public $categoryId;

    #[On('category-saved')]
    public function refreshList()
    {
        // Livewire 3 prefers explicit method calls for listeners
    }

    public function edit($id)
    {
        $this->dispatch('edit-category', id: $id);
        $this->editing = true;
    }

    public function delete($id)
    {
        Category::findOrFail($id)->delete();
    }

    public function render()
    {
        return view('livewire.admin.categories.index', [
                'categories' => Category::latest()->get(),
            ])->layout('components.layouts.admin', [
                'title' => 'Categories',
            ]);
    }
}
