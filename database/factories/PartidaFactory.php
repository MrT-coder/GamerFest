<?php

namespace Database\Factories;

use App\Models\Partida;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PartidaFactory extends Factory
{
    protected $model = Partida::class;

    public function definition()
    {
        return [
			'id_juegos' => $this->faker->name,
			'id_usuarios' => $this->faker->name,
			'salon' => $this->faker->name,
			'fecha' => $this->faker->name,
			'hora_inicio' => $this->faker->name,
			'hora_fin' => $this->faker->name,
			'estado' => $this->faker->name,
        ];
    }
}
