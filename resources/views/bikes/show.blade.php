@extends('layout.master')

@section('titulo', 'Instalación de Larabikes')

@section('contenido')
    <div
        class="grid w-full grid-cols-1 gap-4 mt-16 mb-6 break-words shadow-lg rounded-xl">
            <div class="m-5 border shadow card">
                <div class="mx-4 -mt-6 card-header" >
                    <a href="https://www.material-tailwind.com" blur-shadow-image="true">
                        <img class="w-auto rounded-lg"
                            src="{{ asset( $bike->image )}}"
                            alt="tailwind-card-image" />
                        {{-- {{ $bike->matriculada }} --}}
                    </a>
                </div>
                <div @class([
                    'card-body',
                    'bg-red-300/20' => ! $bike->matriculada,
                    'text-gray-500' => ! $bike->matriculada,
                ])>
                    <a href="#">
                        <h4 class="font-semibold">{{ $bike->marca }}</h4>
                        <h4 class="font-semibold">{{ $bike->modelo }}</h4>
                    </a>
                    <p class="mb-4 opcacity-60">
                        Kms: {{ $bike->kms }}
                    </p>
                    @if($bike->matriculada)
                    <p class="mb-4 opcacity-60">
                        Matricula: {{ $bike->matricula }}
                    </p>
                    @endif
                    <p class="mb-4 opcacity-60">
                        Potencia: {{ $bike->caballos }} C.C.
                    </p>
                    <p class="mb-4 opcacity-60">
                        Kms: {{ $bike->kms }}
                    </p>
                </div>
            </div>
    </div>
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/colored-shadow.js"></script>
    <!-- from cdn -->
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/collapse.js"></script>
@endsection
