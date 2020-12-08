<x-admin-master>


@section('content')
<h1>Edit Post</h1>

<form action="{{route('post.update', $post->id)}}" method="post" enctype="multipart/form-data">

@csrf
@method('PATCH')
<div class="form-group">
  <label for="title">Title</label>
<input type="text" class="form-control" name="title" id="" aria-describedby="helpId" placeholder="Enter Title" value="{{$post->title}}">
</div>

<div class="form-group">
  <label for="post_image">Post Image</label>
  <div><img src="{{$post->post_image}}" width="100px"></div>
  <input type="file" class="form-control-file" name="post_image" id="post_image" placeholder="" aria-describedby="fileHelpId">
  <small id="fileHelpId" class="form-text text-muted">Please choose a file to upload.</small>
</div>

<div class="form-group">
  <label for="body">What would you like to say?</label>
  <textarea class="form-control" name="body" id="body" rows="10" >{{$post->body}}</textarea>
</div>


<button type="submit" class="btn btn-primary">Submit</button>






</form>

@endsection





</x-admin-master>
