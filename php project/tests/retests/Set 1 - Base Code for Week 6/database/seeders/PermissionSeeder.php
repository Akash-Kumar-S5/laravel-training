<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'Blog Read']);
        Permission::create(['name' => 'Blog Read and Write']);
        Permission::create(['name' => 'User profile Read and Write']);
        Permission::create(['name' => 'User profile Read']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'customer']);
        $role = Role::findByName('admin');
        $role->syncPermissions(['Blog Read', 'Blog Read and Write', 'User profile Read and Write', 'User profile Read']);
        $role = Role::findByName('customer');
        $role->syncPermissions(['Blog Read', 'Blog Read and Write']);
    }
}
