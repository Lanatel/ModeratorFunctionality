<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role as RoleModel;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getRoles() {

        $roles = RoleModel::all();
        return view('home')->with('roles', $roles);
    }

    public function editRole($name)
    {
        $role = Role::findByName($name);
        return view('edit-role')->with('role', $role);
    }

    public function updateRole(Request $request, $name) {

        $role = Role::findByName($name);
        foreach ($role->permissions as $permission) {
            $role->revokePermissionTo($permission->name);
        }

        $role->givePermissionTo($request->perm);
        return redirect()->route('roles');
    }
}
