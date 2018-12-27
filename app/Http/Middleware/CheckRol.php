<?php

namespace App\Http\Middleware;

use Closure;

class CheckRol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $rol)
    {
        if (!$request->user()->hasRole($rol)) {
            abort(403, "No tienes autorización para ingresar.");
        }

        return $next($request);
    }
}
