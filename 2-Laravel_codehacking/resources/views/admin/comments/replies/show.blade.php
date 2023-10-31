@extends('layouts.admin')


@section('content')
    <h1>Replies</h1>

    @if(count($replies)>0)

        <table class="table">
            <thead>
            <th>ID</th>
            <th>author</th>
            <th>email</th>
            <th>body</th>
            <th>Comment</th>
            <th>Action</th>
            </thead>
            <tbody>
            @foreach($replies as $reply)
                <tr>
                    <td>{{$reply->id}}</td>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
                    <td>{{$reply->body}}</td>
                    <td><a href="{{route('home.post',$reply->comment->id)}}">{{$reply->comment->body}}</a></td>
                    <td>
                        @if($reply->is_active ==1)
                            {!! Form::open(['method'=>'PATCH','action'=>["\App\Http\Controllers\CommentRepliesController@update",$reply->id]]) !!}
                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group">
                                {!! Form::submit('Un-Approve',['class'=>'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </div>
                        @else
                            {!! Form::open(['method'=>'PATCH','action'=>["\App\Http\Controllers\CommentRepliesController@update",$reply->id]]) !!}
                            <input type="hidden" name="is_active" value="1">
                            <div class="form-group">
                                {!! Form::submit('Approve',['class'=>'btn btn-primary']) !!}
                                {!! Form::close() !!}
                            </div>
                        @endif
                    </td>
                    <td>
                        {!! Form::open(['method'=>'DELETE','action'=>["\App\Http\Controllers\CommentRepliesController@destroy",$reply->id]]) !!}
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
