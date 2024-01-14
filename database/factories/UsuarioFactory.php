<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UsuarioFactory extends Factory
{
    protected $model = Usuario::class;

    public function definition()
    {
        return [
			'id_rol' => $this->faker->name,
			'nombre' => $this->faker->name,
			'apellido' => $this->faker->name,
			'telefono' => $this->faker->name,
			'universidad' => $this->faker->name,
			'carrera' => $this->faker->name,
			'semestre' => $this->faker->name,
			'email' => $this->faker->name,
			'pass' => $this->faker->name,
			'activo' => $this->faker->name,
        ];
    }
}
