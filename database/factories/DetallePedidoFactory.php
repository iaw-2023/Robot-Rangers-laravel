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
        //$pedidos = Pedido::pluck('id')->toArray();
        //$prendas = Prenda::pluck('id')->toArray();
        return [
            //
            //'pedido_id' => $this->faker->randomElement($pedidos),
            'pedido_id' => rand(1, 500),
            //'prenda_id' => $this->faker->randomElement($prendas),
            'prenda_id' => rand(1, 500),
            'cantidad' => rand(1, 10),
        ];
    }
}
