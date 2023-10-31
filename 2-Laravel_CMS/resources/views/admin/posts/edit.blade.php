<x-admin-master>
    @section('content')
        <h1>Edit Post</h1>
        @if(\Illuminate\Support\Facades\Session::has('message'))
            <div class="alert alert-info alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                {{\Illuminate\Support\Facades\Session::get('message')}}
            </div>
        @endif
        <form method="post" action="{{route('posts.update',$post->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" aria-description="" placeholder="Enter title" value="{{$post->title}}">
            </div>
            <div class="form-group">
                <div><img src="{{$post->post_image}}" height="40px"></div>
                <label for="post_image">File</label>
                <input type="file" name="post_image" class="form-control-file" id="file">
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea name="body" id="body" class="form-control" rows="10" cols="30">{{$post->body}}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    @endsection
</x-admin-master>
