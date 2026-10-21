<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FichaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'numero' => $this->faker->unique()->numerify('########'),
            'programa' => $this->faker->randomElement([
                'Análisis y Desarrollo de Software',
                'Desarrollo de Aplicaciones Web',
                'Programación de Software',
                'Desarrollo Móvil',
                'DevOps',
            ]),
        ];
    }
}