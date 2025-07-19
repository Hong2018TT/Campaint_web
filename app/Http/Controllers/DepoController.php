<?php

namespace App\Http\Controllers;
use App\Models\Depo;
use Illuminate\Http\Request;

class DepoController extends Controller
{
    public function index(){
        $depos = Depo::All();
        return view('admin.depo.index', compact('depos'));
    }

    public function create(){
        return view('admin.depo.create');
    }

    public function edit(){
        return view('admin.depo.edit');
    }

    public function delete(){
        
    }
}
