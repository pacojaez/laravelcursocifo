@extends('layout.master')

@section('titulo', 'Instalación de Larabikes')

@section('contenido')
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>URL Y REDIRECCIONES</h2>
        </div>
        <x-code>
            <a href="https://laravel.com/docs/9.x/helpers#main-content" target="_blank" rel="noopener noreferrer">
                <p>
                    https://laravel.com/docs/9.x/helpers#main-content
                </p>
            </a>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>USO DE LA FUNCION previous() DEL OBJETO URLGENERATOR</h2>
        </div>
        <x-code>
            <p> url()->previous(); </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>RUTAS FIRMADAS</h2>
        </div>
        <x-code>
            <p>  URL::signedRoute ('bike.destroy', ['bike' => $bike]) </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>SeEDING THE DATABASE</h2>
        </div>
        <x-code>
            public function run()<br>
            {<br>
            \App\Models\Bike::factory(200)->create();<br>

            }
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>CORRIENDO LAS MIGRACIONES</h2>
        </div>
        <x-code>
            php artisan migrate:fresh --seed
        </x-code>
    </div>

@endsection
