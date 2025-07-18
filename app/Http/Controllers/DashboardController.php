<?php

namespace App\Http\Controllers;
use App\models\Depo;
use App\models\Product;
use App\models\Color;
use App\Models\Color_families;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request){
        $depocount = Depo::All()->count();
        $product_typecount = Product::All()->count();
        $colorcount = Color::All()->count();
        $color_familycount = Color_families::All()->count();


        $depos = Depo::All();

        return view('admin.dashboard.home' , compact('depos','depocount','product_typecount','colorcount','color_familycount') ); // Pass users to the view
    }

    public function delete(){
        
    }
}