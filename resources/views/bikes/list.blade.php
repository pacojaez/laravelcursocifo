<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'LaraBikes') }}</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Styles -->
    {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
    <script defer src="https://unpkg.com/alpinejs@3.8.1/dist/cdn.min.js"></script>

    <link href="https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" />
</head>

<body class="bg-grey">
    @include ('components.navbar')
    @includeWhen( Session::has('success'), 'components.toast')
    {{-- @include ('components.toast') --}}
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
                    {{-- <a href="{{route( 'bike.show' , ['bike' => $bike ])}}">
                        <button class="p-2 rounded button bg-sky-500/100 hover:bg-sky-500/50" data-ripple-light="true">
                            Read More
                        </button>
                    </a> --}}
                    <a href="{{ route('bike.show', ['bike' => $bike]) }}">
                        <img class="p-2 rounded button bg-sky-500/100 hover:bg-sky-500/50"
                            width="50px"src="{{ asset('img/components/show.png') }}" alt="show bike">
                    </a>
                    <a href="{{ route('bike.edit', ['bike' => $bike]) }}">
                        <img class="p-2 rounded button bg-sky-500/100 hover:bg-sky-500/50"
                            width="50px"src="{{ asset('img/components/edit.png') }}" alt="show bike">
                    </a>
                    {{-- modal de borrado de moto --}}
                    <div x-data="{ modelOpen: false }">
                        <button @click="modelOpen =!modelOpen" class="flex items-center justify-center px-3 py-2 space-x-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-red-500 rounded-md dark:bg-red-600 dark:hover:bg-red-700 dark:focus:bg-red-700 hover:bg-red-600 focus:outline-none focus:bg-red-500 focus:ring focus:ring-red-300 focus:ring-opacity-50">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="white">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            <span>BORRAR MOTO</span>
                        </button>

                        <div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                            <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                                <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                                    x-transition:enter="transition ease-out duration-300 transform"
                                    x-transition:enter-start="opacity-0"
                                    x-transition:enter-end="opacity-100"
                                    x-transition:leave="transition ease-in duration-200 transform"
                                    x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0"
                                    class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"
                                ></div>

                                <div x-cloak x-show="modelOpen"
                                    x-transition:enter="transition ease-out duration-300 transform"
                                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                    x-transition:leave="transition ease-in duration-200 transform"
                                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                    class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl"
                                >
                                    <div class="flex items-center justify-between space-x-4">
                                        <h1 class="text-xl font-medium text-gray-800 ">BORRADO DEFINITIVO DE LA MOTO iD: {{ $bike->id }} {{ $bike->marca }} {{ $bike->modelo }}</h1>

                                        <button @click="modelOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </button>
                                    </div>

                                    <p class="mt-2 text-sm text-gray-500 ">
                                        Esta acción es irreversible, ¿estás seguro?
                                    </p>

                                    <form class="mt-5" action={{ route('bike.destroy', ['bike' => $bike ])}} method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <div class="flex justify-end mt-6">
                                            <button type="submit" class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-red-500 rounded-md dark:bg-red-600 dark:hover:bg-red-700 dark:focus:bg-red-700 hover:bg-red-600 focus:outline-none focus:bg-red-500 focus:ring focus:ring-red-300 focus:ring-opacity-50">
                                                PULSA EL BOTÓN ROJO, VOLAMOS HACIA MOSCÚ
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end borrar moto modal --}}
                    {{-- <button id="card_open"
                        class="block px-8 py-8 bg-green-400 border-gray-500 rounded-md hover:bg-green-300 text-blue-50 hover:text-white">Open
                        a modal</button>
                    <form method="POST" action="{{ route('bike.destroy', ['bike' => $bike]) }}">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        {{-- <button type="submit">
                            <img class="p-2 rounded button bg-sky-500/100 hover:bg-sky-500/50" width="50px"src="{{ asset('img/components/delete.png') }}" alt="show bike">
                        </button>
                    </form> --}}


                </div>
            </div>
        @endforeach
    </div>
    {{ $bikes->links() }}
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/colored-shadow.js"></script>
    <!-- from cdn -->
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/collapse.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</body>

</html>
