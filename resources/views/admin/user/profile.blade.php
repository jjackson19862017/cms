<x-admin-master>

    @section('content')

        <h1>User Profile for : {{$user->name}}</h1>

        <div class="row">
            <div class="col-sm-6">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <img class="img-profile rounded-circle" width="100px" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                    </div>
                    <div class="form-group">
                      <label for="ava">Avatar</label>
                      <input type="file" class="form-control-file" name="" id="" placeholder="" aria-describedby="fileHelpId">
                      <small id="fileHelpId" class="form-text text-muted">Help text</small>
                    </div>

                <div class="form-group">
                  <label for="username">UserName</label>
                  <input type="text" class="form-control" name="username" id="username" aria-describedby="helpId" placeholder="Enter your Name" value="{{$user->username}}">
                  <small id="helpId" class="form-text text-muted">Your Name</small>
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="Enter your Name" value="{{$user->email}}">
                  <small id="helpId" class="form-text text-muted">Your E-mail</small>
                </div>

                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="">
                </div>

                <div class="form-group">
                  <label for="password_confirmation">Confirm Password</label>
                  <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>

    @endsection

</x-admin-master>
