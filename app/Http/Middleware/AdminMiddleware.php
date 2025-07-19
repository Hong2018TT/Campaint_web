<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response{
        // if (Auth::check() && Auth::user()->role === 'Administrator') {
        //     return $next($request);
        // }

        // return redirect('/')->with('error', 'You do not have admin access.');

        if (Auth::check()) {
            if (Auth::user()->role === 'Administrator') {
                return $next($request);
            }

            // Different user type - logout and redirect
            Auth::guard('web')->logout();
            return redirect()->route('admin.auth.index')->with('error', 'Access Denied');
        }else{
            // Unauthenticated user - logout and redirect
            Auth::guard('web')->logout();
            return redirect()->route('admin.auth.index')->with('error', 'Please login to access this page');
        } 
    }

}
