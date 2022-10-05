@extends('layout.master')

@section('titulo', 'Portada de Larabikes')

@section('contenido')
    <x-hero-welcome />
    <!-- Parallax Background -->
    <article class="flex-col w-full h-[500px] bg-cover bg-fixed bg-center flex justify-center items-center"
        style="background-image: url(  {{ asset( 'storage/'.config('filesystems.bikesImageDir').'/'.$bike->image) }}">
        <h1 class="p-2 m-2 mt-20 mb-10 text-5xl font-semibold text-white rounded-lg bg-gray-400/60">
            LARABIKES FOR ALL
        </h1>

        <span class="p-2 m-2 my-20 font-bold text-center rounded-lg text-white/90 bg-gray-400/60">
            <a href="https://egoistdeveloper.github.io/twcss-to-sass-playground/" target="_blank"
                class="text-white/90 hover:text-white">
                Un recorrido por Laravel
            </a>

            <hr class="my-4" />

            <a href="https://unsplash.com/photos/8Pm_A-OHJGg" target="_blank" class="text-white/90 hover:text-white">
                De Eloquent a Blade
            </a>

            <hr class="my-4" />

            <p>
                <a href="https://github.com/EgoistDeveloper/my-tailwind-components/blob/main/src/templates/parallax-landing-page.html"
                    target="_blank" class="text-white/90 hover:text-white">
                    Ida y vuelta
                </a>
                |
                <a href="https://egoistdeveloper.github.io/my-tailwind-components/./src/templates/parallax-landing-page.html"
                    target="_blank" class="text-white/90 hover:text-white">
                    Sin escalas
                </a>
            </p>
        </span>
    </article>

    <x-herobig />
@endsection

