<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        return view('admin.permissions.index');
    }

    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3'
        ]);
        $createPermission = Permission::create($validatedData);
        if ($createPermission) {
            session()->flash('alert', 'success');
            return to_route('admin.permissions.index')->with('message', 'Permission created successfully');
        }
        session()->flash('alert', 'danger');
        return to_route('admin.permissions.create')->with('message', 'There is a problem with the server');
    }

    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3'
        ]);
        $updatePermission = $permission->update($validatedData);
        if ($updatePermission) {
            session()->flash('alert', 'success');
            return to_route('admin.permissions.index')->with('message', 'Permission edited successfully');
        }
        session()->flash('alert', 'danger');
        return to_route('admin.permissions.edit')->with('message', 'There is a problem with the server');
    }

    public function destroy(Permission $permission){
        $deletePermission = $permission->delete();
        if($deletePermission) {
            session()->flash('alert', 'success');
            return response()->json(['message' => 'Permission deleted successfully']);
        }
        session()->flash('alert', 'danger');
        return to_route('admin.permissions.index')->with('message', 'Problem occurred while deletion');
    }
}
