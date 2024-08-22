<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Equipointegrante;
use App\Models\Equipo;
use App\Models\Usuario;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EquipointegranteTest extends TestCase
{
    use RefreshDatabase;

    public function test_equipointegrante_creation()
    {
        $equipo = Equipo::factory()->create();
        $usuario = Usuario::factory()->create();

        $equipointegrante = Equipointegrante::create([
            'id_usu' => $usuario->id,
            'id_equ' => $equipo->id,
            'isLider' => 1,
        ]);

        $this->assertDatabaseHas('equipointegrantes', [
            'id_usu' => $usuario->id,
            'id_equ' => $equipo->id,
            'isLider' => 1,
        ]);
    }
}
