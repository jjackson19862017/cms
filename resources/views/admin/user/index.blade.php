<x-admin-master>

@section('content')
<h1>Users</h1>

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
                      <th>Id</th>
                      <th>Username</th>
                      <th>Name</th>
                      <th>Avatar</th>
                      <th>Email</th>
                      <th>Verified</th>
                      <th>Created on</th>
                      <th>Updated on</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Username</th>
                      <th>Name</th>
                      <th>Avatar</th>
                      <th>Email</th>
                      <th>Verified</th>
                      <th>Created on</th>
                      <th>Updated on</th>
                      <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      @foreach ($users as $user)
                    <tr>
                      <td>{{$user->id}}</td>
                      <td>{{$user->username}}</td>
                      <td>{{$user->name}}</td>
                      <td><img width="100px" src="{{asset($user->avatar)}}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt=""></td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->email_verified_at}}</td>
                      <td>{{$user->created_at->diffForHumans()}}</td>
                      <td>{{$user->updated_at->diffForHumans()}}</td>
                      <td>

                      <form action="{{route('user.destroy', $user->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </form>

                      </td>
                    </tr>
                      @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>




@endsection

@section('scripts')
<!-- Page level plugins -->
  <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <!--<script src="{{asset('js/datatables-scripts.js')}}"></script>-->
@endsection

</x-admin-master>
