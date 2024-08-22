<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Comprobante;
use App\Models\Juego;
use App\Models\Usuario;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ComprobanteTest extends TestCase
{
    use RefreshDatabase;

    public function test_comprobante_creation()
    {
        $juego = Juego::factory()->create();
        $usuario = Usuario::factory()->create();

        $comprobante = Comprobante::create([
            'id_usuarios' => $usuario->id,
            'id_juegos' => $juego->id,
            'estado_pago' => 'completado',
            'ruta_comprobante' => 'path/to/comprobante.jpg',
        ]);

        $this->assertDatabaseHas('comprobantes', [
            'id_usuarios' => $usuario->id,
            'id_juegos' => $juego->id,
            'estado_pago' => 'completado',
        ]);
    }
}
