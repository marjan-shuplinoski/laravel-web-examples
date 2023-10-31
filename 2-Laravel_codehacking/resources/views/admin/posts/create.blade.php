@extends('layouts.admin')

@section('content')
    <h1>Create Post</h1>

    {!! Form::open(['method'=>'POST', 'action'=>'\App\Http\Controllers\AdminPostsController@store','files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('title','Title:') !!}
        {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('category_id','Category:') !!}
        <select class="form-control" id="category_id" name="category_id">
            <option value="" selected="selected">Select:</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        {!! Form::label('photo_id','Photo:') !!}
        {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('body','Description:') !!}
        {!! Form::textarea('body',null,['class'=>'form-control','rows'=>3]) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Create Post',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
    @include('includes.errors')
@endsection
