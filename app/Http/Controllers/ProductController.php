<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('admin.product.index'); // Pass users to the view
    }

    public function create(){
        return view('admin.product.create');
    }

    public function edit(){
        return view('admin.product.edit');
    }
}
