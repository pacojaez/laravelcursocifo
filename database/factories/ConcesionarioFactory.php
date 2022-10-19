<?php

namespace Database\Factories;

use App\Models\Concesionario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Concesionario>
 */
class ConcesionarioFactory extends Factory
{
    protected $model = Concesionario::class;

    public function definition()
    {
        return [
            'name' => $this->faker->randomElement([
                'ALLUITZ MOTOR',
                'ALZAGA MOTOR',
                'AUDI RETAIL BARCELONA',
                'AUTO IRACHE',
                'AUTOTRECA2',
                'AUTOTRECA3',
                'AUTOTRECA4',
                'AUTOTRECA5',
                'AUTOTRECA6',
                'AUTOTRECA7',
                'AUTOTRECA8',
                'ALLUITZ MOTOR1',
                'ALZAGA MOTOR11',
                'AUDI RETAIL BARCELONA1',
                'AUTO IRACHE1',
                'AUTOTRECA22',
                'AUTOTRECA32',
                'AUTOTRECA42',
                'AUTOTRECA52',
                'AUTOTRECA62',
                'AUTOTRECA72',
                'AUTOTRECA82',
            ]),
        'adress' => $this->faker->streetAddress,
        'city' => $this->faker->city,
        'state' => $this->faker->city,
        'visitas' => $this->faker->randomElement([222, 333, 444,555, 666, 777, 888, 999])
        ];
    }
}
