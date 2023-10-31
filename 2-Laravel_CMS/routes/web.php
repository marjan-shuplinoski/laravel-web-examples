<?php

use App\Http\Controllers\ProfileController;
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
    $posts = \App\Models\Post::all();
    return view('welcome', ['posts' => $posts]);
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/admin', [\App\Http\Controllers\AdminsController::class, 'index'])->name('admin.index');

    Route::get('/admin/posts/create', [\App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
    Route::post('/admin/posts', [\App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
    Route::get('/admin/posts', [\App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
    Route::delete('/admin/posts/{post}/destroy', [\App\Http\Controllers\PostController::class, 'destroy'])->name('posts.destroy');
    Route::get('/admin/posts/{post}/edit', [\App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit');
    Route::patch('/admin/posts/{post}', [\App\Http\Controllers\PostController::class, 'update'])->name('posts.update');

    Route::get('/admin/users/{user}/profile', [\App\Http\Controllers\UserController::class, 'show'])->name('user.profile.show');
    Route::put('/admin/users/{user}/update', [\App\Http\Controllers\UserController::class, 'update'])->name('user.profile.update');
    Route::delete('/admin/users/{user}/destroy', [\App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
    Route::put('/users/{user}/attach', [\App\Http\Controllers\UserController::class, 'attach'])->name('users.role.attach');
    Route::put('/users/{user}/detach', [\App\Http\Controllers\UserController::class, 'detach'])->name('users.role.detach');

    Route::get('/admin/roles', [\App\Http\Controllers\RoleController::class, 'index'])->name('roles.index');
    Route::post('/admin/roles', [\App\Http\Controllers\RoleController::class, 'store'])->name('roles.store');
    Route::delete('/admin/roles/{role}/destroy', [\App\Http\Controllers\RoleController::class, 'destroy'])->name('roles.destroy');
    Route::get('/admin/roles/{role}/edit', [\App\Http\Controllers\RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/admin/roles/{role}/update', [\App\Http\Controllers\RoleController::class, 'update'])->name('roles.update');
    Route::put('/admin/roles/{role}/attach', [\App\Http\Controllers\RoleController::class, 'attach'])->name('roles.permission.attach');
    Route::put('/admin/roles/{role}/detach', [\App\Http\Controllers\RoleController::class, 'detach'])->name('roles.permission.detach');

    Route::get('/admin/permissions', [\App\Http\Controllers\PermissionController::class, 'index'])->name('permissions.index');
    Route::post('/admin/permissions', [\App\Http\Controllers\PermissionController::class, 'store'])->name('permissions.store');
    Route::delete('/admin/permissions/{permission}/destroy', [\App\Http\Controllers\PermissionController::class, 'destroy'])->name('permissions.destroy');
    Route::get('/admin/permissions/{permission}/edit', [\App\Http\Controllers\PermissionController::class, 'edit'])->name('permissions.edit');
    Route::put('/admin/permissions/{permission}/update', [\App\Http\Controllers\PermissionController::class, 'update'])->name('permissions.update');

});

Route::middleware('role:Admin')->group(function () {
    Route::get('/admin/users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

});
Route::get('/post/{post}', [\App\Http\Controllers\PostController::class, 'show'])->name('post');

require __DIR__ . '/auth.php';
