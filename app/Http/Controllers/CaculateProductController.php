<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Color;
use App\Models\Calculate_product;
use Illuminate\Console\View\Components\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class CaculateProductController extends Controller
{
    public function index(){
        $calculate_products = Calculate_product::join('products', 'calculate_products.product_id', '=', 'products.id')
        ->select('calculate_products.*','products.Name_EN as product_name')->get();

        $products = DB::table('products')->select('id','Name_EN','Name_KH')->where('status','1')->get();
        // Clear and specific
        return view('admin.cal_product.index', ['products' => $products , 'calculate_products' => $calculate_products]);
    }

    // Validation rules for product creation
    private function validationRules(){
        return [
            'product_id' => 'required|integer|exists:products,id',
            'net_weight' => 'required|numeric|decimal:,2',
            'coverage_area' => 'required|numeric|decimal:0,2',
            'status' => 'nullable|in:1,0',
        ];
    }

    public function store(Request $request){
        // Step 1: Validate ALL required fields
        $validated = $request->validate($this->validationRules());

        try {
            Calculate_product::create($validated);
            return redirect()->route('admin.cal_product.index')->with('success', 'Calculate product created successfully.');

        } catch (\Exception $e) {
            // Log the detailed error for debugging
            Log::error('Calculate product creation failed: ' . $e->getMessage(), [
                'request_data' => $request->all(),
            ]);
            return back()->withInput()->with('error', 'Failed to create calculate product. Please try again.');
        }
    }

    private function validationRulesUpdate(){
        return [
            'edit_product_id' => 'required|integer|exists:products,id',
            'edit_net_weight' => 'required|numeric|decimal:,2',
            'edit_coverage_area' => 'required|numeric|decimal:0,2',
            'status' => 'nullable|in:1,0',
        ];
    }

    public function edit($id){
        $calculate_product = Product::findOrFail($id);
        return response()->json($calculate_product);
    }

    public function update(Request $request, $id){
        // Find the model to update. This will throw a 404 if not found.
        $calculate_product = Calculate_product::findOrFail($id);
        $validated = $request->validate($this->validationRulesUpdate());

        try {
            // Update the model with the validated data.
            $calculate_product->update([
                // Mapping validated input names to database column names.
                'product_id' => $validated['edit_product_id'],
                'net_weight' => $validated['edit_net_weight'],
                'coverage_area' => $validated['edit_coverage_area'],
                'status' => $validated['status'] ?? '1',
            ]);

            // Redirect with a success message.
            return redirect()->route('admin.cal_product.index')->with('success', 'Color family Updated successfully.');

        } catch (\Exception $e) {
            // Log any errors that occur during the update process.
            Log::error('Color family update failed: ' . $e->getMessage(), [
                'id' => $id,
                'calculate_product_data' => $calculate_product->toArray(),
                'request_data' => $request->all(),
                'exception_trace' => $e->getTraceAsString()
            ]);
            
            // Redirect back with an error message.
            return back()->with('error', 'Failed to update color family. Please try again.');
        }
    }

    public function destroy($id){
        $calculate_product = Calculate_product::findOrFail($id);

        try {
            $calculate_product->update(['status' => 0]);

            return redirect()->route('admin.cal_product.index')->with('success', 'Calculate product removed successfully.');

        } catch (\Exception $e) {
            // Log any errors that occur during the status update process
            Log::error('Product status update to inactive failed: ' . $e->getMessage(), [
                'id' => $id,
                'calculateproduct_data' => $calculate_product->toArray(), // Log product data for context
                'exception_trace' => $e->getTraceAsString() // Add trace for better debugging
            ]);
            // Redirect back with an error message
            return back()->with('error', 'Failed to deleted calculate product. Please try again.');
        }
    }
}
