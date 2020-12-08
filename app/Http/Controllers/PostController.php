<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    //
    public function index(Request $request){
        // info To create Policy's type 'php artisan make:policy PostPolicy --model=Post' in the terminal.

        // info To access our posts in the database we will set it into a variable
        //$posts = Post::all();

        $posts = auth()->user()->posts;

        return view('admin.posts.index', ['posts'=>$posts]);
    }

    public function show(Post $post)
    {

        return view('blog-post', ['post'=>$post]);
    }

    public function create(){
        $this->authorize('create', Post::class); // info Only Allows users logged in to create posts.

        return view('admin.posts.create');
    }

    public function store(Request $request){

        $this->authorize('create', Post::class); // info Only Allows users logged in to store posts.

        $inputs = request()->validate([
            'title'=>'required|min:8|max:255', // info Different rules need pipes!!!!
            'post_image'=>'file',
            'body'=>'required'
        ]);

        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
        }

        auth()->user()->posts()->create($inputs); // info Run in terminal 'php artisan storage:link'

        $request->session()->flash('message', 'Post with title of ' . $inputs['title'] . ' was created...');
        return redirect()->route('post.index');
    }

    public function edit(Post $post){

        $this->authorize('view', $post); // This stops users from editing other peoples Posts.
        return view('admin.posts.edit', ['post'=>$post]);
    }

    public function update(Post $post, Request $request){
        $inputs = request()->validate([
            'title'=>'required|min:8|max:255', // info Different rules need pipes!!!!
            'post_image'=>'file',
            'body'=>'required'
        ]);

        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
        }

        $this->authorize('update', $post); // info Only Allows users to edit their own posts.

        $post->title = $inputs['title'];
        $post->body = $inputs['body'];


        auth()->user()->posts()->save($post); // info This will update the user, so if it was someone else post it would overwrite ownership, if you wanted to keep the original owner then just use this $post->save();

        $request->session()->flash('message', 'Post with title of ' . $inputs['title'] . ' was updated...');
        return redirect()->route('post.index');
    }

    public function destroy(Request $request, Post $post){
        $post->delete();
        $this->authorize('delete', $post); // info Only Allows users to edit their own posts.
        $request->session()->flash('message', 'Post was Deleted...');
        return back();
    }
}
