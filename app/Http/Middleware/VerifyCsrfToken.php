<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = ['testMiddleware', 'testingMiddleware']; // creamos un array con las URI de las rutas excluidas de pasar por el VerifyCsrfToken
}
