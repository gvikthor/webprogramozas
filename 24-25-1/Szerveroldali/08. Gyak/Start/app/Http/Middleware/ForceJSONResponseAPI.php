<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForceJSONResponseAPI
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Ellenőrizzük, hogy a meghívott végpont api végpont-e, és az Accept mező beállításra került-e.
        if ($request->is('api/*') && !$request->headers->contains('Accept', 'application/json')) {
            $request->headers->set('Accept', 'application/json');
        }
        return $next($request);
    }
}