<!DOCTYPE html>
<html lang="es">

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
    {{-- <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" /> --}}
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animationsvg.css') }}">
    <link href="https://tailwindcomponents.com/css/component.nature.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    <link
        href="https://fonts.googleapis.com/css?family=Abhaya+Libre:400,800|Montserrat:600|Alegreya+Sans:500&display=swap"
        rel="stylesheet" />

    <!-- Scripts -->

    <script defer src="{{ mix('js/app.js') }}"></script>
    <script defer src="{{ mix('js/todosFilter.js') }}" defer></script>

    <script type="module">
        import hotwiredTurbo from 'https://cdn.skypack.dev/@hotwired/turbo';
    </script>

    <!-- ANIME -->
    <script src="{{ asset('js/anime.min.js') }}" defer></script>
    <!-- Alpine v3 -->
    {{-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
    {{-- <script src="https://unpkg.com/alpinejs" defer></script> --}}
    {{-- <script defer src="https://unpkg.com/alpinejs@3.8.1/dist/cdn.min.js"></script> --}}

</head>

<body class="overflow-x-hidden">
    @include('components.navbar')
    @includeWhen(Session::has('success'), 'layout.success')
    @includeWhen($errors->any(), 'layout.error')
    <main class="flex flex-col items-center justify-center mt-32">
        <x-alert />

        @yield('contenido')

    </main>
        <!-- Footer -->
        <footer class="w-full pt-10 bg-gray-800 sm:mt-10">
            <div class="flex flex-wrap max-w-6xl m-auto text-gray-800 justify-left">
                <!-- Col-1 -->
                <div class="w-1/2 p-5 sm:w-4/12 md:w-3/12">
                    <!-- Col Title -->
                    <div class="mb-6 text-xs font-medium text-gray-400 uppercase">
                        Getting Started
                    </div>

                    <!-- Links -->
                    <a href="#" class="block my-3 text-sm font-medium text-gray-300 duration-700 hover:text-gray-100">
                        Installation
                    </a>
                    <a href="#" class="block my-3 text-sm font-medium text-gray-300 duration-700 hover:text-gray-100">
                        Release Notes
                    </a>
                    <a href="#" class="block my-3 text-sm font-medium text-gray-300 duration-700 hover:text-gray-100">
                        Upgrade Guide
                    </a>
                    <a href="#" class="block my-3 text-sm font-medium text-gray-300 duration-700 hover:text-gray-100">
                        Using with Preprocessors
                    </a>
                    <a href="#" class="block my-3 text-sm font-medium text-gray-300 duration-700 hover:text-gray-100">
                        Optimizing for Production
                    </a>
                    <a href="#" class="block my-3 text-sm font-medium text-gray-300 duration-700 hover:text-gray-100">
                        Browser Support
                    </a>
                    <a href="#" class="block my-3 text-sm font-medium text-gray-300 duration-700 hover:text-gray-100">
                        IntelliSense
                    </a>
                </div>

                <!-- Col-2 -->
                <div class="w-1/2 p-5 sm:w-4/12 md:w-3/12">
                    <!-- Col Title -->
                    <div class="mb-6 text-xs font-medium text-gray-400 uppercase">
                        Core Concepts
                    </div>

                    <!-- Links -->
                    <a href="#" class="block my-3 text-sm font-medium text-gray-300 duration-700 hover:text-gray-100">
                        Utility-First
                    </a>
                    <a href="#" class="block my-3 text-sm font-medium text-gray-300 duration-700 hover:text-gray-100">
                        Responsive Design
                    </a>
                    <a href="#" class="block my-3 text-sm font-medium text-gray-300 duration-700 hover:text-gray-100">
                        Hover, Focus, & Other States
                    </a>
                    <a href="#" class="block my-3 text-sm font-medium text-gray-300 duration-700 hover:text-gray-100">
                        Dark Mode
                    </a>
                    <a href="#" class="block my-3 text-sm font-medium text-gray-300 duration-700 hover:text-gray-100">
                        Adding Base Styles
                    </a>
                    <a href="#" class="block my-3 text-sm font-medium text-gray-300 duration-700 hover:text-gray-100">
                        Extracting Components
                    </a>
                    <a href="#" class="block my-3 text-sm font-medium text-gray-300 duration-700 hover:text-gray-100">
                        Adding New Utilities
                    </a>
                </div>

                <!-- Col-3 -->
                <div class="w-1/2 p-5 sm:w-4/12 md:w-3/12">
                    <!-- Col Title -->
                    <div class="mb-6 text-xs font-medium text-gray-400 uppercase">
                        Customization
                    </div>

                    <!-- Links -->
                    <a href="#" class="block my-3 text-sm font-medium text-gray-300 duration-700 hover:text-gray-100">
                        Configuration
                    </a>
                    <a href="#" class="block my-3 text-sm font-medium text-gray-300 duration-700 hover:text-gray-100">
                        Theme Configuration
                    </a>
                    <a href="#" class="block my-3 text-sm font-medium text-gray-300 duration-700 hover:text-gray-100">
                        Breakpoints
                    </a>
                    <a href="#" class="block my-3 text-sm font-medium text-gray-300 duration-700 hover:text-gray-100">
                        Customizing Colors
                    </a>
                    <a href="#" class="block my-3 text-sm font-medium text-gray-300 duration-700 hover:text-gray-100">
                        Customizing Spacing
                    </a>
                    <a href="#" class="block my-3 text-sm font-medium text-gray-300 duration-700 hover:text-gray-100">
                        Configuring Variants
                    </a>
                    <a href="#" class="block my-3 text-sm font-medium text-gray-300 duration-700 hover:text-gray-100">
                        Plugins
                    </a>
                </div>

                <!-- Col-3 -->
                <div class="w-1/2 p-5 sm:w-4/12 md:w-3/12">
                    <!-- Col Title -->
                    <div class="mb-6 text-xs font-medium text-gray-400 uppercase">
                        Community
                    </div>

                    <!-- Links -->
                    <a href="#" class="block my-3 text-sm font-medium text-gray-300 duration-700 hover:text-gray-100">
                        GitHub
                    </a>
                    <a href="#" class="block my-3 text-sm font-medium text-gray-300 duration-700 hover:text-gray-100">
                        Discord
                    </a>
                    <a href="#" class="block my-3 text-sm font-medium text-gray-300 duration-700 hover:text-gray-100">
                        Twitter
                    </a>
                    <a href="#" class="block my-3 text-sm font-medium text-gray-300 duration-700 hover:text-gray-100">
                        YouTube
                    </a>
                </div>
            </div>

            <!-- Copyright Bar -->
            <div class="pt-2">
                <div
                    class="flex flex-col max-w-6xl px-3 pt-5 pb-5 m-auto text-sm text-gray-400 border-t border-gray-500 md:flex-row">
                    <div class="mt-2">© Copyright 1998-year. All Rights Reserved.</div>

                    <!-- Required Unicons (if you want) -->
                    <div class="flex flex-row mt-2 md:flex-auto md:flex-row-reverse">
                        <a href="#" class="w-6 mx-1">
                            <i class="uil uil-facebook-f"></i>
                        </a>
                        <a href="#" class="w-6 mx-1">
                            <i class="uil uil-twitter-alt"></i>
                        </a>
                        <a href="#" class="w-6 mx-1">
                            <i class="uil uil-youtube"></i>
                        </a>
                        <a href="#" class="w-6 mx-1">
                            <i class="uil uil-linkedin"></i>
                        </a>
                        <a href="#" class="w-6 mx-1">
                            <i class="uil uil-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false" data-turbo-eval="false"></script>
    @stack('scripts')
</body>

</html>
