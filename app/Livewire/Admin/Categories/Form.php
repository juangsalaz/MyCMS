<?php

namespace App\Livewire\Admin\Categories;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Form extends Component
{
    use AuthorizesRequests;

    public string $name = '';
    public string $slug = '';
    public ?int $categoryId = null;

    public function mount($id = null)
    {
        $this->authorize('manage pages');

        if ($id) {
            $category = Category::findOrFail($id);
            $this->categoryId = $category->id;
            $this->name = $category->name;
            $this->slug = $category->slug;
        }
    }

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

        session()->flash('success', 'Category saved successfully.');

        return redirect()->route('admin.categories');
    }

    public function render()
    {
        return view('livewire.admin.categories.form')
            ->layout('components.layouts.admin', [
                'title' => $this->categoryId ? 'Edit Category' : 'Create Category',
            ]);
    }
}
