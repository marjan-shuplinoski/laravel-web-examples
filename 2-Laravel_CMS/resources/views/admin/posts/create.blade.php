<x-admin-master>
    @section('content')
        <h1>Create Post</h1>

        <form method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" aria-description="" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="post_image">File</label>
                <input type="file" name="post_image" class="form-control-file" id="file">
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea name="body" id="body" class="form-control" rows="10" cols="30"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    @endsection
</x-admin-master>
