@extends('layout.master')

@section('titulo', 'Instalación de Larabikes')

@section('contenido')
    <div class="flex flex-col w-full">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>INSTALACIÓN DE LARAVEL</h2>
        </div>
        <x-code>
            <p> composer create-project laravel/laravel larabikes </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>CORRER EL SERVIDOR</h2>
        </div>
        <x-code>
            <p> cd larabikes </p>
            <p> php artisan serve </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>Bike Factory </h2>
        </div>
        <x-code>
            <p> public function definition() <br>
                {<br>
                return [<br>
                'marca' => $this->faker->randomElement([<br>
                'Kawasaki',
                'Marusho',
                'Meguro',
                'Mitsubishi Silver Pigeon',
                'Miyata',
                'Rikuo Motos',
                'Suzuki',
                'Tohatsu',
                'Yamaha',
                'Bultaco',
                'Derbi',
                'Gas Gas',
                'Aprilia',
                'BMW'

                ]),<br>
                'modelo' => $this->faker->randomElement([
                'GPZ1000RX',
                'KZ1100',
                'Ninja ZX-10R',
                'serie Z',
                'Vulcan',
                'W800',
                'Z1100',
                'KLE500',
                'KLR650',
                'KSR110'
                ]),<br>
                'kms' => $this->faker->randomElement([100,4000]),<br>
                'precio' => $this->faker->numberBetween([2000,30000]),<br>
                'color' => $this->faker->randomElement(['blanco', 'rojo', 'negro','gris', 'azul']),<br>
                'caballos' => $this->faker->randomElement([80, 200, 150]),<br>
                'matricula' => $this->faker->randomElement(['UNAMATRICULA', 'DOSMATRICULAS', 'TRESMATRICULAS']),<br>
                'anyo' => $this->faker->date(),<br>
                'matriculada' => $this->faker->randomElement([0, 1]),<br>
                'user_id' => $this->faker->randomElement([25, 30,34,35, 40,10,20, 22, 11,14,18]),<br>
                'uuid' => $this->faker->uuid(),<br>
                'image' => 'img/bikes/moto'.$this->faker->numberBetween(1,30).'.jpg'<br>
                ];
                } </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>SeEDING THE DATABASE</h2>
        </div>
        <x-code>
            public function run()<br>
            {<br>
                \App\Models\Bike::factory(200)->create();<br>

            }
        </x-code>
    </div>
    <div class="flex flex-col w-full">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>CORRIENDO LAS MIGRACIONES</h2>
        </div>
        <x-code>
            php artisan migrate:fresh --seed
        </x-code>
    </div>

@endsection
