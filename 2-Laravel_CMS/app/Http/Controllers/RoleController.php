<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Post;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', ['roles' => $roles]);
    }

    public function store()
    {
        \request()->validate([
            'name' => ['required', 'unique:roles']
        ]);
        $role = new Role();
        $role->name = \request()->name;
        $role->slug = \request()->slug;
        $role->save();
        return back();
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit', ['role' => $role, 'permissions' => $permissions]);
    }

    public function update(Role $role)
    {
        \request()->validate([
            'name' => ['required', 'unique:roles']
        ]);
        $role->name = \request()->name;
        $role->slug = \request()->slug;
        $role->update();
        Session::flash('message', 'Updated !');
        return back();
    }

    public function attach(Role $role)
    {
        $role->permissions()->attach(\request('permission'));
        return back();
    }

    public function detach(Role $role)
    {
        $role->permissions()->detach(\request('permission'));
        return back();
    }

    public function destroy(Role $role)
    {
        $role->delete();
        Session::flash('message', "The record $role->name is deleted.");
        return back();
    }
}
