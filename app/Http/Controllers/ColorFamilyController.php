<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color_families;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class ColorFamilyController extends Controller
{
    private function validationRules(){
        return[
            'name_en' => 'required|string|max:255',
            'name_kh' => 'required|string|max:255',
            'color_code' => 'required|string|max:7',
            'parent' => 'nullable|string|max:255',
            'status' => 'nullable|in:1,0', // Default to '1' if not provided
        ];
    }

    public function index(){
        // Display status = 1
        $colorfamilys = Color_families::All()->where('status','1');
        return view('admin.colorfamily.index',compact('colorfamilys'));
    }

    // Insert database on model tailwind css
    public function store(Request $request){
        // Step 1: Validate input
        $validated = $request->validate($this->validationRules());

        // Try catch some error insert database in color-family
        try{
            $colorfamily = Color_families::Create([
                'name' => $validated['name_en'],
                'name_kh' => $validated['name_kh'],
                'color_code' => $validated['color_code'],
                'parent' => $validated['parent'],
                'status' => $validated['status'] ?? '1', // Default to '1' if not provided
            ]);

            // Check Create Color Family
            if($colorfamily){
                return redirect()->route('admin.colorfamily.index')->with('success', 'Color family created successfully.');
            } else {
                return back()->withInput()->with('error', 'Failed to create product. No product instance returned.');
            }
        }catch (\Exception $e) {
            Log::error('Product creation failed: ' . $e->getMessage(), [
                'request_data' => $request->all(),
            ]);
            return back()->withInput()->with('error', 'Failed to create product. Please try again.');
        }
    }

    public function destroy($id){
        $colorfamily = Color_families::findOrFail($id);

        try {
            $colorfamily->update(['status' => 0]);

            return redirect()->route('admin.colorfamily.index')->with('success', 'Product moved to inactive/deleted status successfully.');

        } catch (\Exception $e) {
            // Log any errors that occur during the status update process
            Log::error('Product status update to inactive failed: ' . $e->getMessage(), [
                'id' => $id,
                'product_data' => $colorfamily->toArray(), // Log product data for context
                'exception_trace' => $e->getTraceAsString() // Add trace for better debugging
            ]);
            // Redirect back with an error message
            return back()->with('error', 'Failed to change product status. Please try again.');
        }
    }
}
