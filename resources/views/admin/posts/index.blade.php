<x-admin-master>

@section('content')
<h1>All Posts</h1>

<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Title</th>
                      <th>Author</th>
                      <th>Created</th>
                      <th>Image</th>
                      <th>Content</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Title</th>
                      <th>Author</th>
                      <th>Created</th>
                      <th>Image</th>
                      <th>Content</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      @foreach ($posts as $post)
                          <tr>
                      <td>{{$post->id}}</td>
                      <td>{{$post->title}}</td>
                      <td>{{$post->user->name}}</td>
                      <td>{{$post->created_at->diffForHumans()}}</td>
                      <td><img src="{{$post->post_image}}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt=""></td>
                      <td>{{Str::limit($post->body, '150', '......')}}</td>
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
  <script src="{{asset('js/datatables-scripts.js')}}"></script>
@endsection


</x-admin-master>