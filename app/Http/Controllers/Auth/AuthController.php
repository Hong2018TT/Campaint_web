<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AuthController extends Controller
{
    /**
     * Show the login form
     */
    public function index()
    {
        return view('admin.auth.index'); // your custom login form
    }

    /**
     * Handle login logic (supports both standard and AJAX)
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user, $request->has('remember'));
            $request->session()->regenerate();

            if ($request->wantsJson()) {
                return response()->json(['success' => true]);
            }

            return redirect()->intended('/dashboard');
        }

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Invalid email or password.',
                'errors' => [
                    'email' => ['Invalid email or password.']
                ]
            ], 422);
        }

        return back()->withInput()->withErrors([
            'email' => 'Invalid email or password.',
        ]);
    }

    /**
     * Logout user
     */
  // App\Http\Controllers\Auth\AuthController.php



public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login'); // or 'auth.index' if custom
}

}