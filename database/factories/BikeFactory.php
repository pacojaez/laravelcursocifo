<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bike>
 */
class BikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'marca' => $this->faker->randomElement([
                'Kawasaki',
                'Marusho',
                'Meguro',
                'Mitsubishi',
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
            ]),
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
            ]),
            'kms' => $this->faker->randomElement([100,100000]),
            'precio' => $this->faker->numberBetween(600,20000),
            'color' => $this->faker->randomElement(['blanco', 'rojo', 'negro','gris', 'azul', 'plateada', 'verde']),
            'caballos' => $this->faker->randomElement([80, 200, 150]),
            'matricula' => $this->faker->randomElement(['1122GHG', '2233GHG', '3344GGF', '4455HJH', '5566GHG', '6677JKJ', '7788FGF', '8899FGF', '9900FDF', '0011LKL']),
            'anyo' => $this->faker->date('Y-m-d'),
            'matriculada' => $this->faker->randomElement([0, 1]),
            'user_id' => $this->faker->numberBetween( 1, 20 ),
            'uuid' => $this->faker->uuid(),
            'image' => 'moto'.$this->faker->numberBetween(1,30).'.jpg',
            // 'image' => 'img/bikes/moto.jpg',
            'visitas' => $this->faker->numberBetween(100, 1100),
            'concesionario_id' => $this->faker->numberBetween(1,4)
        ];
    }
}

