<?php
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Usuario;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SeguridadSQLTest extends TestCase
{
    use RefreshDatabase;

    public function test_proteccion_contra_inyeccion_sql()
    {
        $usuario = Usuario::factory()->create();

        $response = $this->actingAs($usuario)->post('/buscar-usuario', [
            'query' => "'; DROP TABLE usuarios; --",
        ]);

        $response->assertStatus(400); // Asegura que la inyección SQL no funciona.
    }
}
