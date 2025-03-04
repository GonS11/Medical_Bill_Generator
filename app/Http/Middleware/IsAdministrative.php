<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdministrative
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ((Auth::user() && Auth::user()->role !== 'administrative') || !Auth::check()) {
            $request->session()->invalidate();
            $request->session()->flush();
            return redirect()->route('login')->withErrors(['message' => 'You do not have administrative privileges']);
        }

        return $next($request);
    }
}
