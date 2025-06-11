<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(){
        // Use for test Error 500
        // abort(500);
        return view('admin.auth.index');
    }
}
