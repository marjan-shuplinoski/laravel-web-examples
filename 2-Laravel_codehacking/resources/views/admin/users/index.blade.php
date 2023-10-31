@extends('layouts.admin')

@section('content')
    @if(\Illuminate\Support\Facades\Session::has('message'))
    {{session('message')}}
    @endif
    <h1>Users </h1>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Photo</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Status</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td><img src="{{$user->photo ? $user->photo->file : 'https://via.placeholder.com/300/09f/fff.png'}}" height="40px"></td>
                <td><a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a></td>
                <td>{{$user->email}}</td>
                <td>{{$user->role->name}}</td>
                <td>@if($user->is_active == 1)
                        Active
                    @else
                        Not Active
                    @endif</td>
                <td>{{$user->created_at->diffForHumans()}}</td>
                <td>{{$user->updated_at->diffForHumans()}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
