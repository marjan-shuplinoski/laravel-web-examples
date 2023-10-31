<x-admin-master>
    @section('content')
        <div class="row">
            <div class="col-sm-3">
                @if(session()->has('message'))
                    <div class="alert alert-danger">{{session('message')}}</div>
                @endif
                @error('name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror

                <form action="{{route('roles.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name='name'
                               placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" id="slug" aria-describedby="emailHelp" name='slug'
                               placeholder="Enter slug">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-sm-9">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered" id="roles-table" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Delete</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($roles as $role)

                                    <tr>
                                        <td>{{$role->id}}</td>
                                        <td><a href="{{route('roles.edit',$role)}}">{{$role->name}}</a></td>
                                        <td>{{$role->slug}}</td>
                                        <td>{{$role->created_at->diffForHumans()}}</td>
                                        <td>{{$role->updated_at->diffForHumans()}}</td>
                                        <td>
                                            <form method='post' action="{{route('roles.destroy',$role)}}">
                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-admin-master>
