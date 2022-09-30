@extends('layout.master')

@section('titulo', 'Detalle de la moto ')

@section('contenido')
    <div class="flex flex-row justify-center w-full mt-16 mb-6 break-words shadow-lg rounded-xl"
        style="background-image: url({{ asset($bike->image) }});
                background-repeat: no-repeat;
                background-size: cover;
                :before:background-color: rgba(0,0,0,0.8);"
        >
        <div class="m-5 border shadow card">
            <div class="mx-4 -mt-6 card-header">
                <img class="w-auto rounded-lg" src="{{ asset($bike->image) }}"
                    alt="{{ $bike->marca }} {{ $bike->modelo }}" />
            </div>
            <div @class([
                'card-body',
                'bg-red-300/20' => !$bike->matriculada,
                'text-gray-500' => !$bike->matriculada,
            ])>
                <a href="#">
                    <h4 class="font-semibold">{{ $bike->marca }}</h4>
                    <h4 class="font-semibold">{{ $bike->modelo }}</h4>
                </a>
                <p class="mb-4 opcacity-60">
                    Kms: {{ $bike->kms }}
                </p>
                @if ($bike->matriculada)
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
    {{-- <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/colored-shadow.js"></script>
    <!-- from cdn -->
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/collapse.js"></script> --}}
@endsection
