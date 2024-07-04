<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated and has the 'admin' level
        if (Auth::check() && Auth::user()->role == 'admin') {
            return $next($request);
        }

        // If not an admin, abort with a 404 or redirect to another page
        return abort(404); // Or you can use redirect()->route('home') if you prefer
    }
}
