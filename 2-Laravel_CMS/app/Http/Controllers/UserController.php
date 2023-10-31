<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function show(User $user)
    {
        $roles = Role::all();
        return view('admin.users.profile', ['user' => $user, 'roles' => $roles]);
    }

    public function update(User $user)
    {
        $inputs = \request()->validate([
            'username' => ['required', 'string', 'max:255', 'alpha_dash'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:' . User::class],
            'avatar' => ['image'],
            'password' => ['min:6', 'confirmed']
        ]);

        if (\request('avatar')) {
            if ($user->avatar !== null) {
                unlink(public_path() . $user->avatar);
            }
            $destinationPath = 'images';
            $inputs['avatar'] = \request()->avatar->getClientOriginalName();
            \request()->avatar->move(public_path('images'), $inputs['avatar']);
            $inputs['avatar'] = '/images/' . $inputs['avatar'];
        }
        $user->update($inputs);
        return back();
    }

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', ['users' => $users]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        Session::flash('message', "User $user->name has been deleted");
        return back();
    }

    public function attach(User $user)
    {
        $user->roles()->attach(\request()->role);
        return back();
    }
    public function detach(User $user)
    {
        $user->roles()->detach(\request()->role);
        return back();
    }
}
