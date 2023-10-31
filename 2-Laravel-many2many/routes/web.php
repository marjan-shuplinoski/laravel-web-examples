<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function () {
    $user = \App\Models\User::find(1);
    $role = new \App\Models\Role();
    $role->name = 'New Role';
    $user->roles()->save($role);
});

Route::get('/read',function (){
    $user = \App\Models\User::find(1);
    echo $user->roles;
});

Route::get('/update',function (){
    $user = \App\Models\User::find(1);
    if($user->has('roles')){
        foreach ($user->roles as $key=>$role){
            $role->name ="Updated as $key";
            $role->save();
        }
    }
});

// DELETE same as others

Route::get('/attach',function (){
    $user = \App\Models\User::find(1);
    $user->roles()->attach([1,2,3,4,5,6]);
});

Route::get('/detach',function (){
    $user = \App\Models\User::find(1);
    $user->roles()->detach();
});

Route::get('/sync',function (){
    $user = \App\Models\User::find(1);
    $user->roles()->sync([1,2]);
});
