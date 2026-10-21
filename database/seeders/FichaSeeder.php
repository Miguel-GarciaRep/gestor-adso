<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ficha;

class FichaSeeder extends Seeder
{
    public function run(): void
    {
        Ficha::factory()->count(10)->create();
    }
}