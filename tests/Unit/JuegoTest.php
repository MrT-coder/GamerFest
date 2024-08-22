<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Juego;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JuegoTest extends TestCase
{
    use RefreshDatabase;

    public function test_juego_creation()
    {
        // Creamos un juego directamente en la base de datos
        $juego = Juego::create([
            'nombre' => 'FIFA 23',
            'modalidad' => 'Online',
            'costo' => 59.99,
            'ruta_foto_principal' => 'path/to/foto_principal.jpg',
            'ruta_foto_portada' => 'path/to/foto_portada.jpg',
            'descripcion' => 'Juego de fútbol de última generación.',
        ]);

        // Verificamos que el juego se haya creado en la base de datos
        $this->assertDatabaseHas('juegos', [
            'nombre' => 'FIFA 23',
            'modalidad' => 'Online',
            'costo' => 59.99,
            'descripcion' => 'Juego de fútbol de última generación.',
        ]);
    }
}
