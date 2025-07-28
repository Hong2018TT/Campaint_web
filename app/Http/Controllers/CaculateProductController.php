<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Color;
use App\Models\Color_families;
use Illuminate\Console\View\Components\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CaculateProductController extends Controller
{
    public function index(){
        $products = DB::table('products')->select('id','Name_EN','Name_KH')->get();
        // Clear and specific
        return view('admin.cal_product.index', ['products' => $products]);

        // Clean and short
        // return view('admin.products.index', compact('products'));
    }

    public function create(){
        
    }

    public function update(){
        
    }

    public function delete(){
        
    }
}
