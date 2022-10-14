@extends('layout.master')

@section('titulo', 'Instalación de Larabikes')

@section('contenido')
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>Conexión y consultas a BDD desde
                proyectos Laravel mediante Query Builder.</h2>
        </div>
        <x-code>
            <a href="https://laravel.com/docs/9.x/queries" target="_blank" rel="noopener noreferrer">
                <p>
                    https://laravel.com/docs/9.x/queries
                </p>
            </a>
        </x-code>
    </div>

    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2> DB Facade </h2>
        </div>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>Esta fachada nos aporta toda una serie de métodos para realizar
                operaciones con la base de datos, de forma similar a la que vimos
                en el módulo de PHP con la clase DB.</h2>
        </div>
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>Laravel permite realizar consultas “en crudo”, es decir, incluir
                consultas en SQL directamente en nuestras aplicaciones.</h2>
        </div>
        <x-code>
            <p>
                 static mixed selectOne(string $query, array $bindings = [ ])<br>
                 static array select (string $query, array $bindings = [ ])<br>
                 static bool insert (string $query, array $bindings = [ ])<br>
                 static int update (string $query, array $bindings = [ ])<br>
                 static int delete (string $query, array $bindings = [ ])<br>
                 static bool statement (string $query, array $bindings = [ ])<br>
            </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2> El método select() devuelve un array de resultados, donde cada
                resultado del array es un objeto stdClass. Si queremos convertir la lista de objetos stdClass a una
                colección
                Eloquent, podemos usar el método hydrate().
            </h2>
        </div>
        <x-code>
            <p>
                Collection hydrate(array $items)<br>
                Create a collection of models from plain arrays.<br>
                Parameters<br>
                array $items <br>
                Return Value<br>
                Collection<br>
            </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>
                Para todas estas sentencias, que no forman parte del subconjunto
                DML de SQL, podemos usar el método statement().

            </h2>
        </div>
        <x-code>
            <p>
                $done = DB::statement("drop table shops");<br>
            </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>
                Para recuperar todas las filas de una tabla, podemos usar el
                método table() de la fachada DB.
            </h2>
        </div>
        <x-code>
            <p>
                $bikes = DB::table('bikes')->get();
            </p>
        </x-code>
    </div>

    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>
                para ver las clases de los resultados
            </h2>
        </div>
        <x-code>
            <p>
                get_class(DB::table('bikes')) >>>>>>>>>>>>>> Illuminate\Database\Query\Builder<br>
                get_class(DB::table('bikes')->get()) >>>>>>>>>>>>>> Illuminate\Support\Collection<br>
                get_class(DB::table('bikes')->get()->get(1)) >>>>>>>>>>>>>> stdClass<br>
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
                first()<br>
                value()<br>
                pluck()<br>
                chunck()<br>
                avg()<br>
                count()<br>
                max()<br>
                min()<br>
                exists()<br>
                doesntExist()<br>
                distinct()<br>
                addSelect()<br>
            </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>
                Métodos WHERE (algunos)
            </h2>
            <p>
                If you need to group an "or" condition within parentheses, you may pass a closure as the first argument to
                the orWhere method:
            </p>
        </div>
        <x-code>
            <p>
                DB::table('bikes')<br>
                ->where('visitas', '>', 100)<br>
                ->where('visitas', '<', 200)<br>
                    ->orWhere('marca', 'Yamaha')<br>
                    ->orWhere(function($query) {<br>
                    $query->where('modelo', 'W800')<br>
                    ->where('precio', '>', 5000);<br>
                    })<br>
                    ->whereNot(function ($query) {<br>
                    $query->where('caballos', '>', 120)<br>
                    ->orWhere('precio', '<', 1000);<br>
                        })<br>
                        ->whereBetween('precio', [1000, 10000])<br>
                        ->whereNotBetween('caballos', [10, 100])<br>
                        ->whereBetweenColumns('weight', ['minimum_allowed_weight', 'maximum_allowed_weight'])<br>
                        ->whereNotBetweenColumns('weight', ['minimum_allowed_weight', 'maximum_allowed_weight'])<br>
                        ->whereIn('id', [1, 2, 3])<br>
                        ->whereNotIn('id', [1, 2, 3])<br>
                        ->whereNotNull('created_at')<br>
                        ->whereNull('deleted_at')<br>
                        ->whereDate('created_at', '2022-10-14')<br>
                        ->whereMonth('created_at', '10')<br>
                        ->whereDay('created_at', '14')<br>
                        ->whereYear('created_at', '2022')<br>
                        ->whereTime('created_at', '=', '14:46:19')<br>
                        ->whereColumn('first_name', 'last_name')<br>
                        ->whereColumn('updated_at', '>', 'created_at')<br>
                        ->whereColumn([<br>
                        ['first_name', '=', 'last_name'],<br>
                        ['updated_at', '>', 'created_at'],<br>
                        ])<br>
                        ->get();<br>
            </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>
                Para establecer el orden usamos el método orderBy().
                <br>
                También podemos usar los métodos latest() y oldest() para
                ordenar por la columna created_at.
            </h2>
            <h2>
                Para indicar el número máximo de registros a recuperar, usamos el
                método limit().
                <br>
                También podemos usar los métodos skip() y take() para hacer la
                combinación de las cláusulas LIMIT y OFFSET.
            </h2>
        </div>
    </div>

    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>
                CONSULTAS INSERT
            </h2>
        </div>
        <x-code>
            <p>
                insert(): <br>
                para realizar la inserción, recibe uno o más arrays asociativos,<br>
                dependiendo de si queremos hacer una inserción sencilla o múltiple.<br>
                <br>
                insertOrIgnore():<br>
                para realizar la inserción pero que ignore los<br>
                registros duplicados al realizar la inserción.<br>
                <br>
                insertGetId(): <br>
                realiza la inserción y retorna el id autonumérico asignado<br>
                al registro.<br>

            </p>
        </x-code>
    </div>

    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>
                RAW Expressions
            </h2>
            <p>
                A veces no tendremos el método específico para hacer una
                consulta determinada y necesitaremos añadir código SQL
                directamente en la consulta.
                Para poder hacerlo, tenemos el método DB::raw().
            </p>
        </div>
        <x-code>
            <p>
                selectRaw() <br>
                orderByRaw()<br>
                whereRaw()<br>
                orWhereRaw()<br>
                havingRaw()<br>
                orHavingRaw()<br>
            </p>
        </x-code>
    </div>


@endsection
