@extends('layouts.app')

@section('content')
    <h1>Post: {{$post->title}}</h1>
    <h2>USERID: {{$post->user_id}}</h2>
    <a href="{{route('posts.edit',$post->id)}}">Edit Post</a>
@endsection
