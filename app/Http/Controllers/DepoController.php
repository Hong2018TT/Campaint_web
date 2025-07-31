<?php

namespace App\Http\Controllers;
use App\Models\Depo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

class DepoController extends Controller
{
    private function validationRules(){
        return[
            'Name_EN' => 'required|string|max:255',
            'Name_KH' => 'required|string|max:255',
            'Address_EN' => 'required|string',
            'province_EN' => 'nullable|string|max:255',
            'Address_KH' => 'required|string',
            'province_KH' => 'nullable|string|max:255',
            'Phone' => 'nullable|string|max:15',
            'GPS' => 'nullable|string|max:255',
            'status' => 'nullable|in:1,0', // Default to '1' if not provided
        ];
    }

    public function index(){
        $depos = Depo::where('status','1')->limit(50)->get();
        return view('admin.depo.index', compact('depos'));
    }

    public function create(){
        return view('admin.depo.create');
    }

    public function store(Request $request){

        $validated = $request->validate($this->validationRules());
        try {
            // Step 2: Use mass assignment safely
            $depo = Depo::create([
                'Name_EN' => $validated['Name_EN'],
                'Name_KH' => $validated['Name_KH'],
                'Address_EN' => $validated['Address_EN'],
                'Address_KH' => $validated['Address_KH'],
                'province_KH' => $validated['province_KH'],
                'Phone' => $validated['Phone'],
                'GPS' => $validated['GPS'],
                'status' => $validated['status'] ?? '1', // Default to '1' if not provided
            ]);

            if ($depo) {
                return redirect()->route('admin.depo.index')->with('success', 'Depo created successfully.');
            } else {
                return back()->withInput()->with('error', 'Failed to create depo. No depo instance returned.');
            }

        } catch (\Exception $e) {
            Log::error('Depo creation failed: ' . $e->getMessage(), [
                'request_data' => $request->all(),
                'exception_trace' => $e->getTraceAsString() // Add trace for better debugging
            ]);
            return back()->withInput()->with('error', 'Failed to create depo. Please try again.');
        }
    }

    public function edit(){
        return view('admin.depo.edit');
    }

    public function update(){
        
    }

    public function destroy($id){
        $depo = Depo::findOrFail($id);

        try {
            $depo->update(['status' => 0]);

            return redirect()->route('admin.depo.index')->with('success', 'Product moved to inactive/deleted status successfully.');

        } catch (\Exception $e) {
            // Log any errors that occur during the status update process
            Log::error('Product status update to inactive failed: ' . $e->getMessage(), [
                'id' => $id,
                'product_data' => $depo->toArray(), // Log product data for context
                'exception_trace' => $e->getTraceAsString() // Add trace for better debugging
            ]);
            // Redirect back with an error message
            return back()->with('error', 'Failed to change product status. Please try again.');
        }
    }
}
