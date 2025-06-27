<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;

class Index extends Component
{
    public ?int $editingId = null;

    #[On('user-saved')]
    public function refresh()
    {
        // Just re-render
    }

    public function edit($id)
    {
        $this->editingId = $id;
        $this->dispatch('edit-user', id: $id);
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
    }

    public function render()
    {
        return view('livewire.admin.users.index', [
                'users' => \App\Models\User::with('roles')->get(),
            ])->layout('components.layouts.admin', [
                'title' => 'Users',
            ]);
    }
}
