<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function show(User $user)
    {
        return view('admin.user.profile', ['user'=>$user]);
    }

    public function update(User $user, Request $request)
    {
        # Updating a Users Profile
        $inputs = request()->validate([

            'username'=> ['required', 'string', 'max:255', 'alpha_dash'],
            'name'=> ['required', 'string', 'max:255'],
            'email'=> ['required', 'email', 'max:255'],
            'avatar'=>['file'],
            //'password'=>['min:5','max:255', 'confirmed'],
        ]);

        if(request('avatar')){
           $inputs['avatar'] = request('avatar')->store('images');
        }

        $request->session()->flash('message', 'Profile Updated...');
        $user->update($inputs);
        return back();
    }

    public function index()
    {
        $users = User::all();
        return view('admin.user.index', ['users'=>$users]);
    }

    public function destroy(Request $request, User $user){
        $user->delete();
        $request->session()->flash('message', 'User was Deleted...');
        return back();
    }
}
