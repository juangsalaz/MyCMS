<?php

namespace App\Livewire\Admin\Pages;

use Livewire\Component;
use App\Models\Page;
use Livewire\Attributes\On;

class Index extends Component
{
    #[On('page-saved')]
    public function refresh() {}

    public function edit($id)
    {
        $this->dispatch('edit-page', id: $id);
    }

    public function delete($id)
    {
        Page::findOrFail($id)->delete();
    }

    public function render()
    {
        return view('livewire.admin.pages.index', [
                'pages' => Page::latest()->get(),
            ])->layout('components.layouts.admin', [
                'title' => 'Pages',
            ]);
    }
}
