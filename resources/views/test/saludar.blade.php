@extends('layout.test')

@section('titulo', 'Test de Larabikes')

@section('contenido')
    <x-testcomponent>
        Hola, {{ $nombre }}

        @if( isset($edad) )
        <br>
            Tienes {{ $edad }}
        @endif
    </x-testcomponent>
@endsection
