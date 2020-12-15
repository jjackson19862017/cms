<x-admin-master>

    @section('content')
                @if (Session::has('message'))
                <alert class="alert-success">{{Session::get('message')}}</alert>
                @endif
        <h1>User Profile for : {{$user->name}}</h1>

        <div class="row">
            <div class="col-sm-6">
            <form action="{{route('user.profile.update', $user)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <img class="img-profile rounded-circle" width="100px" src="{{$user->avatar}}">
                    </div>
                    <div class="form-group">
                      <label for="avatar">Avatar</label>
                      <input type="file" class="form-control-file" name="avatar" id="avatar" placeholder="" aria-describedby="fileHelpId">
                      <small id="fileHelpId" class="form-text text-muted">Help text</small>
                    </div>

                <div class="form-group">
                  <label for="username">UserName</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" aria-describedby="helpId" placeholder="Enter your Name" value="{{$user->username}}">
                  <small id="helpId" class="form-text text-muted">Your Username</small>
                  @error('username')
                <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" aria-describedby="helpId" placeholder="Enter your Name" value="{{$user->name}}">
                  <small id="helpId" class="form-text text-muted">Your Name</small>
                  @error('name')
                <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" aria-describedby="helpId" placeholder="Enter your Name" value="{{$user->email}}">
                  <small id="helpId" class="form-text text-muted">Your E-mail</small>
                  @error('email')
                <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="">
                @error('password')
                <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="password_confirmation">Confirm Password</label>
                  <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" placeholder="">
                @error('password_confirmation')
                <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <h1>Roles</h1>
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
                      <th>Options</th>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Attach</th>
                      <th>Detach</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Options</th>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Attach</th>
                      <th>Detach</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      @foreach ($roles as $role)
                    <tr>
                      <td><input type="checkbox" name="" id=""></td>
                      <td>{{$role->id}}</td>
                      <td>{{$role->name}}</td>
                      <td>{{$role->slug}}</td>
                      <td><button type="button" class="btn btn-primary">Attach</button></td>
                      <td><button type="button" class="btn btn-danger">Detach</button></td>
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
