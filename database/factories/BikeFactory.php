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
            'kms' => $this->faker->randomElement([100,4000]),
            'precio' => $this->faker->numberBetween([2000,30000]),
            'color' => $this->faker->randomElement(['blanco', 'rojo', 'negro','gris', 'azul']),
            'caballos' => $this->faker->randomElement([80, 200, 150]),
            'matricula' => $this->faker->randomElement(['UNAMATRICULA', 'DOSMATRICULAS', 'TRESMATRICULAS']),
            'anyo' => $this->faker->date(),
            'matriculada' => $this->faker->randomElement([0, 1]),
            'user_id' => $this->faker->randomElement([25, 30,34,35, 40,10,20, 22, 11,14,18]),
            'uuid' => $this->faker->uuid(),
            'image' => 'img/bikes/moto'.$this->faker->numberBetween(1,30).'.jpg'
        ];
    }
}

