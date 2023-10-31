<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function show(Post $post)
    {
        return view('blog-post', ['post' => $post]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $inputs = $request->validate(
            ['title' => 'required|min:5|max:25',
                'post_image' => 'mimes:jpeg,jpg,png',
                'body' => 'required|min:50']);
        if (\request('post_image')) {
            $destinationPath = 'images';
            $inputs['post_image'] = $request->post_image->getClientOriginalName();
            $request->post_image->move(public_path('images'), $inputs['post_image']);
            $inputs['post_image'] = '/images/' . $inputs['post_image'];
        }
        auth()->user()->posts()->create($inputs);
        return back();
    }

    public function index()
    {
        $posts = Post::all();
//        $posts = auth()->user()->posts;
        return view('admin.posts.index', ['posts' => $posts]);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        Session::flash('message', "The post $post->title was deleted");
        return back();
    }

    public function edit(Post $post)
    {
//        if(auth()->user()->id != $post->user_id){
//                        Session::flash('message','You dont have access to that post!');
//
//            return redirect()->route('posts.index');
//        }
        Gate::authorize('view', $post);
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $inputs = \request()->validate(
            ['title' => 'required|min:5|max:25',
                'post_image' => 'mimes:jpeg,jpg,png',
                'body' => 'required|min:50']);
        if (\request('post_image')) {
            if ($post->post_image !== null) {
                unlink(public_path() . $post->post_image);
            }
            $destinationPath = 'images';
            $inputs['post_image'] = \request()->post_image->getClientOriginalName();
            \request()->post_image->move(public_path('images'), $inputs['post_image']);
            $post->post_image = '/images/' . $inputs['post_image'];
        }
        $post->title = \request()->title;
        $post->body = \request()->body;
//        $response = Gate::inspect('update', $post);

        Gate::authorize('update', $post);
        auth()->user()->posts()->save($post);
        Session::flash('message', 'The post was updated!');
        return back();
    }
}
