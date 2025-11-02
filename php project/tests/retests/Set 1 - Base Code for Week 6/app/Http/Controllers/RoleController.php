<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $roles = Role::paginate(6);
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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
            return to_route('user.index')->with('success', 'Role created successfully');
        }
        return to_route('role.create')->with('failed', 'There is a problem with the server');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Role $role)
    {
        $deleteRole = $role->delete();

        if ($deleteRole) {
            return to_route('user.index')->with('success', 'Role deleted successfully');
        }
        return to_route('user.index')->with('message', 'Problem occurred while deletion');
    }


    /**
     * Show the form for assigning role.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getAssign()
    {
        $roles = Role::all();
        return view('roles.assign', compact('roles'));
    }

    /**
     * assigns the roles for the user
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function assign(Request $request)
    {
        $user = User::where('id', $request->userid)->first();
        $role = Role::where('name', $request->role)->first();
        $user->syncRoles([$role->id]);
        return redirect('role')->with('success', 'Role assigned successfully.');
    }
}
