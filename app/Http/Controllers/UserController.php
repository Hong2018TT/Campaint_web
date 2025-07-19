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
        return view('admin.users.create');
    }

    public function edit(){
        return view('admin.users.edit');
    }

    public function update(){

    }

    public function delete(){

    }


    public function profile(){
        return view('admin.users.profile');
    }
}
