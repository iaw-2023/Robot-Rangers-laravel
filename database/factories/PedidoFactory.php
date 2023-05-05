<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedido>
 */
class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'mail_cliente' => $this->faker->email(),
            'monto' => rand(1, 1000) / 10,
            'fechaHora' => $this->faker->dateTimeBetween('-1 year', '+1 year')->format('Y-m-d H:i:s'),
        ];
    }
}
