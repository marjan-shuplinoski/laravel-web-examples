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
                <h1>Edit Role: {{$role->name}}</h1>
                <form action="{{route('roles.update',$role)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp"
                               placeholder="Enter name" value="{{$role->name}}">
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" aria-describedby="emailHelp"
                               placeholder="Enter slug" value="{{$role->slug}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
            <div class="col-sm-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Permissions</h6>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered" id="roles-table" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th></th>
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
                                    <th></th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Delete</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($permissions as $permission)

                                    <tr>
                                        <td><input type="checkbox" @foreach($role->permissions as $role_permission)
                                                @if($role_permission->slug == $permission->slug)
                                                    checked
                                                @endif
                                                @endforeach></td>
                                        <td>{{$permission->id}}</td>
                                        <td><a href="{{route('roles.edit',$role)}}">{{$permission->name}}</a></td>
                                        <td>{{$permission->slug}}</td>
                                        <td>{{$permission->created_at->diffForHumans()}}</td>
                                        <td>{{$permission->updated_at->diffForHumans()}}</td>

                                        @if($role->permissions->contains($permission))
                                        <td>
                                            <form action="{{route('roles.permission.attach',$role)}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="permission" value="{{$permission->id}}">
                                                <button type="submit" class="btn btn-primary">Attach</button>
                                            </form>
                                        </td>
                                        @else
                                            <td>
                                                <form action="{{route('roles.permission.detach',$role)}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="permission" value="{{$permission->id}}">
                                                    <button type="submit" class="btn btn-danger">Detach</button>
                                                </form>
                                            </td>
                                        @endif
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
