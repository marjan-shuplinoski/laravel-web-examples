<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index', ['permissions' => $permissions]);
    }

    public function store()
    {
        \request()->validate([
            'name' => ['required', 'unique:permissions']
        ]);
        $permission = new Permission();
        $permission->name = \request()->name;
        $permission->slug = \request()->slug;
        $permission->save();
        return back();
    }
    public function edit(Permission $permission){
        return view('admin.permissions.edit',['permission'=>$permission]);
    }
     public function update(Permission $permission)
    {
        \request()->validate([
            'name' => ['required', 'unique:permissions']
        ]);
        $permission->name = \request()->name;
        $permission->slug = \request()->slug;
        $permission->update();
        Session::flash('message', 'Updated !');
        return back();
    }

    public function destroy(Permission $permission){
        $permission->delete();
        return back();
    }
}
