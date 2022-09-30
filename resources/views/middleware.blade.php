@extends('layout.master')

@section('titulo', 'Uso de Middleware en Laravel')

@section('contenido')
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>Filtrado de peticiones mediante MIDDLEWARE</h2>
        </div>
        <x-code>
            <p> php artisan route:list </p>
        </x-code>
    </div>
@endsection
