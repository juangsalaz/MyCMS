<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;

class CreateAdminAndEditorSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $editorRole = Role::firstOrCreate(['name' => 'editor']);

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole($adminRole);

        $editor = User::create([
            'name' => 'Editor User',
            'email' => 'editor@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $editor->assignRole($editorRole);

        $this->command->info("Admin: {$admin->email}");
        $this->command->info("Editor: {$editor->email}");
        $this->command->warn("Default password: password");
    }
}
