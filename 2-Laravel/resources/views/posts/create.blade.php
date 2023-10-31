@extends('layouts.app')

@section('content')

    <form method="post" action="{{ route('posts.store') }}">
        {{ csrf_field() }}
        <input type="text" name="title">
        <input type="submit" name="submit">
    </form>
@if(count($errors)>0)
    <div class="alert-danger">
        @foreach($errors->all() as $error)
            {{$error}}
        @endforeach
    </div>
@endif
@endsection


@section('footer')
    This is the Footer
@endsection
