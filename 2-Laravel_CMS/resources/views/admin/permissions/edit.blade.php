<x-admin-master>
    @section('content')
        <div class="row">
            <div class="col-sm-6">
                @error('name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                @endif
                <h1>Edit Role: {{$permission->name}}</h1>
                <form action="{{route('permissions.update',$permission)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp"
                               placeholder="Enter name" value="{{$permission->name}}">
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" aria-describedby="emailHelp"
                               placeholder="Enter slug" value="{{$permission->slug}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    @endsection
</x-admin-master>
