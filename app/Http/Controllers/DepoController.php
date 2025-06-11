<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepoController extends Controller
{
     public function index(){
        return view('admin.depo.index');
    }

    public function create(){
        return view('admin.depo.create');
    }

    public function edit(){
        return view('admin.depo.edit');
    }
}
