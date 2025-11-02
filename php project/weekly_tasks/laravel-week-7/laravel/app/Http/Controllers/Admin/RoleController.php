<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        return view('admin.roles.index');
    }

    public function create()
    {
        $allPermissions = Permission::all();
        return view('admin.roles.create', compact('allPermissions'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'permissions' => 'required|array'
        ],
            [
                'permissions.required' => 'At least one permission must be selected.'
            ]);

        $createRole = Role::create($validatedData);

        //give permissions
        $createRole->givePermissionTo($validatedData['permissions']);

        if ($createRole) {
            session()->flash('alert', 'success');
            return to_route('admin.roles.index')->with('message', 'Role created successfully');
        }
        session()->flash('alert', 'danger');
        return to_route('admin.roles.create')->with('message', 'There is a problem with the server');
    }

    public function edit(Role $role)
    {
        $allPermissions = Permission::all();
        $permissions = $role->permissions;
        $permissionsInRole = getPermissionInRole($permissions);
        return view('admin.roles.edit', compact('role', 'allPermissions', 'permissionsInRole'));
    }

    public function update(Request $request, Role $role)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'permissions' => 'required|array'
        ],
            [
                'permissions.required' => 'At least one permission must be selected.'
            ]);

        $updateRole = $role->update($validatedData);

        $permissions = $role->permissions;
        $permissionsInRole = getPermissionInRole($permissions);
        $role->revokePermissionTo($permissionsInRole);
        $role->givePermissionTo($validatedData['permissions']);

        if ($updateRole) {
            session()->flash('alert', 'success');
            return to_route('admin.roles.index')->with('message', 'Role updated successfully');
        }
        session()->flash('alert', 'danger');
        return to_route('admin.roles.edit')->with('message', 'There is a problem with the server');
    }

    public function destroy(Role $role)
    {
        $deleteRole = $role->delete();

        if ($deleteRole) {
            session()->flash('alert', 'success');
            return to_route('admin.roles.index')->with('message', 'Role deleted successfully');
        }
        session()->flash('alert', 'danger');
        return to_route('admin.roles.index')->with('message', 'Problem occurred while deletion');
    }
}
