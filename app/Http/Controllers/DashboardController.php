<?php

namespace App\Http\Controllers;
use App\models\Depo;
use App\models\Product;
use App\models\Color;
use App\Models\Colorfamily;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index(Request $request){
        $depocount = Depo::All()->count();
        $product_typecount = Product::All()->count();
        $colorcount = Color::All()->count();
        $color_familycount = Colorfamily::All()->count();
        $colorfamilyselects = Colorfamily::All();

        $colorfamilys = DB::table('colorfamilys')->select('id','name','name_kh','color_code','parent')->where('status','1')->get();

        return view('admin.dashboard.home' , compact('colorfamilys','depocount','product_typecount','colorcount','color_familycount','colorfamilyselects') ); // Pass users to the view
    }

    public function destroy($id){
        $colorfamily =Colorfamily::findOrFail($id);

        try {
            $colorfamily->update(['status' => 0]);

            return redirect()->route('admin.dashboard.home')->with('success', 'Colorfamily moved successfully.');

        } catch (\Exception $e) {
            // Log any errors that occur during the status update process
            Log::error('Colorfamily status update to inactive failed: ' . $e->getMessage(), [
                'id' => $id,
                'colorfamily_data' => $colorfamily->toArray(), // Log product data for context
                'exception_trace' => $e->getTraceAsString() // Add trace for better debugging
            ]);
            // Redirect back with an error message
            return back()->with('error', 'Failed to change colorfamily. Please try again.');
        }
    }
}