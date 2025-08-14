<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session; // For flash messages, if not already using 'with()'
use Illuminate\Validation\ValidationException; // For specific validation error handling


class AuthController extends Controller
{

    public function index(){
        // Use for test Error 500
        // abort(500);
        return view('admin.auth.index');
    }

    public function login(Request $request){
        // Step 1: Validate user input with strong rules
        try {
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255'], // More robust email validation
                'password' => ['required', 'string', 'min:9'], // Passwords should be hashed, so min length for input is fine
            ], [
                'email.required' => 'The email field is required. Please try again.',
                'email.email' => 'Please enter a valid email address.',
                'password.required' => 'The password field is required.',
                'password.min' => 'Your password must be at least 9 characters long.',
            ]);
        } catch (ValidationException $e) {
            // Return validation errors with input
            return redirect(route('admin.auth.index'))
                ->withErrors($e->errors())
                ->withInput($request->only('email', 'remember'));
        }

        // Step 2: Prepare credentials and check "Remember Me"
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $remember = $request->boolean('remember'); // Use boolean to ensure true/false

        // Step 3: Attempt authentication with throttling (Laravel's default for login attempts)
        // Laravel's built-in Auth::attempt handles hashing, so don't hash the input password here.
        if (Auth::attempt($credentials, $remember)) {
            // Regeneration of session ID to prevent session fixation attacks
            $request->session()->regenerate();
            
            if ($remember) {
                 Cookie::queue('email', $request->email, 60 * 24 * 30); // Remember email for 30 days, for example
            } else {
                 // If 'remember me' is not checked, clear any 'remember_email' cookie if it exists.
                Cookie::queue(Cookie::forget('email'));
            }

            $user = Auth::user(); // Fetch the user right away
            // Update the last login time here!
            $user->forceFill(['last_login_at' => now()])->save();

            if ($user->role === 'Administrator') { // Use strict comparison
                // Use a proper success message with `session()->flash()` or `with()` helper
                return redirect()->intended(route('admin.dashboard.home'))->with('success', 'Welcome back, Administrator!');
            }elseif(($user->role === 'Manager')) {
                // If the user is a Super Administrator, redirect to the intended route
                return redirect()->intended(route('admin.dashboard.home'))->with('success', 'Welcome back, Manager!');
            }elseif($user->role === 'User'){
                // If the user is a Super Administrator, redirect to the intended route
                return redirect()->intended(route('admin.dashboard.home'))->with('success', 'Welcome back, User!');
            }
            else{
                
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect(route('admin.auth.index'))
                    ->withErrors(['email' => 'You do not have administrative access.'])
                    ->withInput($request->only('email'));
            }
            
        } else {
            // Step 6: Authentication failed
            // Use specific error messages to avoid providing hints to attackers (e.g., "Email not found" vs "Invalid credentials")
            return redirect(route('admin.auth.index'))
                ->withErrors(['email' => 'The email or password you entered is incorrect. Please try again.',]) // Generic error message
                ->withInput($request->only('email', 'remember')); // Retain email and "Remember Me" status
        }
    }


    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        // Step 1: Log the user out using the Auth facade.
        // Auth::logout() will log out the default guard (usually 'web').
        // Explicitly calling Auth::guard('web')->logout() is fine, but Auth::logout() is often sufficient.
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.auth.index')->with('success', 'You have been logged out successfully.');
    }
}
