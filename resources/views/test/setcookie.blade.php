@extends('layout.test')

@section('titulo', 'Test de Larabikes')

@section('contenido')
    <x-testcomponent>
        {{ $testcomponent }}
    </x-testcomponent>
@endsection
