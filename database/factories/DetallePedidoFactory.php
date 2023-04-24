<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Prenda;
use App\Models\Pedido;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetallePedido>
 */
class DetallePedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //'pedido_id' => rand(1, 500),
            'pedido_id' => Pedido::all()->random(),
            //'prenda_id' => rand(1, 500),
            'prenda_id' => Prenda::all()->random(),
            'cantidad' => rand(1, 10),
        ];
    }
}
