<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\CommentReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentRepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comment= Comment::findOrFail($id);
        $replies = $comment->replies;
        return view('admin.comments.replies.show',compact('replies'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        CommentReply::findOrFail($id)->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        CommentReply::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function createReply(Request $request)
    {
        $user = \Auth::user();
        $data = [
            'comment_id' => $request->comment_id,
            'author'=>$user->name,
            'email' =>$user->email,
            'photo'=> $user->photo->file,
            'body'=> $request->body
        ];
        CommentReply::create($data);
        Session::flash('reply_message','You have submitted reply');

        return redirect()->back();
    }
}
