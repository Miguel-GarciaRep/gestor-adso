<?php

namespace Tests\Feature;

use App\Models\Aprendiz;
use App\Models\Ficha;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AprendizTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_aprendiz(): void
    {
        $ficha = Ficha::factory()->create();

        $response = $this->post(route('aprendices.store'), [
            'nombre' => 'Test Aprendiz',
            'documento' => '1234567890',
            'correo' => 'test@example.com',
            'ficha_id' => $ficha->id,
        ]);

        $response->assertRedirect(route('aprendices.index'));
        $response->assertSessionHas('ok', 'Aprendiz creado');

        $this->assertDatabaseHas('aprendices', [
            'nombre' => 'Test Aprendiz',
            'documento' => '1234567890',
            'correo' => 'test@example.com',
            'ficha_id' => $ficha->id,
        ]);
    }

    public function test_can_create_aprendiz_without_ficha(): void
    {
        $response = $this->post(route('aprendices.store'), [
            'nombre' => 'Test Aprendiz',
            'documento' => '1234567891',
            'correo' => 'test2@example.com',
        ]);

        $response->assertRedirect(route('aprendices.index'));
        $this->assertDatabaseHas('aprendices', [
            'nombre' => 'Test Aprendiz',
            'documento' => '1234567891',
            'correo' => 'test2@example.com',
        ]);
    }

    public function test_validates_unique_documento(): void
    {
        Aprendiz::factory()->create(['documento' => '1111111111']);

        $response = $this->post(route('aprendices.store'), [
            'nombre' => 'Test Aprendiz',
            'documento' => '1111111111',
            'correo' => 'test3@example.com',
        ]);

        $response->assertSessionHasErrors('documento');
    }

    public function test_validates_unique_correo(): void
    {
        Aprendiz::factory()->create(['correo' => 'duplicate@example.com']);

        $response = $this->post(route('aprendices.store'), [
            'nombre' => 'Test Aprendiz',
            'documento' => '2222222222',
            'correo' => 'duplicate@example.com',
        ]);

        $response->assertSessionHasErrors('correo');
    }
}