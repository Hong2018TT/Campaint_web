<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function index(){
        // Use for test Error 500
        // abort(500);
        return view('admin.auth.index');
    }

    public function login(Request $request){
        // Step 1: Validate user input
         $validation = $request->validate([
        'email' => 'required|email', // Ensure the email is valid
        'password' => 'required|min:9', // Ensure the password is at least 9 characters
        ], [
            'email.required' => 'The email field is required. Please try again.', 
            'password.required' => 'The password field is required.',
            'password.min' => 'Your password must be at least 9 characters long.',
        ]);

        // Step 2: Prepare credentials and check "Remember Me"
        $credentials = ['email' => $request->email, 'password' => $request->password];
        $remember = $request->has('remember');

        // Step 3: Attempt authentication
        if (Auth::attempt($credentials, $remember)) {

            // Step 4: Handle "Remember Me" functionality with cookies
            if ($remember) {
                Cookie::queue('email', $request->email, 30); // Store email for 1 minute
                Cookie::queue('password', $request->password, 30); // Store password for 1 minute
                // , 0.5 & , time() + 30, '/'
            } else {
                Cookie::queue(Cookie::forget('email'));
                Cookie::queue(Cookie::forget('password'));
            }

            $usershow = Auth::user(); // Fetch the logged-in user
            $userRole = $roles[$usershow->role] ?? 'Unknown Role'; // Assign role or default to 'Unknown Role'
            
            // Step 5: Redirect based on user type
            if (Auth::check() && Auth::user()->role == 'Administrator') { 
                return redirect(route('admin.dashboard.home'))->with('success' , 'Signed in successfully!');
            }else{
                return redirect(route('admin.dashboard.home'))->width('error', 'Signed is not successfully!');
            }
        }
        else{
            // Step 6: Authentication failed
            return redirect(route('admin.auth.index'))->withErrors(['email' => 'Invalid email or password.'])
            ->withInput($request->only('email', 'remember')); // Retain email and "Remember Me" status
        }
    }

    public function logout(Request $request){
        // Step 1: Log the user out using the Auth facade.
        Auth::guard('web')->logout();
        // Step 2: Invalidate the user's session to prevent reuse.
        $request->session()->invalidate();
        // Step 3: Regenerate the CSRF token to prevent token-related attacks.
        $request->session()->regenerateToken();
        // Step 4: Redirect the user to the login page with a success message (optional but good practice).
        return redirect()->route('admin.auth.index')->with('success', 'You have been logged out successfully.');
    }
}
