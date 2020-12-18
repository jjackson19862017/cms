<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;


class RoleController extends Controller
{
    //
    public function index()
    {
        return view('admin.roles.index');
    }

    public function store()
    {
        dd(request('name'));
    }

}
