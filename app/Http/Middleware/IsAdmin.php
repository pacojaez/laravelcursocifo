<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // if (auth()->check() && auth()->user()->is_admin)
        // return $next($request);

        return view('errors.403');
    }
}
