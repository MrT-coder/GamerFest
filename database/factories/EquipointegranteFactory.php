<?php

namespace Database\Factories;

use App\Models\Equipointegrante;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EquipointegranteFactory extends Factory
{
    protected $model = Equipointegrante::class;

    public function definition()
    {
        return [
			'id_usu' => $this->faker->name,
			'id_equ' => $this->faker->name,
			'isLider' => $this->faker->name,
        ];
    }
}
