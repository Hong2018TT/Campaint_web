<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::All();
        return view('admin.users.index',compact('users'));
    }

    public function create(){

    }

    public function edit(){

    }

    public function delete(){
        
    }

    public function profile(){
        return view('admin.users.profile');
    }
}
