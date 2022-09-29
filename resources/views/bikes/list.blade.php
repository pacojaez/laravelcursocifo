@extends('layout.master')

@section('titulo', 'Todas las motos de Larabikes')

@section('contenido')
    {{-- formulario de busqueda --}}

    @if ($total >= 1)
        <div class="flex flex-row justify-center">
            <p>Hay {{ $total }} Motos</p>
        </div>
    @endif

    @if( $total >= 1 )
    {{ $bikes->links() }}
    <div class="grid w-full grid-cols-1 gap-4 mt-16 mb-6 break-words shadow-lg rounded-xl md:grid-cols-4">
        @foreach ($bikes as $bike)
            <div class="m-5 border shadow card">
                <div class="mx-4 -mt-6 card-header">
                    <a href="{{ route('bike.show', $bike->id) }}" blur-shadow-image="true">
                        <img class="w-auto rounded-lg" src="{{ asset($bike->image) }}"
                            alt="{{ $bike->marca . '-' . $bike->modelo }}" />
                        {{-- {{ $bike->matriculada }} --}}

                    </a>
                </div>
                <div @class([
                    'card-body',
                    'bg-red-500/20' => !$bike->matriculada,
                    'text-gray-500' => !$bike->matriculada,
                ])>

                    <h4 class="font-semibold">{{ $bike->marca }}</h4>
                    <h4 class="font-semibold">{{ $bike->modelo }}</h4>

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
                    <a href="{{ route('bike.show', ['bike' => $bike]) }}">
                        <img class="p-2 rounded button bg-sky-500/100 hover:bg-sky-500/50"
                            width="50px"src="{{ asset('img/components/show.png') }}" alt="show bike">
                    </a>
                    <a href="{{ route('bike.edit', ['bike' => $bike]) }}">
                        <img class="p-2 rounded button bg-sky-500/100 hover:bg-sky-500/50"
                            width="50px"src="{{ asset('img/components/edit.png') }}" alt="show bike">
                    </a>
                    <a href="{{ route('bike.delete', ['bike' => $bike]) }}">
                        <img class="p-2 rounded button bg-sky-500/100 hover:bg-sky-500/50"
                            width="50px"src="{{ asset('img/components/delete.png') }}" alt="show bike">
                    </a>
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
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/colored-shadow.js"></script>
    <!-- from cdn -->
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/collapse.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script></script>
@endsection
