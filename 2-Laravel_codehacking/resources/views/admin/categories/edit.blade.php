@extends('layouts.admin')

@section('content')

    <h1>Categories</h1>

    <div class="col-sm-6">
        {!! Form::model($category,['method'=>'PATCH', 'action'=>['\App\Http\Controllers\AdminCategoriesController@update',$category->id]]) !!}

        <div class="form-group">
            {!! Form::label('name','Name:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Update Category',['class'=>'btn btn-primary col-sm-6']) !!}
        </div>
        {!! Form::close() !!}
        @include('includes.errors')

 {!! Form::open(['method'=>'DELETE', 'action'=>['\App\Http\Controllers\AdminCategoriesController@destroy',$category->id]]) !!}

        <div class="form-group">
            {!! Form::submit('Delete Category',['class'=>'btn btn-danger col-sm-6']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
