@extends('layout.master')

@section('titulo', 'Creacion de una nueva moto de Larabikes')

@section('contenido')
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
            </a>
        </x-slot>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />

                <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block w-full mt-1"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block w-full mt-1"
                                type="password"
                                name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

             <!-- CIUDAD -->
             <div>
                <x-input-label for="ciudad" :value="__('Ciudad')" />

                <x-text-input id="ciudad" class="block w-full mt-1" type="text" name="ciudad" :value="old('ciudad')" required autofocus />

                <x-input-error :messages="$errors->get('ciudad')" class="mt-2" />
            </div>

             <!-- Provincia -->
             <div>
                <x-input-label for="provincia" :value="__('Provincia')" />

                <x-text-input id="provincia" class="block w-full mt-1" type="text" name="provincia" :value="old('provincia')" required autofocus />

                <x-input-error :messages="$errors->get('provincia')" class="mt-2" />
            </div>

             <!-- Telefono -->
             <div>
                <x-input-label for="telefono" :value="__('Teléfono')" />

                <x-text-input id="telefono" class="block w-full mt-1" type="text" name="telefono" :value="old('telefono')" required autofocus />

                <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
            </div>

             <!-- Nacimiento -->
             <div>
                <x-input-label for="nacimiento" :value="__('Nacimiento')" />

                <x-text-input id="nacimiento" class="block w-full mt-1" type="date" name="nacimiento" :value="old('nacimiento')" required autofocus />

                <x-input-error :messages="$errors->get('nacimiento')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
@endsection
