<?php

use Illuminate\Support\Facades\Route;
use \App\Models\User;
use \App\Models\Address;

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

Route::get('/insert', function () {
    $user = User::findOrFail(1);
    $address = new Address();
    $address->name = '123 addr';
    $user->address()->save($address);
});

Route::get('update', function () {
    $user = User::findOrFail(1);
    $address = ['name' => "321 addr"];
    $user->address()->update($address);
});

Route::get('/read', function () {
    $user = User::findOrFail(1);
    echo $user->address->name;
});

Route::get('/delete', function () {
    $user = User::findOrFail(1);
    $user->address()->delete();
});
