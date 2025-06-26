<?php

namespace App\Livewire\Admin\Categories;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Attributes\On;

class Form extends Component
{
    public string $name = '';
    public string $slug = '';
    public $categoryId;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
        ];
    }

    public function updatedName()
    {
        $this->slug = Str::slug($this->name);
    }

    public function save()
    {
        $this->validate();

        Category::updateOrCreate(
            ['id' => $this->categoryId],
            ['name' => $this->name, 'slug' => $this->slug]
        );

        $this->reset(['name', 'slug', 'categoryId']);

        // Emit event using Livewire 3 style
        $this->dispatch('category-saved');
    }

    #[On('edit-category')]
    public function editCategory($id)
    {
        $category = Category::findOrFail($id);
        $this->categoryId = $category->id;
        $this->name = $category->name;
        $this->slug = $category->slug;
    }

    public function render()
    {
        return view('livewire.admin.categories.form')
            ->layout('components.layouts.admin', [
                'title' => $this->categoryId ? 'Edit Category' : 'Create Category',
            ]);
    }

}
