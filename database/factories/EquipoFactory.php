<?php

namespace Database\Factories;

use App\Models\Equipo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EquipoFactory extends Factory
{
    protected $model = Equipo::class;

    public function definition()
    {
        return [
			'id_equ' => $this->faker->name,
			'nombre_equ' => $this->faker->name,
        ];
    }
}
