<?php
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Usuario;
use App\Models\Juego;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistroJuegoTest extends TestCase
{
    use RefreshDatabase;

    public function test_usuario_puede_registrarse_en_un_juego()
    {
        $usuario = Usuario::factory()->create();
        $juego = Juego::factory()->create();

        $response = $this->actingAs($usuario)->post('/registrar-juego', [
            'juego_id' => $juego->id,
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('registro_juegos', [
            'usuario_id' => $usuario->id,
            'juego_id' => $juego->id,
        ]);
    }
}
