@extends('layouts.admin')

@section('content')
    <h1>Posts</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">View Post</th>
            <th scope="col">View Comments</th>
            <th scope="col">User</th>
            <th scope="col">Category</th>
            <th scope="col">Photo</th>
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td><a href="{{route('home.post',$post->slug)}}">View Post</a></td>
                <td><a href="{{route('comments.show',$post->id)}}">View Comments</a></td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->category->name}}</td>
                <td><img src="{{$post->photo ? $post->photo->file : "https://via.placeholder.com/150/FFFF00/000000?Text=NotFound"}}" height="40"></td>
                <td><a href="{{route('posts.edit',$post->id)}}">{{$post->title}}</a></td>
                <td>{{Str::limit($post->body,15)}}</td>
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
            </tr>

        @endforeach

        </tbody>
    </table>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$posts->render('vendor.pagination.default') }}
        </div>
    </div>
@endsection
