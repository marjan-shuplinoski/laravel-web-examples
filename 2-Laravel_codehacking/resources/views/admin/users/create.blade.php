@extends('layouts.admin')

@section('content')
    <h1>Create User</h1>
    {!! Form::open(['method'=>'POST', 'action'=>'\App\Http\Controllers\AdminUsersController@store','files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('name','Name') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email','Email') !!}
        {!! Form::email('email',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('role_id','Role') !!}
        <select class="form-control" id="role_id" name="role_id">
            <option value="" selected="selected">Select:</option>
            @foreach($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        {!! Form::label('status','Status') !!}
        {!! Form::select('is_active',array(0=>'Not Active',1=>"Active"),1,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('photo_id','File') !!}
        {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password','Password') !!}
        {!! Form::password('password',['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Create User',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
 @include('includes.errors')
@endsection
