@extends('layout.master')

@section('titulo', 'ELOQUENT')

@section('contenido')
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>El ORM de Laravel</h2>
        </div>
        <x-code>
            <a href="https://laravel.com/docs/9.x/eloquent" target="_blank" rel="noopener noreferrer">
                <p>
                    https://laravel.com/docs/9.x/eloquent
                </p>
            </a>
        </x-code>
    </div>

    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2> CONVENCIONES </h2>
        </div>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>Eloquent asume que la
                tabla correspondiente de la base de datos tendrá el mismo
                nombre, comenzando por minúscula y en plural.
            </h2>
        </div>
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>Si queremos dar otro nombre diferente a la tabla en la base de
                datos, debemos especificar la propiedad $table en nuestro modelo.
            </h2>
        </div>
        <x-code>
            <p>
                protected $table = ‘tiendas’;
            </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>
                Clave primaria
            </h2>
        </div>
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>
                todas las tablas tienen una clave primaria llamada ‘id’.
                podemos indicar a Eloquent otra cosa colocando una
                propiedad protegida, llamada $primaryKey
            </h2>
        </div>
        <x-code>
            <p>
                protected $primaryKey = ‘codigo’;<br>
            </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>
                Timestamps
            </h2>
        </div>
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>
                Eloquent espera encontrar en las tablas los campos created_at y updated_at.
                Si no tenemos estas dos columnas para un modelo concreto, debemos
                indicárselo a Eloquent mediante la propiedad $timestamps:
            </h2>
        </div>


        <x-code>
            <p>
                public $timestamps = false;<br>
            </p>
        </x-code>
    </div>

    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>
                Eloquent es como un constructor de consultas
                (query builder) que nos permitirá consultar de forma ágil la tabla de la
                base de datos asociada al modelo.
            </h2>
        </div>
    </div>

    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>
                $fillable sirve como una lista blanca, con los atributos en los que se
                permite la asignación masiva. <br>
                $guarded actúa como una lista negra, donde se indican los que no la
                deben permitir (por ejemplo el campo admin, si lo hubiera).
            </h2>
        </div>
        <x-code>
            <p>
                protected $guarded = [ ];<br>
                protected $fillable = ['valor1', 'valor2' ];<br>
            </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>
                MÉTODOS INTERESANTES
            </h2>
        </div>
        <x-code>
            <p>
                método etsático all().<br>
                $tiendas = Shop::all();<br>
                <br>
                método save().<br>
                $tienda->save();<br>
                <br>
                método estático create().<br>
                Shop::create( ['nombre' => 'UnNombre', ....]);<br>
                <br>
                método find().<br>
                $tienda = Shop::find(2);<br>
                $tiendas = Shop::find([5, 6, 7]);<br>
                <br>
                método first().<br>
                $tienda = Shop::where(‘poblacion’,’Sabadell’)->first();<br>
                <br>
                método findOrFail().<br>
                $tienda = Shop::where(‘poblacion’,’Sabadell’)->findOrFail();<br>
                <br>
                método firstOrFail().<br>
                $tienda = Shop::where(‘poblacion', ‘Olot’)->firstOrFail();<br>
                <br>
                Consultas de totales<br>
                count(), sum(), max(), avg()...<br>
                <br>
                Update or Save in edit forms<br>
                $shop->save();<br>
                $tienda->update([‘nombre’ => ‘Motohome’, ‘telefono’ => ’6666666’]);<br>
                <br>
                Delete Destroy<br>
                Shop::find(1)->delete()<br>
                Shop::destroy([8,9]);
                <br>
            </p>
        </x-code>
    </div>

@endsection
