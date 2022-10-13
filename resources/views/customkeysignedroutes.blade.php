@extends('layout.master')

@section('titulo', 'Instalación de Larabikes')

@section('contenido')
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2 class="text-xl font-bold">COMO CREAR UNA CUSTOM KEY PARA LAS RUTAS FIRMADAS</h2>
        </div>
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <p class="font-semibold text-large">Paso a paso</p>
        </div>
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <p class="">
                Para ver como Laravel genera las SignedRoutes creamos una vista firmada con el middleware('signed')
            </p>
        </div>
        <x-code>
                <p>
                    Route::get('generatecustomkey', function(){<br>
                    return Bike::all();<br>
                    })->name('generatecustomkey')->middleware('signed');<br>
                </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <p class="">
                En una vista, por ejemplo, Welcome, le pasamos una variable con el valor de la firma
                y para verla la imprimimos
            </p>
        </div>
        <x-code>
            <p>
                &lt;div&gt;<br>
                &lt;a href=" URL::signedRoute('generatecustomkey') "&gt;<br>
                URL::signedRoute('generatecustomkey') <br>
                &lt;/a&gt;<br>
                &lt;/div&gt;<br>
            </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <p class="">
                Podemos ver la firma de la ruta simplemente imprimiendo URL::signedRoute('generatecustomkey')
            </p>
        </div>
        <x-code>
            <p>
                {{ URL::signedRoute('generatecustomkey') }}
            </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <p class="">
                En el archivo .env tenemos el APP_KEY <span
                    class="italic underline">APP_KEY=base64:Z7YHTFTFCLxcgbYP0pBAaerXj4xjwOXunQdkCCd2w=</span>
                con el cual Laravel genera el hash para las rutas firmadas.
            </p>
            <p class="">
                Laravel usa la facade URL que usa la clase URLGenerator . En el método signedRoute() declara una variable
            </p>
        </div>
        <x-code>
            <p>
                Illuminate\Support\Facades\URL::setKeyResolver<br>
                    Set the encryption key resolver.<br>
                    public static function setKeyResolver($keyResolver) { }<br>
            </p>
        </x-code>
        <x-code>
            <p>
                $key = call_user_func($this->keyResolver);
            </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <p class="">
                Si la imprimimos vemos que clave ha generado
            </p>
        </div>
        <x-code>
            <p>
                $key = call_user_func($this->keyResolver);<br>
                dd($key)<br>
                Clave generada: base64:Z7YbCbAFbtCLxcgbYP0pBAaerXj4xjwOXunQdkCCd2w=<br>
            </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <p class="">
                Esa clave es la misma que el APP_KEY del .env
            </p>
        </div>
        <x-code>
            <p>
                APP_KEY=base64:Z7YbCbAFbtCLxcgbYP0pBAaerXj4xjwOXunQdkCCd2w=
            </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <p class="">
                La clase URLGenerator tiene un método setKeyResolver() que es público, por lo tanto podemos usarlo en
                cualquier parte de nuestro código
            </p>
        </div>
        <x-code>
            <p>
                /**<br>
                * Set the encryption key resolver.<br>
                *<br>
                * @param callable $keyResolver<br>
                * @return $this<br>
                */<br>
                public function setKeyResolver(callable $keyResolver)<br>
                {<br>
                $this->keyResolver = $keyResolver;<br>
                return $this;<br>
                }<br>
            </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <p class="">
                Si usamos ese método de la siguiente manera en el AppServiceProvider metodo boot()
            </p>
        </div>
        <x-code>
            <p>
                URL::setKeyResolver( fn()=> 'NuestraClavePersonalParaRutasFirmadas');
            </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <p class="">
                Podemos ver ahora en el metodo signedRoute() de URLGenerator::class el resultado
            </p>
        </div>
        <x-code>
            <p>
                $key = call_user_func($this->keyResolver);<br>
                dd($key);<br>
                Clave generada: NuestraClavePersonalParaRutasFirmadas<br>
            </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <p class="">
               Por lo tanto, podemos usar cualquier cadena de texto (dentro de un Callable que es lo que recibe setKeyResolver) y pasarsela a setKeyResolver para generar rutas firmadas personales
            </p>
            <p class="">
                Podemos, por ejemplo, generar una app key por medio de Artisan
            </p>
        </div>
        <x-code>
            <p>
                php artisan key:generate --show<br>
                base64:3y3j04d0uPsE6FzKU1l5KP85/K8KLW9IH0Kar9Uljk0=
            </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <p class="">
               Y guardar el valor en una nueva clave de nuestro .env
            </p>
        </div>
        <x-code>
            <p>
                APP_ROUTE_KEY = base64:3y3j04d0uPsE6FzKU1l5KP85/K8KLW9IH0Kar9Uljk0=
            </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <p class="">
               En config.app.php declaramos una variable que la lea del .env
            </p>
        </div>
        <x-code>
            <p>
                'route_key' => env('APP_ROUTE_KEY'),
            </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <p class="">
               En el AppServiceProvider le pasamos el valor de nuestra clave personalizada con el helper config()
            </p>
        </div>
        <x-code>
            <p>
                URL::setKeyResolver( fn()=> config('app.route_key'));
            </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <p class="">
               Ahora cada vez que usemos una ruta firmada Laravel usará nuestra APP_ROUTE_KEY en vez de la APP_KEY
            </p>
        </div>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <p class="">
              PD: las claves del ejemplo han sido refrescadas tras escribir este artículo
            </p>
        </div>
    </div>

@endsection
