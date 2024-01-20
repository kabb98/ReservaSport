<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        if(! $request->user()->isAdmin()){
            abort(403, "No tienes permisos para acceder al contenido. Solo disponible para usuarios administradores.");
        }
        return $next($request);
    }
}
