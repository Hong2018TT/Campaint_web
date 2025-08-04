<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ManagerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->role === 'Manager') {
                return $next($request);
            }

            // Different user type - logout and redirect
            Auth::logout();
            return redirect()->route('admin.auth.index')->with('error', 'Access Denied');
        }else{
            // Unauthenticated user - logout and redirect
            Auth::logout();
            return redirect()->route('admin.auth.index')->with('error', 'Please login to access this page');
        } 
    }
}
