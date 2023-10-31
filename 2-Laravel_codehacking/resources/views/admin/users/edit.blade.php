@extends('layouts.admin')

@section('content')
    <h1>Create User</h1>
    <div class="col-sm-3">
        <img src="{{$user->photo ? $user->photo->file : 'https://via.placeholder.com/300/09f/fff.png'}}" alt="" height="100px">
    </div>
    <div class="col-sm-9">
        {!! Form::model($user,['method'=>'PATCH', 'action'=>['\App\Http\Controllers\AdminUsersController@update',$user->id],'files'=>true]) !!}
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
                    <option value="{{$role->id}}"
                            @if($user->role_id == $role->id)
                                selected=selected
                        @endif
                    >
                        {{$role->name}}

                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            {!! Form::label('status','Status') !!}
            {!! Form::select('is_active',array(0=>'Not Active',1=>"Active"),null,['class'=>'form-control']) !!}
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
            {!! Form::submit('Update User',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
        {!! Form::open(['method'=>'DELETE','action'=>['\App\Http\Controllers\AdminUsersController@destroy',$user]]) !!}
        <div class="form-group">
            {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
        </div>
        @include('includes.errors')
    </div>

@endsection
