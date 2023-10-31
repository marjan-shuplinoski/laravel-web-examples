@extends("layouts.app")



@section("content")
    <h1>This is contact form</h1>

    This is who you can contact to :
    <ol>
        @foreach($people as $person)
            <li>{{$person}}</li>
        @endforeach
    </ol>
@endsection


@section("footer")
This is footer

@endsection
