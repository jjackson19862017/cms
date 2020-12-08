<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    //
    public function show(Post $post)
    {

        return view('blog-post', ['post'=>$post]);
    }

    public function create(){
        return view('admin.posts.create');
    }

    public function store(Request $request){

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

    public function index(){

                // info To access our posts in the database we will set it into a variable
        $posts = Post::all();
        return view('admin.posts.index', ['posts'=>$posts]);
    }

    public function edit(Post $post){
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

        $post->title = $inputs['title'];
        $post->body = $inputs['body'];


        auth()->user()->posts()->save($post); // info This will update the user, so if it was someone elses post it would overwrite ownership, if you wanted to keep the original owner then just use this $post->save();

        $request->session()->flash('message', 'Post with title of ' . $inputs['title'] . ' was updated...');
        return redirect()->route('post.index');
    }

    public function destroy(Request $request, Post $post){
        $post->delete();
        $request->session()->flash('message', 'Post was Deleted...');
        return back();
    }
}
