<?php

namespace App\Http\Controllers;
use App\Models\Depo;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\DataTables; // Import the DataTables facade

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
        $depos = Depo::where('status','1')->get();
        // Fetch a list of unique provinces directly from the database
        $province_selete = Depo::where('status', '1')
                        ->distinct()
                        ->pluck('province_EN')
                        ->filter()
                        ->sort()
                        ->values()
                        ->all();

        $provinces = Province::all();

        return view('admin.depo.index', compact('depos','province_selete','provinces'));
    }

    public function getDeposData(Request $request){
        if ($request->ajax()) {
            // Use the query builder directly, without calling ->get()
            $query = Depo::where('status', '1');

            // The rest of your filtering and processing logic is correct
            if ($request->has('search.value') && !empty($request->input('search.value'))) {
                
                $searchValue = $request->input('search.value');
                $query->where(function ($q) use ($searchValue) {
                    $q->where('Name_EN', 'like', "%{$searchValue}%")
                        ->orWhere('Name_KH', 'like', "%{$searchValue}%")
                        ->orWhere('Address_EN', 'like', "%{$searchValue}%")
                        ->orWhere('Address_KH', 'like', "%{$searchValue}%")
                        ->orWhere('province_EN', 'like', "%{$searchValue}%")
                        ->orWhere('province_KH', 'like', "%{$searchValue}%")
                        ->orWhere('Phone', 'like', "%{$searchValue}%")
                        ->orWhere('GPS', 'like', "%{$searchValue}%");
                });
            }

            if ($request->has('columns.4.search.value') && !empty($request->input('columns.4.search.value'))) {
                $provinceFilter = trim($request->input('columns.4.search.value'), '^$');
                $query->where('province_EN', $provinceFilter);
            }

            // Yajra DataTables will automatically add the pagination, sorting, and searching
            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('action', function ($depo) {
                    $editUrl = route('admin.depo.edit', $depo->id);
                    $deleteUrl = route('delete_depo', $depo->id);
                    $csrfField = csrf_field();
                    $methodField = method_field('DELETE');

                    return <<<HTML
                        <div class="table-cell-actions">
                            <div class="">
                                <a href="{$editUrl}" class="table-action-edit"><i class="ri-pencil-line"></i></a>
                            </div>

                            <div x-data="{ open: false}" >
                                <a @click="open = true" class="table-action-delete">
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
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function create(){
        $provinces = Province::All();
        $provincesen = Province::All();
        return view('admin.depo.create',compact('provinces','provincesen'));
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
                'province_EN' => $validated['province_EN'],
                'Phone' => $validated['Phone'],
                'GPS' => $validated['GPS'],
                'status' => $validated['status'] ?? '1', // Default to '1' if not provided
            ]);

            if ($depo) {
                return redirect()->route('admin.depo.index')->with('success', 'Depo created successfully.');
            } else {
                return back()->withInput()->with('error', 'Failed to create depo. Please try again.');
            }

        } catch (\Exception $e) {
            Log::error('Depo creation failed: ' . $e->getMessage(), [
                'request_data' => $request->all(),
                'exception_trace' => $e->getTraceAsString() // Add trace for better debugging
            ]);
            return back()->withInput()->with('error', 'Failed to create depo. Please try again.');
        }
    }

    public function edit($id){
        $depo = Depo::findOrFail($id);
        $provinces = Province::All();
        return view('admin.depo.edit',compact('depo','provinces'));
    }

    public function update(Request $request, $id){

        $depo = Depo::findOrFail($id);
        $validated = $request->validate($this->validationRules());

        try{
            $depo->update([
                'Name_EN' => $validated['Name_EN'],
                'Name_KH' => $validated['Name_KH'],
                'Address_EN' => $validated['Address_EN'],
                'Address_KH' => $validated['Address_KH'],
                'province_KH' => $validated['province_KH'],
                'province_EN' => $validated['province_EN'],
                'Phone' => $validated['Phone'],
                'GPS' => $validated['GPS'],
                'status' => $validated['status'] ?? '1', // Default to '1' if not provided
            ]);

            if($depo){
                return redirect()->route('admin.depo.index')->with('success', 'Depo undated successfully.');
            }

        }catch (\Exception $e) {
            Log::error('Product creation failed: ' . $e->getMessage(), [
                'id' => $id,
                'request_data' => $request->all(),
                'exception_trace' => $e->getTraceAsString() // Add trace for better debugging
            ]);
            return back()->withInput()->with('error', 'Failed to update product. Please try again..');
        }
    }

    public function destroy($id){
        $depo = Depo::findOrFail($id);

        try {
            // To change status = 0
            $depo->update(['status' => 0]);

            return redirect()->route('admin.depo.index')->with('success', 'Product removed successfully.');

        } catch (\Exception $e) {
            // Log any errors that occur during the status update process
            Log::error('Product status update to inactive failed: ' . $e->getMessage(), [
                'id' => $id,
                'depo_data' => $depo->toArray(), // Log product data for context
                'exception_trace' => $e->getTraceAsString() // Add trace for better debugging
            ]);
            // Redirect back with an error message
            return back()->with('error', 'Failed to change product status. Please try again.');
        }
    }
}
