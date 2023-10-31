<?php

use Illuminate\Support\Facades\Route;
use App\Models\Staff;
use App\Models\Photo;
use App\Models\Product;

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
    $staff = Staff::find(1);
    $staff->photos()->create(['path'=>'photo1.jpg']);
});

Route::get('/read',function (){
    $staff = Staff::find(1);
    echo $staff->photos;
});

Route::get('/update',function (){
    $staff = Staff::find(1);
    $photo = $staff->photos->where('id',2)->first();
    $photo->path="newpath.jpg";
    $photo->save();
});

Route::get('/delete',function (){
    $staff = Staff::find(1);
    $staff->photos()->where('id',2)->delete();
});

Route::get('/assign',function(){
    $staff = Staff::find(1);
    $photo = Photo::find(11);
    $staff->photos()->save($photo);
});

Route::get('/assign',function(){
    $staff = Staff::find(1);
    $photo = Photo::find(11);
    $staff->photos()->where('id',11)->delete();
});
