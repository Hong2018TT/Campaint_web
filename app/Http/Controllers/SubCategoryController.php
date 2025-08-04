<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index(){
        return view('admin.subcategories.index');
    }
}
