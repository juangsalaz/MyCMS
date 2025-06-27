<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class Form extends Component
{
    public ?int $userId = null;
    public $name = '';
    public $email = '';
    public $password = '';
    public $role = '';

    #[On('edit-user')]
    public function edit($id)
    {
        $user = User::findOrFail($id);

        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->roles->pluck('name')->first() ?? '';
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->userId,
            'password' => 'nullable',
            'role' => 'required',
        ]);

        $user = User::updateOrCreate(
            ['id' => $this->userId],
            [
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password ? Hash::make($this->password) : User::find($this->userId)?->password,
            ]
        );

        $user->syncRoles([$this->role]);

        $this->dispatch('user-saved');
        $this->reset(['userId', 'name', 'email', 'password', 'role']);
    }

    public function render()
    {
        return view('livewire.admin.users.form', [
            'roles' => Role::pluck('name'),
        ]);
    }
}
