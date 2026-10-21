<?php

namespace Database\Factories;

use App\Models\Ficha;
use Illuminate\Database\Eloquent\Factories\Factory;

class AprendizFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'documento' => $this->faker->unique()->numerify('##########'),
            'correo' => $this->faker->unique()->safeEmail(),
            'ficha_id' => Ficha::inRandomOrder()->first()?->id,
        ];
    }
}