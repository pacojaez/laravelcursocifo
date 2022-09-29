<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class FireFoxRules
{
    public function handle(Request $request, Closure $next)
    {
        if(!str_contains($request->header('user-agent'), 'Firefox'))
            abort(403, 'No estas usando Firefox');

        return $next($request);
    }
}
