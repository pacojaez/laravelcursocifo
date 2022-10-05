@extends('layout.master')

@section('titulo', 'Contacto con LARABIKES')

@section('contenido')

<div class="w-full bg-white">

    <div class="flex flex-row w-full min-h-screen bg-white">
        <div class="w-1/2 bg-center bg-no-repeat bg-contain md:block" style="background-image:  url({{ asset( 'storage/'.config('filesystems.bikesImageDir').'/'.$bike->image) }})"></div>

        <div class="px-4 py-5 mx-auto my-24 shadow-none max-w-1/2 md:w-1/2">

            <div class="p-0 font-sans text-left">

                <h1 class="text-3xl font-medium text-gray-800 ">FORMULARIO DE CONTACTO</h1>
                <h3 class="p-1 text-gray-700">ESTAREMOS ENCANTADOS DE AYUDARTE</h3>
            </div>
            <form action="{{ route('email.contact') }}" method="POST" enctype="multipart/form-data" class="p-0">
                @csrf
                <div class="mt-5">
                    <input type="text" name="email" id="email" value="{{ old('email')}}" class="block w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-transparent " placeholder="Email">
                </div>
                <div class="mt-5">
                    <input type="text" name="name" id="name" value="{{ old('name')}}" class="block w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-transparent " placeholder="Nombre">
                </div>
                <div class="mt-5">
                    <input type="text" name="asunto" id="asunto" value="{{ old('asunto')}}" class="block w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-transparent " placeholder="Asunto">
                </div>
                <div class="mt-5">
                    <textarea name="mensaje" id="mensaje" value="{{ old('mensaje')}}" cols="30" rows="10" placeholder="Tu mensaje" class="block w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-transparent "></textarea>
                </div>
                <div class="mt-5">
                    <input type="file" name="file" id="file" value="{{ old('file')}}" accept="application/pdf" class="block w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-transparent " placeholder="ARCHIVO">
                </div>

                <div class="mt-10">
                    <input type="submit" value="ENVIAR" class="w-full py-3 text-white bg-green-500 rounded hover:bg-green-600">
                </div>
            </form>
        </div>


    </div>
</div>
@endsection
