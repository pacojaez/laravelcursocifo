@extends('layout.master')

@section('titulo', 'Instalación de Larabikes')

@section('contenido')
    <div class="flex flex-col w-full">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>LISTAR RUTAS</h2>
        </div>
        <x-code>
            <p> php artisan route:list </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>Routes Folders</h2>
        </div>
        <x-code>
            <p> api </p>
            <p> channels </p>
            <p> console </p>
            <p> web </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2> </h2>
        </div>
        <x-code>
            <p> app>>Providers>>RouteServiceProvider.php</p>
        </x-code>
    </div>
    <div class="flex flex-col w-full">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>El prefijo se puede modificar en el proveedor de servicios
                RouteServiceProvider.</h2>
        </div>
        <x-code>
           <p>
            $this->routes(function () {<br>
                Route::middleware('api')<br>
                    ->prefix('api')<br>
                    ->group(base_path('routes/api.php'));<br>
                Route::middleware('web')<br>
                    ->group(base_path('routes/web.php'));<br>
            });<br>
            </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>DESACTIVAR MIDDLEWARE app>>Http>>Middleware>>VerifyCsrfToken.php</h2>
            <p> modificando el array $except para desactivarla solamente para rutas concretas.</p>
        </div>
        <x-code>
            class VerifyCsrfToken extends Middleware<br>
            {<br>
                /**<br>
                 * The URIs that should be excluded from CSRF verification.<br>
                 *<br>
                 * @var array<int, string><br>
                 */<br>
                protected $except = [<br>
                    'testMiddleware'<br>
                ];<br>
            }<br>

        </x-code>
    </div>
    <div class="flex flex-col w-full">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>DESACTIVAR MIDDLEWARE app/Http/Kernel.php</h2>
            <p>  Editando el fichero app/Http/Kernel.php y comentando la línea en la que
                se indica que el grupo web debe usar este middleware.</p>
        </div>
        <x-code>
            /**<br>
            * The application's route middleware groups.<br>
            *<br>
            * @var array<string, array<int, class-string|string>><br>
            */<br>
            protected $middlewareGroups = [<br>
                'web' => [<br>
                    \App\Http\Middleware\EncryptCookies::class,<br>
                    \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,<br>
                    \Illuminate\Session\Middleware\StartSession::class,<br>
                    \Illuminate\View\Middleware\ShareErrorsFromSession::class,<br>
                    // \App\Http\Middleware\VerifyCsrfToken::class,<br>
                    \Illuminate\Routing\Middleware\SubstituteBindings::class,<br>
                ],
        </x-code>
    </div>
    <div class="flex flex-col w-full">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>Redirigir si no coincide la ruta con ninguna del fichero web.php</h2>
            <p>  Usando el método Route::fallback(), podemos indicar una ruta
                que será ejecutada cuando la petición no coincida con ninguna definida.

                Es importante colocar la ruta de fallback como la última del fichero de
                rutas..</p>
        </div>
        <x-code>
                Route::fallback([WelcomeController::class, 'index']);
        </x-code>
    </div>
    <div class="flex flex-col w-full">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>PROTECCIÓN CSRF</h2>
            <p>

            </p>
        </div>
        <x-code>
                @ csrf <br>
                csrf_field()
        </x-code>
    </div>
    <div class="flex flex-col w-full">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>OBJETO ROUTE</h2>
            <p>
                You may use the current, currentRouteName, and currentRouteAction methods on the Route facade to access information about the route handling the incoming request:
            </p>
            <a href="https://laravel.com/docs/9.x/routing#accessing-the-current-route" class="" target="blank">
                <p>
                    https://laravel.com/docs/9.x/routing#accessing-the-current-route
                </p>
            </a>
        </div>
        <x-code>
            use Illuminate\Support\Facades\Route;<br>
            $route = Route::current(); //retorna un objeto Route<br>
            <br>
            $name = Route::currentRouteName(); //’bikes.edit’<br>
            <br>
            $action = Route::currentRouteAction();<br>
            //’App\Http\Controllers\BikeController@edit‘<br>
        </x-code>
    </div>




@endsection
