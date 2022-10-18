@extends('layout.master')

@section('titulo', 'Todas las motos de Larabikes')

@section('contenido')
    @can('view', Auth::user())
        <form method='POST' action="{{ route('user.update', ['user' => $user] ) }}" enctype="multipart/form-data">
            {{-- @csrf --}}
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            <div class="flex flex-col px-8 pt-6 pb-8 my-2 mb-4 bg-white rounded shadow-md">
                <div class="mb-6 -mx-3 md:flex">
                    <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                        <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="name">
                            NOMBRE
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-red"
                            id="name" type="text" placeholder="un nombre válida" name='name'
                            value="{{ $user->name }}">
                        <p class="text-xs italic text-red">Este campo es obligatorio.</p>
                    </div>
                    <div class="px-3 md:w-1/2">
                        <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="email">
                            Email
                        </label>
                        <input
                            class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                            id="email" type="email" placeholder="Un mail válido" name='email'
                            value="{{ $user->email }}">
                    </div>
                </div>
                <div class="mb-2 -mx-3 md:flex">
                    <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                        <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="ciudad">
                            Ciudad
                        </label>
                        <input
                            class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                            id="ciudad" type="text" placeholder="ciudad actuales de la moto" name="ciudad"
                            value="{{ $user->ciudad }}">
                    </div>
                    <div class="px-3 md:w-1/2">
                        <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="provincia">
                            Provincia
                        </label>
                        <input
                            class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                            id="provincia" type="text" placeholder="Provincia" name="provincia"
                            value="{{ $user->provincia }}">
                    </div>
                    <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                        <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="telefono">
                            Teléfono
                        </label>
                        <input
                            class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                            id="telefono" type="text" placeholder="telefono" name="telefono" value="{{ $user->telefono }}">
                    </div>
                    <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                        <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="telefono">
                            ROLES ACTUALES DEL USUARIO
                        </label>
                        @foreach ( $userRoles as $userRole )
                        <p class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter">
                            {{ $userRole->role }}
                        </p>
                        @endforeach
                    </div>
                    <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                        <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="roles">
                            AÑADIR ROL
                        </label>
                        <select name="roles" id="roles" >
                            @foreach ($roles as $role)
                                <option class="font-semibold underline uppercase text-red" value="{{ $role->id }}" selected="selected">{{ $role->role }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
            </div>
            <div class="flex flex-row justify-center">
                <button type="submit"
                    class="inline-flex items-center justify-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg hover:bg-indigo-800">
                    ACTUALIZAR USUARIO
                </button>
            </div>
        </form>


    @endcan

@endsection
