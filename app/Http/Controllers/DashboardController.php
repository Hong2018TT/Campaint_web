<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Depo;

class DashboardController extends Controller
{
   public function index(Request $request)
{
    if ($request->ajax()) {
        $depots = \App\Models\Depo::paginate(10);
        return view('admin.dashboard.partials.depot_table', compact('depots'))->render(); // AJAX response
    }

    $depots = \App\Models\Depo::paginate(10);
    $depotCount = \App\Models\Depo::count();
    return view('admin.dashboard.home', compact('depots', 'depotCount'));
}

}
