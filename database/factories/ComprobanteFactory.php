<?php

namespace Database\Factories;

use App\Models\Comprobante;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ComprobanteFactory extends Factory
{
    protected $model = Comprobante::class;

    public function definition()
    {
        return [
			'id_comprobantes' => $this->faker->name,
			'id_usuarios' => $this->faker->name,
			'id_juegos' => $this->faker->name,
			'estado_pago' => $this->faker->name,
			'ruta_comprobante' => $this->faker->name,
        ];
    }
}
