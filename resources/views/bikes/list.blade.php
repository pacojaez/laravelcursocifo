@extends('layout.master')

@section('titulo', 'Todas las motos de Larabikes')

@section('contenido')
    {{-- formulario de busqueda --}}

    @if ($total >= 1)
        <div class="flex flex-row justify-center">
            <p>
                Hay {{ $total }} Motos
                @isset($marca)
                    de la marca <span class="font-bold underline ">{{ $marca }}</span>
                @endisset
                @isset($modelo)
                    y el modelo <span class="font-bold underline ">{{ $modelo }}</span>
                @endisset
            </p>
        </div>
    @endif

    @if ( isset($miperfil) )
        <x-mi-perfil></x-mi-perfil>
    @endif

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

                        <p class="mb-1 text-xl opcacity-60">
                            Kms: {{ $bike->kms }}
                        </p>
                        @if ($bike->matriculada)
                            <p class="mb-1 text-xl opcacity-60">
                                Matricula: {{ $bike->matricula }}
                            </p>
                        @endif
                        <p class="mb-1 text-xl opcacity-60">
                            Potencia: {{ $bike->caballos }} C.C.
                        </p>
                        <p class="mb-1 text-xl opcacity-60">
                            Kms: {{ $bike->kms }}
                        </p>
                        @if (isset($bike->user->name))
                            <p class="mb-1 text-xl opcacity-60">
                                DE: {{ $bike->user->name }}
                            </p>
                        @endif
                        <div class="flex flex-row justify-center align-middle">
                            <a href="{{ route('bike.show', ['bike' => $bike]) }}">
                                <img class="p-2 m-2 rounded button bg-sky-500/100 hover:bg-sky-500/50"
                                    width="40px"src="{{ asset('img/components/show.png') }}" alt="show bike">
                            </a>
                            {{-- @if ( isset($bike->user->id) && $bike->user->id  == Auth::id() ) --}}
                            {{-- usando la dircetiva de blade can()--}}
                            @cannot('update',$bike)
                            <p class="self-center text-xs font-bold">Las motos solo las pueden editar sus propietarios </p>
                            @endcannot
                            @can('update',$bike)
                                <a href="{{ route('bike.edit', ['bike' => $bike]) }}">
                                    <img class="p-2 m-2 rounded button bg-sky-500/100 hover:bg-sky-500/50"
                                        width="40px"src="{{ asset('img/components/edit.png') }}" alt="show bike">
                                </a>
                                <a href="{{ route('bike.delete', ['bike' => $bike]) }}">
                                    <img class="p-2 m-2 rounded button bg-sky-500/100 hover:bg-sky-500/50"
                                        width="40px"src="{{ asset('img/components/delete.png') }}" alt="show bike">
                                </a>
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
