<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function showRoles(User $user){
        $allRoles = Role::all();
        $roles = $user->roles;
        $rolesInUser = getPermissionInRole($roles);
        return view('admin.users.roles', compact('user', 'allRoles', 'rolesInUser'));
    }

    public function assignRole(Request $request,User $user){
        $validatedData = $request->validate([
            'roles' => 'required|array'
        ],
            [
                'roles.required' => 'At least one permission must be selected.'
            ]);
        $user->syncRoles($validatedData['roles']);
        return to_route('admin.users.index');
    }

    public function destroy(User $user)
    {
        $deleteUser = $user->delete();

        if ($deleteUser) {
            session()->flash('alert', 'success');
            return to_route('admin.users.index')->with('message', 'User deleted successfully');
        }
        session()->flash('alert', 'danger');
        return to_route('admin.users.index')->with('message', 'Problem occurred while deletion');

    }
}
