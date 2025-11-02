<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'Create Post']);
        Permission::create(['name' => 'Edit Post']);
        Permission::create(['name' => 'Delete Post']);
        //Role::create(['name' => 'super-admin']);
        Role::create(['name' => 'admin'])->givePermissionTo(['Create Post','Edit Post','Delete Post']);
        Role::create(['name' => 'writer'])->givePermissionTo(['Create Post','Edit Post']);
        Role::create(['name' => 'user'])->givePermissionTo(['Create Post']);
    }
}
