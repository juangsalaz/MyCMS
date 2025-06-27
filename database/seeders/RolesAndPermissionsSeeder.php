<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
   public function run()
    {
        Permission::create(['name' => 'manage posts']);
        Permission::create(['name' => 'manage pages']);
        Permission::create(['name' => 'manage categories']);
        Permission::create(['name' => 'manage media']);
        Permission::create(['name' => 'access dashboard']);
        Permission::create(['name' => 'manage users']);

        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());

        $editor = Role::create(['name' => 'editor']);
        $editor->givePermissionTo(['manage posts', 'manage pages', 'access dashboard']);
    }
}
