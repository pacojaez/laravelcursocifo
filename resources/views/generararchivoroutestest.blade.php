@extends('layout.master')

@section('titulo', 'Instalación de Larabikes')

@section('contenido')
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2 class="text-xl font-bold">COMO GENERAR UN ARCHIVO DE RUTAS PARA PRUEBAS</h2>
        </div>
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <p class="font-semibold text-large">Paso a paso</p>
        </div>
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <p class="">
                Cuando inciamos un proyecto como este en Laravel el archivo de rutas web.php se vuelve bastante caótico
            </p>
        </div>
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <p class="">
                Para ordenar un poco las rutas podemos crear un archivo de test en la carpeta routes para meter en él todas las rutas que usemos para testear
            </p>
        </div>
        <x-code>
                <p>
                    routes >>> test.php
                </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <p class="">
                Copiamos el archivo web.php y lo renombramos a test.php
            </p>
        </div>
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <p class="">
                En App\Providers\RouteServiceProvider añadimos nuestro nuevo archivo al método boot()
            </p>
            <p class="">
                Que quedará de la siguiente manera
            </p>
        </div>
        <x-code>
            <p>
                public function boot()<br>
                {<br>
                    $this->configureRateLimiting();<br>
                    $this->routes(function () {<br>
                        <br>
                        Route::middleware('api')<br>
                            ->prefix('api')<br>
                            ->group(base_path('routes/api.php'));<br>
                        <br>
                        Route::middleware('web')<br>
                            ->group(base_path('routes/web.php'));<br>
                        <br>
                        //crear un archivo para rutas de test<br>
                        Route::middleware('web')<br>
                            ->prefix('test')<br>
                            ->group(base_path('routes/test.php'));<br>
                    });<br>
                }<br>
            </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <p class="">
                Pasamos todas las rutas que usamos para testear a ese nuevo archivo, por ejemplo:
            </p>
        </div>
        <x-code>
            <p>
                Route::get('/testMiddleware', function(){<br>
                    return 'Petición por GET';<br>
                })->name('testMiddleware');<br>
            </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <p class="">
                Todas la rutas que usemos para test tendrán el prefijo test
            </p>
        </div>
        <x-code>
            <p>
                127.0.0.1:8000/test/testMiddleware<br>

            </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <p class="">
                Al ponerle un alias las podemos llamar en cualquier parte de nuestra app con route('testMiddleware')
                que nos genera la URL con el prefijo
            </p>
        </div>
        <x-code>
            <p>

                    &lt;a class="nav-link" href="{{ route('testMiddleware')}}"&gt;<br>
                    &lt;i class="mr-2 text-base material-icons opacity-60"&lt;/i&gt;<br>
                    &lt;span class=""&gt;TEST MIDDLEWAREl&lt;/span&gt;<br>
                    &lt;/a&gt;<br>

            </p>
        </x-code>
    </div>
@endsection
