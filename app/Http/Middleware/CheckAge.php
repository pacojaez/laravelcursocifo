<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAge
{
    public function handle(Request $request, Closure $next)
    {

        if($request->query('edad') < 18 ){
            abort(403, 'Acceso denegado, debes ser mayor de edad');
        }

        return $next($request);
    }
}
