<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(){
        $products = DB::table('products')->select('product_id','Name_EN','Name_KH','image_url')->get();
        return view('admin.product.index',compact('products')); // Pass users to the view
    }

    public function create(){
        return view('admin.product.create');
    }

    public function edit(){
        return view('admin.product.edit');
    }

    public function update(){
        
    }

    public function delete(){

    }
}
