<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ColorFamilyController extends Controller
{
    public function index(){
        $colorfamilys = DB::table('color_families')->select('id','name')->get();
        return view('admin.colorfamily.index',compact('colorfamilys'));
    }
}
