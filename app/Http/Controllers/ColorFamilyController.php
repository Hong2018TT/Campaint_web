<?php

namespace App\Http\Controllers;
use App\Models\Colorfamily;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ColorfamilyController extends Controller
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
        $colorfamilys = Colorfamily::All()->where('status','1');
        // $colorfamily1s = Colorfamily::All()->where('status','1');
        return view('admin.colorfamily.index',compact('colorfamilys'));
    }

    // Insert database on model tailwind css
    public function store(Request $request){
        // Step 1: Validate input
        $validated = $request->validate($this->validationRules());

        // Try catch some error insert database in color-family
        try{
            $colorfamily = Colorfamily::Create([
                'name' => $validated['name_en'],
                'name_kh' => $validated['name_kh'],
                'color_code' => $validated['color_code'],
                // If 'parent' is not provided, it defaults to 'Color Families (អម្បូរពណ៌)'
                'parent' => $validated['parent'] ?? 'Color Families (អម្បូរពណ៌)',
                'status' => $validated['status'] ?? '1', // Default to '1' if not provided
            ]);

            // Check Create Color Family
            if($colorfamily){
                return redirect()->route('admin.colorfamily.index')->with('success', 'Color family created successfully.');
            } else {
                return back()->withInput()->with('error', 'Failed to color family. Please try again.');
            }
        }catch (\Exception $e) {
            Log::error('Product creation failed: ' . $e->getMessage(), [
                'request_data' => $request->all(),
            ]);
            return back()->withInput()->with('error', 'Failed to create color family. Please try again.');
        }
    }
    
    // Set validationRulesUpdate
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
            return redirect()->route('admin.colorfamily.index')->with('success', 'Color family Updated successfully.');

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
        $colorfamily = Colorfamily::findOrFail($id);

        try {
            $colorfamily->update(['status' => 0]);

            return redirect()->route('admin.colorfamily.index')->with('success', 'Product removed successfully.');

        } catch (\Exception $e) {
            // Log any errors that occur during the status update process
            Log::error('Product status update to inactive failed: ' . $e->getMessage(), [
                'id' => $id,
                'product_data' => $colorfamily->toArray(), // Log product data for context
                'exception_trace' => $e->getTraceAsString() // Add trace for better debugging
            ]);
            // Redirect back with an error message
            return back()->with('error', 'Failed to deleted color family. Please try again.');
        }
    }
}
