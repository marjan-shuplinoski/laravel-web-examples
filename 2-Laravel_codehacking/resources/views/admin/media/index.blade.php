@extends('layouts.admin')

@section('content')

    <h1>Media</h1>
    @if($photos)
    <table class="table">
        <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Created</th>
        <th>Email</th>
        </thead>
        <tbody>
        @foreach($photos as $photo)
            <tr>
                <td>{{$photo->id}}</td>
                <td><img src="{{$photo->file}}" alt="" height="100"></td>
                <td>{{$photo->created_at->diffForHumans()}}</td>
                <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['\App\Http\Controllers\AdminMediaController@destroy',$photo->id]]) !!}
                        {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @endif
@endsection
