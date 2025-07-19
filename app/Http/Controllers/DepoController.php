<?php

namespace App\Http\Controllers;

use App\Models\Depo;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DepoController extends Controller
{
    /**
     * Show depot list in traditional pagination view.
     */
   public function index()
{
    $depots = Depo::paginate(10);
    $depotCount = Depo::count();

    return view('admin.depo.index', compact('depots', 'depotCount'));
}


    /**
     * Return JSON data for DataTables AJAX with province filter.
     */
    public function ajaxTable(Request $request)
    {
        if ($request->ajax()) {
            $data = Depo::query();

            if ($request->filled('province')) {
                $data->where('province_EN', $request->province);
            }

            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    return view('admin.depo.partials.action_buttons', compact('row'))->render();
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return abort(404);
    }

    /**
     * Show the form to create a new depot.
     */
    public function create()
    {
        return view('admin.depo.create');
    }

    /**
     * Show the form to edit an existing depot.
     */
    public function edit($id)
    {
        $depo = Depo::findOrFail($id);
        return view('admin.depo.edit', compact('depo'));
    }

    /**
     * Handle depot deletion.
     */
    public function destroy($id)
    {
        try {
            $depo = Depo::findOrFail($id);
            $depo->delete();

            return redirect()->back()->with('success', 'Depot deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete depot: ' . $e->getMessage());
        }
    }
}
