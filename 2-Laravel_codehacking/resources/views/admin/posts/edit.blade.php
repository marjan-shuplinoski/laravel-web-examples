@extends('layouts.admin')

@section('content')
    <h1>Create Post</h1>
    <div class="col-sm-6">
        <img src="
        @if($post->photo)
            {{$post->photo->file}}
        @else
https://via.placeholder.com/150/FFFF00/000000?Text=NotFound
        @endif" height="300">
    </div>
    <div class="col-sm-6">
        {!! Form::model($post,['method'=>'PATCH', 'action'=>['\App\Http\Controllers\AdminPostsController@update',$post->id],'files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('title','Title:') !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('category_id','Category:') !!}
            <select class="form-control" id="category_id" name="category_id">
                <option value="">Select:</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}"
                            @if($post->category_id == $category->id)
                                selected="selected"
                        @endif
                    >{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {!! Form::label('photo_id','Photo:') !!}
            {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('body','Description:') !!}
            {!! Form::textarea('body',null,['class'=>'form-control tinymce-editor','rows'=>3]) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Update Post',['class'=>'btn btn-primary col-sm-6']) !!}
        </div>
        {!! Form::close() !!}
        @include('includes.errors')
        {!! Form::open(['method'=>"DELETE",'action'=>['\App\Http\Controllers\AdminPostsController@destroy',$post->id]]) !!}
        <div class="form-group">
            {!! Form::submit('Delete Post',['class'=>'btn btn-danger col-sm-6']) !!}
        </div>
    </div>
@endsection
