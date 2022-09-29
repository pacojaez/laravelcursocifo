@extends('layout.master')

@section('titulo', 'Instalación de Larabikes')

@section('contenido')
<div class="flex flex-col justify-center bg-white rounded-lg shadow dark:bg-gray-700">
    <div
        class="flex flex-col items-center p-5 border-b rounded-t dark:border-gray-600">
        <div class="flex flex-col">
            <h1 class="text-xl font-semibold text-gray-800 ">
                BORRADO DE LA MOTO ID: {{ $bike->id }}  {{ $bike->marca }}  {{ $bike->modelo }}
            </h1>
            <h2 class="text-xl font-light text-gray-600 ">
                Esta acción es irreversible...o no si usamos SOFTDELETES
            </h2>
        </div>
        <div class="flex flex-row justify-center w-1/4">
            <div class="mt-2 card-header" >
                <a href="{{ route( 'bike.show', [ 'bike' => $bike ])}}" blur-shadow-image="true">
                    <img class="rounded-lg"
                        src="{{ asset( $bike->image )}}"
                        alt="{{ $bike->marca}} {{ $bike->modelo }}" />
                </a>
            </div>
        </div>

    </div>

    <div class="p-2 space-y-2">
        <!-- ruta firmada-->
        {{-- <form class="mt-2" action="{{ URL::signedRoute ('bike.destroy', ['bike' => $bike]) }}" method="POST"> --}}
        <!-- ruta firmada durante un minuto -->
        <form class="mt-2" action="{{ URL::temporarySignedRoute('bike.destroy', now()->addSeconds(5), ['bike' => $bike]) }}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <div class="flex justify-center mt-6">
                <button type="submit"
                    class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-red-500 rounded-md dark:bg-red-600 dark:hover:bg-red-700 dark:focus:bg-red-700 hover:bg-red-600 focus:outline-none focus:bg-red-500 focus:ring focus:ring-red-300 focus:ring-opacity-50">
                    PULSA EL BOTÓN ROJO, VOLAMOS HACIA MOSCÚ
                </button>
            </div>
        </form>
    </div>

</div>

@endsection
