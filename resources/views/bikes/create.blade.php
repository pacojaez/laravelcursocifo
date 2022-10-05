@extends('layout.master')

@section('titulo', 'Creacion de una nueva moto de Larabikes')

@section('contenido')
    <form method='POST' action="{{ route('bike.store') }}" enctype="multipart/form-data">
        {{-- @csrf --}}
        {{ csrf_field() }}
        <div class="flex flex-col px-8 pt-6 pb-8 my-2 mb-4 bg-white rounded shadow-md">
            <div class="mb-6 -mx-3 md:flex">
                <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                    <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="marca">
                        MARCA
                    </label>
                    <input
                        class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-red"
                        id="marca" type="text" placeholder="una marca válida" name='marca' value="{{ old('marca')}}">
                    <p class="text-xs italic text-red">Este campo es obligatorio.</p>
                </div>
                <div class="px-3 md:w-1/2">
                    <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="modelo">
                        MODELO
                    </label>
                    <input
                        class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                        id="modelo" type="text" placeholder="Un modelo válido" name='modelo' value="{{ old('modelo')}}">
                </div>
            </div>
            <div class="mb-2 -mx-3 md:flex">
                <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                    <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="kms">
                        Kilometraje
                    </label>
                    <input
                        class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                        id="kms" type="text" placeholder="KMS actuales de la moto" name="kms" value="{{ old('kms')}}">
                </div>
                <div class="px-3 md:w-1/2">
                    <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker"
                        for="grid-state">
                        POTENCIA
                    </label>
                    <input
                        class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                        id="caballos" type="text" placeholder="Potencia de la moto actuales de la moto"
                        name="caballos" value="{{ old('caballos')}}">
                </div>
                <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                    <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="kms">
                        COLOR
                    </label>
                    <input
                        class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                        id="color" type="text" placeholder="Color" name="color" value="{{ old('color')}}">
                </div>
                <div class="px-3 md:w-1/2">
                    <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker"
                        for="matriculada">
                        ¿MATRÍCULADA?
                    </label>
                    <input id="matriculada" name="matriculada" aria-describedby="matriculada" type="checkbox" value="1"
                            {{ empty(old('matriculada')) ? "" : "checked" }}
                                class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300">
                    <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker"
                        for="grid-state">
                        MATRÍCULA
                    </label>
                    <input
                        class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                        id="matricula" type="text" placeholder=""
                        name="matricula" value="{{ old('matricula')}}">
                </div>
                <div class="px-3 md:w-1/2">
                    <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker"
                        for="grid-state">
                        PRECIO
                    </label>
                    <input
                        class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                        id="precio" type="text" placeholder=""
                        name="precio" value="{{ old('precio')}}">
                </div>
                <div class="px-3 md:w-1/2">
                    <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker"
                        for="grid-state">
                        IMAGEN
                    </label>
                    <input
                    type="file"
                    name="image"
                    id="inputFile"
                    class="form-control @error('file') is-invalid @enderror">
                    {{-- <input
                        class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                        id="image" type="file" accept="image/jpg, image/png, image/jpeg"
                        name="image" > --}}
                </div>
            </div>
        </div>
        <div class="flex flex-row justify-center">
            <button type="submit" class="inline-flex items-center justify-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg hover:bg-indigo-800">
                CREAR MOTO
            </button>
        </div>
    </form>
    <script>
        matricula.disabled = !matriculada.checked;
        matriculada.onchange = function(){
            matricula.disabled = !matriculada.checked;

        }
    </script>
@endsection
