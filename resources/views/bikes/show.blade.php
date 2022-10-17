@extends('layout.master')

@section('titulo', 'Detalle de la moto ')

@section('contenido')
    <div class="flex flex-row justify-center w-full mt-16 mb-6 break-words shadow-lg rounded-xl"
        style="background-image: url({{ asset('storage/' . config('filesystems.bikesImageDir') . '/' . $bike->image) }});
                background-repeat: no-repeat;
                background-size: cover;
                :before:background-color: rgba(0,0,0,0.8);">
        <div class="m-5 border shadow card">
            <div class="flex flex-row justify-center mx-4 -mt-6 card-header">
                <img class="w-full rounded-lg hover:animate-pulse"
                    src="
                        @if ($bike->image !== null) {{ asset('storage/' . config('filesystems.bikesImageDir') . '/' . $bike->image) }}
                        @else
                            {{ asset('img/components/noimage.png') }} @endif
                    "
                    alt="{{ $bike->marca }} {{ $bike->modelo }}" />
            </div>
            <div @class([
                'flex',
                'flex-col',
                'p-5',
                'items-center',
                'bg-red-300/20' => !$bike->matriculada,
                'text-gray-500' => !$bike->matriculada,
            ])>

                <h4 class="text-6xl font-semibold">{{ $bike->marca }}</h4>
                <h4 class="text-4xl font-semibold">{{ $bike->modelo }}</h4>

                <p class="mb-2 text-2xl opcacity-60">
                    Kms: {{ $bike->kms }}
                </p>
                @if ($bike->matriculada)
                    <p class="mb-2 text-2xl opcacity-60">
                        Matricula: {{ $bike->matricula }}
                    </p>
                @endif
                <p class="mb-2 text-2xl opcacity-60">
                    Potencia: {{ $bike->caballos }} C.C.
                </p>
            </div>
        </div>
    </div>
    @if (isset($bike->user->name))
        <div class="p-2 m-2 border shadow card">
            <p class="mb-1 text-xl opacity-60">
                DE: {{ $bike->user->name }}
            </p>
        </div>
    @endif
    @if (isset($bike->concesionario->name))
        <div class="p-2 m-2 border shadow card">
            <p class="mb-1 text-xl font-bold opacity-80">
                CONCESIONARIO: {{ $bike->concesionario->name }}
            </p>
            <p class="mb-1 text-large opacity-60">
                {{ $bike->concesionario->adress }}
            </p>
            <p class="mb-1 text-large opacity-60">
                {{ $bike->concesionario->city }}
            </p>
            <p class="mb-1 text-large opacity-60">
                {{ $bike->concesionario->state }}
            </p>
        </div>
    @endif
    @if ($bike->user() === auth()->user())
        <div class="flex flex-row justify-center w-full p-2 m-2">
            <a href="{{ route('bike.edit', ['bike' => $bike]) }}" class="mx-4">
                <img class="p-2 rounded button bg-orange-500/100 hover:bg-orange-500/50"
                    width="50px"src="{{ asset('img/components/edit.png') }}" alt="show bike">
            </a>
            <a href="{{ route('bike.delete', ['bike' => $bike]) }}" class="mx-4">
                <img class="p-2 rounded button bg-red-500/100 hover:bg-red-500/50"
                    width="50px"src="{{ asset('img/components/delete.png') }}" alt="show bike">
            </a>
        </div>
    @endif
@endsection
