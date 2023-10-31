@extends('layouts.blog-post')


@section('content')

    <h1>Post</h1>
    <div class="col-lg-8">

        <!-- Blog Post -->

        <!-- Title -->
        <h1>{{$post->title}}</h1>

        <!-- Author -->
        <p class="lead">
            by <a href="#">{{$post->user->name}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-responsive" src="{{$post->photo->file}}" alt="">

        <hr>

        <!-- Post Content -->
        <p class="lead">{!! $post->body !!}</p>

        <hr>

        <!-- Blog Comments -->

        <!-- Comments Form -->
        <div class="well">
            @if(\Illuminate\Support\Facades\Session::has('comment_message'))
                <div class="alert-success">{{session('comment_message')}}</div>
            @endif
            @if(Auth::check())
                <h4>Leave a Comment:</h4>
                {!! Form::open(['method'=>'POST', 'action'=>'\App\Http\Controllers\PostCommentsController@store']) !!}

                <input type="hidden" name="post_id" value="{{$post->id}}">
                <div class="form-group">
                    {!! Form::label('body','Your Comment:') !!}
                    {!! Form::textarea('body',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Add Comment',['class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
                @include('includes.errors')
            @endif
        </div>

        <hr>

        <!-- Posted Comments -->

        @if(count($comments)>0)
            @foreach($comments as $comment)

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="{{$comment->photo}}" alt="" height="64px">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->author}}
                            <small>{{$comment->created_at->diffForHumans()}}</small>
                        </h4>
                        {{$comment->body}}
                        @if(count($comment->replies)>0)
                            @foreach($comment->replies as $reply)
                                @if($reply->is_active == 1)

                                    <!-- Nested Comment -->
                                    <div class="media">
                                        <a class="pull-left" href="#">
                                            <img class="media-object" src="{{$reply->photo}}" alt="" height="64">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading">{{$reply->author}}
                                                <small>{{$reply->created_at->diffForHumans()}}</small>
                                            </h4>
                                            {{ $reply->body }}
                                        </div>
                                    </div>

                                    <!-- End Nested Comment -->

                                @endif
                            @endforeach
                        @else
                            <h3>No Replies</h3>
                        @endif


                            @if(Auth::check())
                                <div class="comment-reply-container">
                                    <button class="toggle-reply btn btn-primary pull-right">Reply</button>
                                    <div class="comment-reply col-sm-6">
                                        {!! Form::open(['method'=>'POST', 'action'=>'\App\Http\Controllers\CommentRepliesController@createReply']) !!}

                                        <input type="hidden" name="post_id" value="{{$post->id}}">
                                        <div class="form-group">
                                            <input type="hidden" name="comment_id" value="{{$comment->id}}">

                                            {!! Form::label('body','Your Reply:') !!}
                                            {!! Form::textarea('body',null,['class'=>'form-control']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::submit('Reply',['class'=>'btn btn-primary']) !!}
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                    @endif
                                </div>

                    </div>
                </div>


            @endforeach
        @endif


    </div>

@endsection

@section('javascript')
    <script>
        $(".comment-reply-container .toggle-reply").click(function () {
            $(this).next().slideToggle("slow");
        });
    </script>
@endsection
