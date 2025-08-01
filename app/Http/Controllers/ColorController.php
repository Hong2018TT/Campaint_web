<?php

namespace App\Http\Controllers;
use App\Models\Color;
use App\Models\Colorfamily;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables; // Import DataTables

class ColorController extends Controller
{
    // Validation rules for color creation
    private function validationRules(){
        return[
            'color_code' => 'required|string|max:255',
            'color_name' => 'required|string|max:255',
            'r' => 'required|integer|min:0|max:255',
            'g' => 'required|integer|min:0|max:255',
            'b' => 'required|integer|min:0|max:255',
            'product_type' => 'nullable|string|max:255',
            'color_family' => 'required|string|max:255',
            'status' => 'nullable|in:1,0',
        ];
    }

    public function index(){
        $colors = Color::where('status', '1')->limit(100)->get();
        return view('admin.color.index', compact('colors'));
    }

    public function create(){
        $colorfamilys = Colorfamily::select('id','name')->get();
        return view('admin.color.create',compact('colorfamilys')); // Pass colors to the insert database
    }

    public function store(Request $request){
        $validated = $request->validate($this->validationRules());

        try{
            $color = Color::create([
                'color_code' => $validated['color_code'],
                'color_name' => $validated['color_name'],
                'r' => $validated['r'],
                'g' => $validated['g'],
                'b' => $validated['b'],
                'product_type' => $validated['product_type'],
                'color_family' => $validated['color_family'],
                'status' => $validated['status'] ?? '1', // Default to '1' if not provided
            ]);

            if($color){
                return redirect()->route('admin.color.index')->with('success', 'Color created successfully.');
            }else{
                return back()->withInput()->with('error', 'Failed to create color. No color instance returned.');
            }
        }catch(\Exception $e){
            Log::error('Color creation failed: ' . $e->getMessage(),[
                'request_data' => $request->all(),
                'exception_trace' => $e->getTraceAsString()
            ]);
        }
    }

    public function edit($id){
        $colorfamilys = Colorfamily::All();
        $color = Color::findOrFail($id);
        return view('admin.color.edit',compact('color','colorfamilys')); // Pass colors to the edit database
    }

    public function update(Request $request, $id){
        $color = Color::findOrfail($id);

        $validated = $request->validate($this->validationRules());

        try{
            $color->update([
                'color_code' => $validated['color_code'],
                'color_name' => $validated['color_name'],
                'r' => $validated['r'],
                'g' => $validated['g'],
                'b' => $validated['b'],
                'product_type' => $validated['product_type'],
                'color_family' => $validated['color_family'],
                'status' => $validated['status'] ?? '1', // Default to '1' if not provided
            ]);

            return redirect()->route('admin.color.index')->with('success','Color update cussessfully');

        }catch(\Exception $e){
             // Log any errors that occur during the status update process
            Log::error('Product status update to inactive failed: ' . $e->getMessage(), [
                'id' => $id,
                'color_data' => $color->toArray(), // Log product data for context
                'exception_trace' => $e->getTraceAsString() // Add trace for better debugging
            ]);
            // Redirect back with an error message
            return back()->with('error', 'Failed to change color status. Please try again.');
        }
    }
}