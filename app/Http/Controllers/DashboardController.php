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

    public function edit($id){
        $colorfamily = Colorfamily::findOrFail($id);
        return response()->json($colorfamily);
    }

    private function validationRulesUpdate(){
        return [
            'name_en_edit' => 'required|string|max:255',
            'name_kh_edit' => 'required|string|max:255',
            'color_code_edit' => 'required|string|max:7',
            // Corrected: Removed the extra double-quote
            'parent_edit' => 'nullable|string|max:255',
            'status' => 'nullable|in:1,0',
        ];
    }

    public function update(Request $request, $id){
        // Find the model to update. This will throw a 404 if not found.
        $colorfamily = Colorfamily::findOrFail($id);
        $validated = $request->validate($this->validationRulesUpdate());

        try {
            // Update the model with the validated data.
            $colorfamily->update([
                // Mapping validated input names to database column names.
                'name' => $validated['name_en_edit'],
                'name_kh' => $validated['name_kh_edit'],
                'color_code' => $validated['color_code_edit'],
                'parent' => $validated['parent_edit'],
                'status' => $validated['status'] ?? '1',
            ]);

            // Redirect with a success message.
            return redirect()->route('admin.dashboard.home')->with('success', 'Update colorfamily successfully.');

        } catch (\Exception $e) {
            // Log any errors that occur during the update process.
            Log::error('Color family update failed: ' . $e->getMessage(), [
                'id' => $id,
                'colorfamily_data' => $colorfamily->toArray(),
                'request_data' => $request->all(),
                'exception_trace' => $e->getTraceAsString()
            ]);
            
            // Redirect back with an error message.
            return back()->with('error', 'Failed to update color family. Please try again.');
        }
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