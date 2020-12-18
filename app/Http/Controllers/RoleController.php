<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

use Illuminate\Support\Str;


class RoleController extends Controller
{
    //
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', ['roles'=>$roles]);
    }

    public function store(Request $request)
    {
        request()->validate([
            'name'=> ['required']
        ]);

        Role::create([
            'name'=> Str::ucfirst(request('name')),
            'slug'=> Str::of(Str::lower(request('name')))->slug('-')
        ]);

        $request->session()->flash('message', 'Role was created...');

        return back();
    }

}
