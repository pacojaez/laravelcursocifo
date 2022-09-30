@extends('layout.master')

@section('titulo', 'Instalación de Larabikes')

@section('contenido')
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>BLADE DIRECTIVES</h2>
        </div>
        <x-code>
            <p>
                @ if() @ endif
            </p>
            <p>
                @ foreach() @ endforech
            </p>
            <p>
                 @ unless (Auth::check())
                You are not signed in.
                @ endunless
            </p>
            <p> @i sset($records)
                // $records is defined and is not null...
                @ endisset
            </p>
            <p> @ auth
                // The user is authenticated...
                @ endauth

                @ guest
                    // The user is not authenticated...
                @ endguest
            </p>
            <p>
                input type="checkbox"
                name="active"
                value="active"
                @ checked(old('active', $user->active)) />
            </p>
        </x-code>
    </div>

@endsection
