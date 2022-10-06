@extends('layout.master')

@section('titulo', 'Instalación de Larabikes')

@section('contenido')
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2 class="text-xl font-bold">VALIDACIÓN EN LARAVEL</h2>
            <br>
            <a href="https://laravel.com/docs/9.x/validation" target="blank" class="">
            https://laravel.com/docs/9.x/validation
            </a>
        </div>
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <p class="font-semibold text-large">Paso a paso</p>
        </div>
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <p class="">
                El proceso evalúa si la información de entrada
                tiene el formato correcto.
                Toda la información debe ser supervisada antes
                de ser almacenada en un sistema de
                almacenamiento estable (BDD, fichero...).
            </p>
        </div>
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <p class="">
                Validación mediante reglas
            </p>
        </div>
        <x-code>
            <p>
                $request->validate([‘campo’=>’reglas’]);
            </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <p class="">
                Cambiar el lang de los mensajes de error
            </p>
            <p class="">
                El fichero que debemos editar se encuentra en
                resources/lang/xx/validation.php, donde xx es el código de idioma
                (en, es, ca...).
            </p>
        </div>
        <x-code>
            <p>
                resources/lang/xx/validation.php
            </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <p class="">
                A set of useful Laravel validation rules
            </p>
        </div>
        <x-code>
            <p>
                <a href="https://github.com/spatie/laravel-validation-rules" target="blank">https://github.com/spatie/laravel-validation-rules</a>
            </p>
        </x-code>
    </div>

    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <p class="">
                PAQUETE DE INSTALACIÓN DE TRADUCCIONES LANG
            </p>
        </div>
        <x-code>
            <p>
                <a href="https://publisher.laravel-lang.com/" target="blank">https://publisher.laravel-lang.com/</a>
                <a href="https://laravel-lang.com/installation/" target="blank">https://laravel-lang.com/installation/</a>

            </p>
        </x-code>
    </div>
@endsection
