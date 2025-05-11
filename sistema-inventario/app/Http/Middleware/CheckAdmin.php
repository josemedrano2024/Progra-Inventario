<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->isAdmin()) {
            return $next($request);
        }

        return redirect('home')->with('error', 'No tienes permiso para acceder a esta página');
    }

    protected $routeMiddleware = [
    // ...
    'admin' => \App\Http\Middleware\CheckAdmin::class,
   ];

   
}