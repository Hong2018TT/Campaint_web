<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ColorFamilyController extends Controller
{
    public function index(){
        return view('admin.colorfamily.index');
    }
}
