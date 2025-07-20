<?php

namespace App\Http\Controllers;
use App\Models\About_us;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $about_us = \App\Models\About_us::first(); // returns a single model
        return view('admin.about.index',compact('about_us'));
    }
}
