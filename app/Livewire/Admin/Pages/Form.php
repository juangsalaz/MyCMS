<?php

namespace App\Livewire\Admin\Pages;

use Livewire\Component;
use App\Models\Page;
use Illuminate\Support\Str;
use Livewire\Attributes\On;

class Form extends Component
{
    public $pageId;
    public $title = '';
    public $slug = '';
    public $body = '';
    public $status = 'draft';

    public function updatedTitle($value)
    {
        $this->slug = Str::slug($value);
    }

    public function save()
    {
        $this->validate([
            'title' => 'required',
            'slug' => 'required|unique:pages,slug,' . $this->pageId,
            'body' => 'required',
            'status' => 'required|in:draft,published',
        ]);

        Page::updateOrCreate(
            ['id' => $this->pageId],
            [
                'title' => $this->title,
                'slug' => $this->slug,
                'body' => $this->body,
                'status' => $this->status,
            ]
        );

        $this->reset(['title', 'slug', 'body', 'status', 'pageId']);

        $this->dispatch('page-saved');
    }

    #[On('edit-page')]
    public function edit($id)
    {
        $page = \App\Models\Page::findOrFail($id);

        $this->pageId = $page->id;
        $this->title = $page->title;
        $this->slug = $page->slug;
        $this->body = $page->body;
        $this->status = $page->status;

        $this->dispatch('set-trix-body', body: $page->body);
    }

    public function render()
    {
        return view('livewire.admin.pages.form')
            ->layout('components.layouts.admin', [
                'title' => $this->pageId ? 'Edit Page' : 'Create Page',
            ]);
    }

}
