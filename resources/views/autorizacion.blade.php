@extends('layout.master')

@section('titulo', 'Instalación de Larabikes')

@section('contenido')
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>AUTORIZACIÓN</h2>
        </div>
        <x-code>
            <a href="https://laravel.com/docs/9.x/authorization#main-content" target="_blank" rel="noopener noreferrer">
                <p>
                    https://laravel.com/docs/9.x/authorization#main-content
                </p>
            </a>
        </x-code>
    </div>

    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2> GATES, POLICIES, Policies en FormRequests </h2>
        </div>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>Limitando el acceso a recursos mediante gates </h2>
        </div>
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>Las gates nos aportan una aproximación sencilla, basada en clausuras. </h2>
        </div>
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>Las policies, como los controladores, agrupan su lógica sobre un
                modelo o recurso. </h2>
        </div>
        <x-code>
            <p>
                Gate::define('borrarMoto', function ($user, $bike){<br>
                return $user->id == $bike->user_id;<br>
                });<br>
            </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>Hay que registrar las GATES en app>>>Providers>>>AuthServiceProvider.php de la siguiente forma</h2>
        </div>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2> Dentro del método boot() colocamos la lógica de la GATE
            </h2>
        </div>
        <x-code>
            <p>
                public function boot()<br>
                {<br>
                $this->registerPolicies();<br>
                <br>
                Gate::define('borrarMoto', function ($user, $bike){<br>
                return $user->id == $bike->user_id;<br>
                });<br>
                }<br>
            </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>
                Y desde el controlador ya podemos usar la GATE mediante los métodos estáticos de Gate: allows() o denies().
            </h2>
        </div>
        <x-code>
            <p>
                if(Gate::allows(‘borrarMoto’, $bike)){ ... }<br>
                if(Gate::denies(‘borrarMoto’, $bike)){ ... }<br>
            </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>
                Hay que importar la clase donde usemos las GATE
            </h2>
        </div>
        <x-code>
            <p>
                use Illuminate\Support\Facades\Gate;
            </p>
        </x-code>
    </div>

    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>
                Limitando el acceso a recursos mediante policies
            </h2>
        </div>
        <x-code>
            <p>
                php artisan make:policy BikePolicy
            </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>
                La política generada se encontrará en la carpeta app/Policies.
                Se puede generar una policy para un CRUD si hacemos:
            </h2>
        </div>
        <x-code>
            <p>
                php artisan make:policy BikePolicy --model=Bike
            </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>
                Las policies también se registran en AuthServiceProvicer.
            </h2>
        </div>
        <x-code>
            <p>
                php artisan make:policy BikePolicy --model=Bike
            </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>
                En los métodos para cada operación dentro de app>>>Poliicies>>>BikePolicy.php se define la lógica, por ejemplo:
            </h2>
        </div>
        <x-code>
            <p>
                public function update( User $user, Bike $bike)<br>
                {<br>
                    return $user->id == $bike->user_id || $user->email == 'admin@larabikes.com';<br>
                }<br>
            </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>
                Las policies tienen dos metodos: can() y cant() y hay que implementarlos en los métodos del controlador
            </h2>
        </div>
        <x-code>
            <p>
                if($user->cant('update',$bike))<br>
                    abort(401, 'No puedes editar esta moto');
            </p>
        </x-code>
    </div>

    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>
                o se pueden usar en las vistas para ocultar botones de la siguiente manera
            </h2>
        </div>
        <x-code>
            <p>
                @ can('edit',$bike)&lt;a href=" route('bike.edit', $bike) "&gt; Edit Bike &lt;/a&gt;<br>
                @ endcan<br>

                @ cannot('edit',$bike)&lt;p&gt;You cannot edit this bike!&lt;/p&gt;<br>
                @ endcannot<br>

            </p>
        </x-code>
    </div>


@endsection
