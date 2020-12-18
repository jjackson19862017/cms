<x-admin-master>
    @section('content')
        <h1 class="h3 mb-4 text-gray-800">Edit Role: {{$role->name}}</h1>
<div class="row">
    <div class="col-sm-6">
        <form action="{{route('roles.update', $role->id)}}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" aria-describedby="helpId" value="{{$role->name}}">
                            @error('name')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
        </div>
        </form>
</div>

@if (!$permissions->isEmpty())
<div class="row">
    <div class="col-sm-6">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Options</th>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Options</th>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($permissions as $permission)
                        <tr>
                            <td> <div class="form-check">
                          <label class="form-check-label">

                            <input type="checkbox" class="form-check-input" name="" id="" value=""
                            @foreach ($role->permissions as $role_permission)
                            @if ($role_permission->slug == $permission->slug)
                                checked
                            @endif
                              @endforeach>
                          </label>
                        </div></td>

                        <td>{{$permission->id}}</td>
                        <td>{{$permission->name}}</td>
                        <td>{{$permission->slug}}</td>
                        <td><button type="button" class="btn btn-danger">Delete</button></td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
</x-admin-master>
