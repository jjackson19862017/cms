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
        return back(); // Returns to previous page
    }

    public function index(){

                // info To access our posts in the database we will set it into a variable
        $posts = Post::all();
        return view('admin.posts.index', ['posts'=>$posts]);
    }

    public function destroy(Post $post){
        $post->delete();
        return back();
    }
}
