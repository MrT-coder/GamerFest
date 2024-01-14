<?php

namespace Database\Factories;

use App\Models\Partidasusuario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PartidasusuarioFactory extends Factory
{
    protected $model = Partidasusuario::class;

    public function definition()
    {
        return [
			'id_partidasusuarios' => $this->faker->name,
			'id_partidas' => $this->faker->name,
			'id_usuarios' => $this->faker->name,
			'gana' => $this->faker->name,
        ];
    }
}
