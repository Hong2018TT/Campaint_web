<?php

namespace App\Http\Controllers;
use App\Models\Color;
use App\Models\Colorfamily;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;


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
        $colors = Color::where('status', '1')->get();
        return view('admin.color.index', compact('colors'));
    }

    public function getColorsData(Request $request){
        if ($request->ajax()) {
            $query = Color::where('status', '1');

            return DataTables::of($query)
                ->addIndexColumn() // Adds the row index column
                ->addColumn('color_preview', function ($color) {
                    // This creates the color preview div
                    return '<div class="w-12 h-5 rounded border-1 border-gray-400" style="background-color:rgb('.$color->r.', '.$color->g.', '.$color->b.')"></div>';
                })
                ->addColumn('action', function ($color) {
                    // Your action buttons HTML, with dynamic URLs and Alpine.js
                    $editUrl = route('admin.color.edit', $color->id);
                    // Assume you have a route for deleting colors, e.g., 'admin.color.destroy'
                    $deleteUrl = route('delete_color', $color->id);
                    $csrfField = csrf_field();
                    $methodField = method_field('DELETE');

                    return <<<HTML
                        <div class="table-cell-actions">
                            <div class="">
                                <a href="{$editUrl}" class="table-action-edit"><i class="ri-pencil-line"></i></a>
                            </div>
                            <div x-data="{ open: false, colorIdToDelete: null }">
                                <a @click="open = true; colorIdToDelete = {$color->id}" class="table-action-delete">
                                    <i class="ri-delete-bin-6-fill"></i>
                                </a>
                                <div x-show="open"
                                    x-transition:enter="transition-opacity ease-out duration-300"
                                    x-transition:enter-start="opacity-0"
                                    x-transition:enter-end="opacity-100"
                                    x-transition:leave="transition-opacity ease-in duration-200"
                                    x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0"
                                    class="fixed inset-0 flex items-start justify-center z-[100] bg-black/60"
                                    style="display: none;">
                                    <div x-show="open"
                                        x-transition:enter="transition-all transform ease-out duration-300"
                                        x-transition:enter-start="opacity-0 scale-95 -translate-y-[30px]"
                                        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                                        x-transition:leave="transition-all transform ease-in duration-200"
                                        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                                        x-transition:leave-end="opacity-0 scale-95 -translate-y-[30px]"
                                        class="modal-box-md" @click.outside="open = false">
                                        <div class="modal-header-del">Delete</div>
                                        <div class="modal-body">
                                            <p class="text-lg text-red-500">Are you sure you want to delete this item?</p>
                                        </div>
                                        <form action="{$deleteUrl}" method="POST">
                                            {$csrfField}
                                            {$methodField}
                                            <div class="model-footer">
                                                <a @click="open = false" class="btn-close-model">Close</a>
                                                <button type="submit" class="btn-del-model">Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    HTML;
                })
                ->rawColumns(['color_preview', 'action']) // Tell DataTables not to escape this HTML
                ->make(true);
        }
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
                return back()->withInput()->with('error', 'Failed to create color. Please try again.');
            }
        }catch(\Exception $e){
            Log::error('Color creation failed: ' . $e->getMessage(),[
                'request_data' => $request->all(),
                'exception_trace' => $e->getTraceAsString()
            ]);
        }
    }

    public function edit($id){
        $colorfamilys = Colorfamily::All()->where('status','1');
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

            return redirect()->route('admin.color.index')->with('success','Color update successfully');

        }catch(\Exception $e){
             // Log any errors that occur during the status update process
            Log::error('Product status update to inactive failed: ' . $e->getMessage(), [
                'id' => $id,
                'color_data' => $color->toArray(), // Log product data for context
                'exception_trace' => $e->getTraceAsString() // Add trace for better debugging
            ]);
            // Redirect back with an error message
            return back()->with('error', 'Failed to update product. Please try again..');
        }
    }

    public function destroy($id){
        $color = Color::findOrFail($id);

        try {
            $color->update(['status' => 0]);

            return redirect()->route('admin.color.index')->with('success', 'Color removed successfully.');

        } catch (\Exception $e) {
            // Log any errors that occur during the status update process
            Log::error('Product status update to inactive failed: ' . $e->getMessage(), [
                'id' => $id,
                'color_data' => $color->toArray(), // Log product data for context
                'exception_trace' => $e->getTraceAsString() // Add trace for better debugging
            ]);
            // Redirect back with an error message
            return back()->with('error', 'Failed to deleted product. Please try again.');
        }
    }

}