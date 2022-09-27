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
    <link
      href="https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css"
      rel="stylesheet"
    />
    <link
        href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet"
    />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous"/>
    <!-- Styles -->
    {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
    <script defer src="https://unpkg.com/alpinejs@3.8.1/dist/cdn.min.js"></script>
    {{-- @livewireStyles --}}
    <!-- Scripts -->
    {{-- <script src="{{ mix('js/app.js') }}" defer></script> --}}
</head>

<body class="bg-grey">
    @include ('components.navbar')
    @include ('components.toast')
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
</body>

</html>
