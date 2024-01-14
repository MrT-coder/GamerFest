<?php

namespace Database\Factories;

use App\Models\Rol;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RolFactory extends Factory
{
    protected $model = Rol::class;

    public function definition()
    {
        return [
			'nombre_rol' => $this->faker->name,
        ];
    }
}
