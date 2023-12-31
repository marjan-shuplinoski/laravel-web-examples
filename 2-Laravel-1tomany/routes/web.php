<?php

use Illuminate\Support\Facades\Route;
use \App\Models\User;
use \App\Models\Post;

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
    $user = User::findOrFail(1);
    $post = new Post();
    $post->title = "Title1 ";
    $post->body = "Body1";
    $user->posts()->save($post);

});

Route::get('/read',function (){
    $user = User::findOrFail(1);
    echo $user->posts;
});

Route::get('/update',function (){
    $user = User::findOrFail(1);
    $user->posts()->where('id',1)->update(['title'=>'updated title']);
});

Route::get('/delete',function (){
    $user = User::findOrFail(1);
    $user->posts()->where('id',1)->delete();
});
