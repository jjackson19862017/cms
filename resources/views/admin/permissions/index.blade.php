<x-admin-master>
    @section('content')
        <h1 class="h3 mb-4 text-gray-800">Permissions</h1>

    <div class="row">
        <div class="col-sm-3">
            <form action="{{route('permission.store')}}" method="post">
                @csrf
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" aria-describedby="helpId" placeholder="Name of Permission">
                    @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-sm-9">
            <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-danger">
                    @if (Session::has('message'))
                    {{Session::get('message')}}
                    @endif
                </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($permissions as $permission)
                    <tr>
                        <td><a href="{{route('permissions.edit', $permission->id)}}">{{$permission->name}}</a></td>
                        <td>{{$permission->slug}}</td>
                        <td><form action="{{route('permission.destroy', $permission->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </form></td>
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
