<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class MediaManager extends Component
{
    use WithFileUploads;

    public $image;
    public $images = [];

    public function mount()
    {
        $this->loadImages();
    }

    public function loadImages()
    {
        $this->images = collect(Storage::disk('public')->files('media'))
            ->filter(fn($file) => str($file)->endsWith(['.jpg', '.jpeg', '.png', '.gif', '.webp']))
            ->values();
    }

    public function upload()
    {
        $this->validate([
            'image' => 'required|image|max:2048',
        ]);

        $this->image->store('media', 'public');

        $this->reset('image');
        $this->loadImages();
    }

    public function save()
    {
        $this->validate([
            'image' => 'required|image|max:2048', // Maks 2MB
        ]);

        $path = $this->image->store('media', 'public');

        // Simpan path ke database jika perlu
        // Contoh: Post::create(['image_path' => $path]);

        //session()->flash('success', 'Gambar berhasil diunggah: ' . $path);

        $this->reset('image');
        $this->loadImages();
    }


    public function delete($path)
    {
        Storage::disk('public')->delete($path);
        $this->loadImages();
    }

    public function render()
    {
        return view('livewire.admin.media-manager')
            ->layout('components.layouts.admin', [
                'title' => 'Media Manager',
            ]);
    }
}
