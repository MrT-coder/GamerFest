<?php

namespace Database\Factories;

use App\Models\Juego;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class JuegoFactory extends Factory
{
    protected $model = Juego::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'modalidad' => $this->faker->name,
			'costo' => $this->faker->name,
			'ruta_foto_principal' => $this->faker->name,
			'ruta_foto_portada' => $this->faker->name,
			'descripcion' => $this->faker->name,
        ];
    }
}
