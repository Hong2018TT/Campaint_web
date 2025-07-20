<?php

namespace App\Http\Controllers;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index(){
        $colors = Color::All();
        return view('admin.color.index',compact('colors')); // Pass colors to the view
    }

    public function create(){
        return view('admin.color.create'); // Pass colors to the insert database
    }

    public function edit(){
        return view('admin.color.edit'); // Pass colors to the edit database
    }

    public function update(){
        
    }

    public function delete(){
        
    }
}
