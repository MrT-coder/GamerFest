<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Juego;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistroJuegoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_registrar_juego_exitosamente()
    {
        // Crear los datos del juego de ejemplo
        $juegoData = [
            'nombre' => 'Juego de Prueba',
            'modalidad' => 'Individual',
            'costo' => 29.99,
            'ruta_foto_principal' => 'imagenes/juego_principal.jpg',
            'ruta_foto_portada' => 'imagenes/juego_portada.jpg',
            'descripcion' => 'Descripción del juego de prueba.',
        ];

        // Simular el envío del formulario de registro
        $response = $this->post('/juegos', $juegoData);

        // Verificar que el juego se haya guardado en la base de datos
        $this->assertDatabaseHas('juegos', [
            'nombre' => 'Juego de Prueba',
            'modalidad' => 'Individual',
            'costo' => 29.99,
            'ruta_foto_principal' => 'imagenes/juego_principal.jpg',
            'ruta_foto_portada' => 'imagenes/juego_portada.jpg',
            'descripcion' => 'Descripción del juego de prueba.',
        ]);

        // Verificar que la respuesta redirige correctamente
        $response->assertRedirect('/juegos');
    }
}
