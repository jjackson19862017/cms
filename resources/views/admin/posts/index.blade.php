<x-admin-master>

@section('content')
<h1>All Posts</h1>

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
                      <th>Author</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Content</th>
                      <th>Created on</th>
                      <th>Updated on</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Author</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Content</th>
                      <th>Created on</th>
                      <th>Updated on</th>
                      <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      @foreach ($posts as $post)
                    <tr>
                      <td>{{$post->id}}</td>
                      <td>{{$post->user->name}}</td>
                    <td><a href="{{route('post.edit', $post->id)}}">{{$post->title}}</a></td>
                      <td><img width="100px" src="{{asset($post->post_image)}}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt=""></td>
                      <td>{{Str::limit($post->body, '150', '......')}}</td>
                      <td>{{$post->created_at->diffForHumans()}}</td>
                      <td>{{$post->updated_at->diffForHumans()}}</td>
                      <td>
                          @can('view',$post) // Info Its like an if statement allowing a user to do something, see PostPolicy.php
                      <form action="{{route('post.destroy', $post->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                          @endcan

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
  <script src="{{asset('js/datatables-scripts.js')}}"></script>
@endsection

</x-admin-master>
