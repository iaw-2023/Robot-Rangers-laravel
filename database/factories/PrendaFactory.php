<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Marca;
use App\Models\Categoria;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prenda>
 */
class PrendaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'talle' => $this->faker->randomElement(['xs' ,'s', 'm', 'l', 'xl']), 
            'color' => $this->faker->randomElement(['rojo' ,'azul', 'amarillo', 'verde', 'negro']),
            'precio' => rand(1, 1000) / 10,
            'marca_id' => Marca::factory(),
            'categoria_id' => Categoria::factory(),
        ];
    }
}
