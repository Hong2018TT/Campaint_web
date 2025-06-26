<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('admin.users.index');
    }

    public function profile(){
        return view('admin.users.profile');
    }
}
