<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Juego;

class JuegoControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testMostrarJuegos()
    {
        // Crear algunos juegos de prueba
        Juego::factory()->count(3)->create();

        // Hacer una solicitud GET al controlador
        $response = $this->get('/');

        // Verificar que la respuesta es 200 OK
        $response->assertStatus(200);

        // Verificar que la vista contiene los juegos
        $response->assertViewHas('juegos');

        // Verificar que los juegos están presentes en la vista
        $juegos = Juego::select('nombre', 'descripcion','costo','modalidad','ruta_foto_principal','ruta_foto_portada')->get();
        foreach ($juegos as $juego) {
            $response->assertSee($juego->nombre);
            $response->assertSee($juego->descripcion);
            $response->assertSee($juego->costo);
            $response->assertSee($juego->modalidad);
            $response->assertSee($juego->ruta_foto_principal);
            $response->assertSee($juego->ruta_foto_portada);
        }
    }
}
