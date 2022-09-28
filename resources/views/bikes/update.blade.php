@extends('layout.master')

@section('titulo', 'Actualizacion de moto de Larabikes')

@section('contenido')
    <form method='POST' action="{{ route('bike.update', $bike->id) }}" enctype="multipart/form-data">
        {{-- @csrf --}}
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="flex flex-col px-8 pt-6 pb-8 my-2 mb-4 bg-white rounded shadow-md">
            <div class="mb-6 -mx-3 md:flex">
                <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                    <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="marca">
                        MARCA
                    </label>
                    <input
                        class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-red"
                        id="marca" type="text" placeholder="una marca válida" name='marca'
                        value="{{ $bike->marca }}">
                    <p class="text-xs italic text-red">Este campo es obligatorio.</p>
                </div>
                <div class="px-3 md:w-1/2">
                    <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="modelo">
                        MODELO
                    </label>
                    <input
                        class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                        id="modelo" type="text" placeholder="Un modelo válido" name='modelo'
                        value="{{ $bike->modelo }}">
                </div>
            </div>
            <div class="mb-2 -mx-3 md:flex">
                <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                    <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="kms">
                        Kilometraje
                    </label>
                    <input
                        class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                        id="kms" type="text" placeholder="KMS actuales de la moto" name="kms"
                        value="{{ $bike->kms }}">
                </div>
                <div class="px-3 md:w-1/2">
                    <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker"
                        for="grid-state">
                        POTENCIA
                    </label>
                    <input
                        class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                        id="caballos" type="text" placeholder="Potencia de la moto actuales de la moto"
                        name="caballos" value="{{ $bike->caballos }}">
                </div>
                <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                    <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="kms">
                        COLOR
                    </label>
                    <input
                        class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                        id="color" type="text" placeholder="Color" name="color" value="{{ $bike->color }}">
                </div>
                <div class="px-3 md:w-1/2">
                    <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker"
                        for="grid-state">
                        MATRÍCULA
                    </label>
                    <input
                        class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                        id="matricula" type="text" placeholder="" name="matricula" value="{{ $bike->matricula }}">
                </div>
                <div class="px-3 md:w-1/2">
                    <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker"
                        for="grid-state">
                        PRECIO
                    </label>
                    <input
                        class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                        id="precio" type="text" placeholder="" name="precio" value="{{ $bike->precio }}">
                </div>
                <div class="px-3 md:w-1/2">
                    <h2>IMAGEN GUARDADA </h2>
                    <img src="{{ asset($bike->image) }}" alt="{{ $bike->marca }} {{ $bike->modelo }}">
                </div>
                <div class="px-3 md:w-1/2">
                    <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker"
                        for="grid-state">
                        IMAGEN
                    </label>
                    <input type="file" name="image" id="inputFile"
                        class="form-control @error('file') is-invalid @enderror">
                    {{-- <input
                        class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                        id="image" type="file" accept="image/jpg, image/png, image/jpeg"
                        name="image" > --}}
                </div>
            </div>
        </div>
        <div class="flex flex-row justify-center">
            <button type="submit"
                class="inline-flex items-center justify-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg hover:bg-indigo-800">
                ACTUALIZAR MOTO
            </button>

        </div>
    </form>
    <div class="flex flex-row justify-center">
    <a href="{{ route('bike.destroy', ['bike' => $bike ])  }}" class="">
    {{-- <a href='{{ url("/bike/destroy/$bike ")  }}" class=""> --}}
        <button
            class="inline-flex items-center justify-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg hover:bg-indigo-800">
            BORRAR MOTO
        </button>
    </a>
    </div>
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/colored-shadow.js"></script>
    <!-- from cdn -->
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/collapse.js"></script>
@endsection
