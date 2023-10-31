<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use App\Models\Country;
use App\Models\Photo;
use App\Models\Tag;


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

//Route::get('/posts/{id}/{user}', function ($id, $user) {
//    return "This is post number: $id and user: $user";
//});
//
////Route::get('/posts',array("as"=>"post.home"),function (){
////   $url = \route('post.home');
////   return "This is this url :".$url;
////});
//
//
//Route::resource('posts', "App\Http\Controllers\PostsController");
//Route::get('/contact', "App\Http\Controllers\PostsController@contact");
//Route::get('/post/{id}', "App\Http\Controllers\PostsController@showPosts");
//
//
//Route::get("insert", function () {
//    try {
//        DB::insert("insert into posts (title,content) values (?,?)", ['This is the Title', 'This is the content']);
//    }
//    catch (Exception $e){
//        return $e->getMessage();
//    }
//});
//
//Route::get('/read',function (){
//
//    $array = DB::select('select * from posts');
//    foreach ($array as $value){
//            echo $value->title;
//            echo $value->content;
//    }
//});
//
//Route::get('/update',function (){
//
//    $updated = DB::update('update posts set title = ? where id= ?',['This is the updated title',1]);
//    return $updated;
//});
//
//Route::get('/delete',function (){
//    $deleted = DB::delete('delete from posts where id= ? ',[1]);
//    return $deleted;
//});
//
//Route::get('/find', function () {
//    $posts = Post::all();
//    foreach ($posts as $post) {
//        echo "Title: " . $post->title . ", Content: " . $post->content . "<br>";
//    }
//
//    $posts = Post::where('id', 2)->orderBy("id", "desc")->take(1)->get();
//    foreach ($posts as $post) {
//        echo "Title: " . $post->title . ", Content: " . $post->content . "<br>";
//    }
//});
//
//Route::get('/insertEloquent', function () {
//    $post = new Post();
//    $post->title = "Some text";
//    $post->content = "Some content";
//    $post->save();
//});
//
//Route::get('/updateEloquent', function () {
//    $post = Post::find(2);
//    $post->title = "Some text2";
//    $post->content = "Some content2";
//    $post->save();
//});
//
//Route::get('deleteEloquent', function () {
//    $post = Post::find(1);
//    $post->delete();
//});
//
//Route::get("/softDeleteEloquent", function () {
//    Post::find(1)->delete();
//});
//
//Route::get("/softRestoreEloquent", function () {
//    Post::withTrashed()
//        ->where('id', 1)
//        ->restore();
//});
//Route::get('/user/{id}/post', function ($id) {
//    return User::find($id)->post->title;
//});
//
//Route::get('/post/{id}/user',function ($id){
//    return Post::find($id)->user->name;
//});
//
//Route::get('/posts/{id}',function ($id){
//    $user = User::find($id);
//    if($user != null) {
//        foreach ($user->posts as $post) {
//            echo $post->title . ": " . $post->content . "<hr>";
//        }
//    }else{
//        echo 'No records available';
//    }
//});
//
//Route::get('/user/{id}/role',function ($id){
//    $user = User::find($id)->roles()->get();
//    return $user;
//});
//
//Route::get('/user/pivot',function (){
//    $user = User::find(1);
//    foreach ($user->roles as $role) {
//        echo $role;
//    }
//});
//
//Route::get('/user/country',function (){
//    $country = Country::find(1);
//    foreach ($country->posts as $post){
//        return $post->title;
//    }
//});
//
//Route::get('/user/{id}/photos',function ($id){
//
//    $user = User::find($id);
//    echo $user->photos;
//});
//
//Route::get('/post/{id}/photos',function ($id){
//
//    $post = Post::find($id);
//    echo $post->photos;
//});
//
//Route::get('photo/{id}/user',function ($id){
//    $photo = Photo::findOrFail($id);
//    return $photo->imageable;
//});
//
//Route::get('/post/tag',function(){
//    $post = Post::find(1);
//    foreach ($post->tags as $tag){
//        echo $tag;
//    }
//});
//
//Route::get('/tag/post',function (){
//    $tag = Tag::find(1);
//    foreach ($tag->posts as $post){
//        echo $post;
//    }
//});
//

Route::resource('/posts','App\Http\Controllers\PostsController');

Route::get('/dates',function (){
    $date = new DateTime();
    echo date_default_timezone_get()."<br>";
    echo $date->format('d-m-Y-H-i-s')."<br>";
    echo \Carbon\Carbon::now()->addDay(10)->diffForHumans().'<br>';
    echo \Carbon\Carbon::now()->subDay(1)->isYesterday();

});

Route::get('/getName',function (){
    $user = User::find(1);
    echo $user->name;
});

Route::get('/setName',function (){
    $user = User::find(1);
    $user->name = 'verified';
    $user->save();
});
