@extends('layouts.app')

@section('content')

    <form method="post" action="{{ route('posts.update',$post) }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <input type="text" name="title" value="{{$post->title}}">
        <input type="submit" name="submit">
    </form>
    <form method='post' action="{{route('posts.destroy',$post)}}">
        {{csrf_field()}}
        {{method_field('DELETE')}}
        <input type="submit" value="Delete">
    </form>
@endsection



@section('footer')
    This is the Footer
@endsection
