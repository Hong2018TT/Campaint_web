<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaculateProductController extends Controller
{
    public function index(){
        return view('admin.cal_product.index');
    }
}
