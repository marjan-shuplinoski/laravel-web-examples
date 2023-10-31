@extends('layouts.admin')


@section('content')
    <h1>Comments</h1>

    @if(count($comments)>0)

        <table class="table">
            <thead>
            <th>ID</th>
            <th>author</th>
            <th>email</th>
            <th>body</th>
            <th>post</th>
            <th>Replies</th>
            <th>Action</th>

            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{$comment->body}}</td>
                    <td><a href="{{route('home.post',$comment->post->slug)}}">{{$comment->post->title}}</a></td>
                    <td>
                        <a href="{{route('replies.show',$comment->id)}}">Preview Replies</a>
                    </td>
                    <td>
                        @if($comment->is_active ==1)
                            {!! Form::open(['method'=>'PATCH','action'=>["\App\Http\Controllers\PostCommentsController@update",$comment->id]]) !!}
                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group">
                                {!! Form::submit('Un-Approve',['class'=>'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </div>
                        @else
                            {!! Form::open(['method'=>'PATCH','action'=>["\App\Http\Controllers\PostCommentsController@update",$comment->id]]) !!}
                            <input type="hidden" name="is_active" value="1">
                            <div class="form-group">
                                {!! Form::submit('Approve',['class'=>'btn btn-primary']) !!}
                                {!! Form::close() !!}
                            </div>
                        @endif
                    </td>
                    <td>
                        {!! Form::open(['method'=>'DELETE','action'=>["\App\Http\Controllers\PostCommentsController@destroy",$comment->id]]) !!}
                        <div class="form-group">
                            {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
