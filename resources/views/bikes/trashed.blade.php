@extends('layout.master')

@section('titulo', 'Todas las motos que has borrado de Larabikes')

@section('contenido')

    @if ($total >= 1)
        <div class="flex flex-row justify-center">
            <p>
                Has borrado {{ $total }} Motos
            </p>
        </div>
    @endif

    @if (isset($miperfil))
        <x-mi-perfil></x-mi-perfil>
    @endif
    <h2 class="text-2xl font-bold text-gray-700">MOTOS BORRADAS</h2>
    @if ($total >= 1)
        {{ $bikes->links() }}
        <div class="grid w-full grid-cols-1 gap-4 mt-16 mb-6 break-words shadow-lg rounded-xl md:grid-cols-4">

            @foreach ($bikes as $bike)
                <div class="m-5 border shadow card">
                    <div class="mx-4 -mt-6 card-header">
                        <a href="{{ route('bike.show', $bike->id) }}" blur-shadow-image="true">
                            <img class="w-auto rounded-lg hover:animate-pulse"
                                src="
                            @if ($bike->image != null) {{ asset('storage/' . config('filesystems.bikesImageDir') . '/' . $bike->image) }}
                            @else
                            {{ asset('img/components/noimage.png') }} @endif
                        "
                                alt="{{ $bike->marca . '-' . $bike->modelo }}" />
                            {{-- <img class="w-auto rounded-lg" src="{{ asset($bike->image) }}"
                            alt="{{ $bike->marca . '-' . $bike->modelo }}" /> --}}
                            {{-- {{ $bike->matriculada }} --}}

                        </a>
                    </div>
                    <div @class([
                        'card-body',
                        'bg-red-500/20' => !$bike->matriculada,
                        'text-gray-500' => !$bike->matriculada,
                    ])>

                        <h4 class="text-4xl font-bold">{{ $bike->marca }}</h4>
                        <h4 class="text-2xl font-semibold">{{ $bike->modelo }}</h4>

                        <p class="mb-1 text-xl opacity-60">
                            Kms: {{ $bike->kms }}
                        </p>
                        @if ($bike->matriculada)
                            <p class="mb-1 text-xl opacity-60">
                                Matricula: {{ $bike->matricula }}
                            </p>
                        @endif
                        <p class="mb-1 text-xl opacity-60">
                            Potencia: {{ $bike->caballos }} C.C.
                        </p>
                        <p class="mb-1 text-xl opacity-60">
                            Kms: {{ $bike->kms }}
                        </p>
                        @if (isset($bike->user->name))
                            <p class="mb-1 text-xl opacity-60">
                                DE: {{ $bike->user->name }}
                            </p>
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
                        <p class="mb-1 text-xl opacity-60">
                            Visitas: {{ $bike->visitas }}
                        </p>
                        <div class="flex flex-col justify-center align-middle">
                            {{-- @if (isset($bike->user->id) && $bike->user->id == Auth::id()) --}}
                            {{-- usando la dircetiva de blade can() --}}
                            @cannot('update', $bike)
                                <p class="self-center text-xs font-bold">Las motos solo las pueden editar sus propietarios </p>
                            @endcannot
                            @can('update', $bike)
                                <div class="flex justify-center mt-6">
                                    <a href="{{ route('restore.bike', ['id' => $bike->id]) }}">
                                        <p
                                            class="px-3 py-2 mt-6 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-green-500 rounded-md dark:bg-green-600 dark:hover:bg-green-700 dark:focus:bg-green-700 hover:bg-green-600 focus:outline-none focus:bg-green-500 focus:ring focus:ring-green-300 focus:ring-opacity-50">
                                            RESTAURAR MOTO
                                        </p>
                                    </a>
                                </div>
                                <form class="mt-2" action="{{ route('purge.bike', ['id' => $bike->id]) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="bike_id" value="{{ $bike->id }}">
                                    <div class="flex justify-center mt-6">
                                        <button type="submit"
                                            class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-red-500 rounded-md dark:bg-red-600 dark:hover:bg-red-700 dark:focus:bg-red-700 hover:bg-red-600 focus:outline-none focus:bg-red-500 focus:ring focus:ring-red-300 focus:ring-opacity-50">
                                            ELIMINAR PERMANENTEMENTE
                                        </button>
                                    </div>
                                </form>
                            @endcan
                            {{-- @endif --}}

                        </div>

                    </div>
                </div>
            @endforeach
        </div>
        {{ $bikes->links() }}
    @else
        <div class="flex flex-row justify-center">
            <h2> NO HAY MOTOS CON ESOS DATOS DE BÚSQUEDA</h2>

        </div>
    @endif
    {{-- <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/colored-shadow.js"></script>
    <!-- from cdn -->
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/collapse.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> --}}
@endsection
