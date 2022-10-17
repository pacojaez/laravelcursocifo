<!-- Footer -->
<footer class="w-full pt-10 bg-gray-800 sm:mt-10">
    <div class="flex flex-wrap justify-center max-w-6xl m-auto text-gray-200">
        <p class="p-2 m-2 underline">PHP 8.0.13</p>
        <p class="p-2 m-2 underline">Laravel Framework 9.34.0</p>
    </div>
    <div class="flex flex-wrap max-w-6xl m-auto text-gray-800 justify-left">
        <!-- Col-1 -->
        <div class="w-1/2 p-5 sm:w-4/12 md:w-3/12">
            <!-- Col Title -->
            <div class="mb-6 text-xs font-medium text-gray-400 uppercase">
                Getting Started
            </div>

            <!-- Links -->
            <a href="{{ route('installation')}} " class="block my-3 text-sm font-medium text-gray-300 duration-700 hover:text-gray-100">
                Installation
            </a>
            <a href="{{ route('bladedirectives')}}" class="block my-3 text-sm font-medium text-gray-300 duration-700 hover:text-gray-100">
                Blade Directives
            </a>
            <a href="{{ route('routing')}}" class="block my-3 text-sm font-medium text-gray-300 duration-700 hover:text-gray-100">
                Routing
            </a>
            <a href="{{ route('middleware') }}" class="block my-3 text-sm font-medium text-gray-300 duration-700 hover:text-gray-100">
                Middleware
            </a>
            <a href="{{ route('url')}}" class="block my-3 text-sm font-medium text-gray-300 duration-700 hover:text-gray-100">
                Url y Redirecciones
            </a>
            <a href="{{ route('customkeysignedroutes')}}" class="block my-3 text-sm font-medium text-gray-300 duration-700 hover:text-gray-100">
                Custom Key Signed Routes
            </a>
            <a href="{{ route('generararchivoroutestest')}}" class="block my-3 text-sm font-medium text-gray-300 duration-700 hover:text-gray-100">
                Generar Archivo Routes test.php
            </a>
        </div>

        <!-- Col-2 -->
        <div class="w-1/2 p-5 sm:w-4/12 md:w-3/12">
            <!-- Col Title -->
            <div class="mb-6 text-xs font-medium text-gray-400 uppercase">
                Core Concepts
            </div>

            <!-- Links -->
            <a href="{{ route('validation')}}" class="block my-3 text-sm font-medium text-gray-300 duration-700 hover:text-gray-100">
                Validation
            </a>
            <a href="{{ route('formrequest')}}" class="block my-3 text-sm font-medium text-gray-300 duration-700 hover:text-gray-100">
                Form Request
            </a>
            <a href="{{ route('autorizacion')}}" class="block my-3 text-sm font-medium text-gray-300 duration-700 hover:text-gray-100">
                Autorizacion
            </a>
            <a href="{{ route('artisancommands')}}" class="block my-3 text-sm font-medium text-gray-300 duration-700 hover:text-gray-100">
                Artisan Commands
            </a>
            <a href="{{ route('querybuilder')}}" class="block my-3 text-sm font-medium text-gray-300 duration-700 hover:text-gray-100">
                Query Builder
            </a>
            <a href="{{ route('eloquent')}}" class="block my-3 text-sm font-medium text-gray-300 duration-700 hover:text-gray-100">
                Eloquent
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

        <!-- Col-4 -->
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
            <div class="mt-2">© Copyright 2022. All Rights Reserved.</div>

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
