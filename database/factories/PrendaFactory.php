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
        //$marcas = Marca::pluck('id')->toArray();
        //$categorias = Categoria::pluck('id')->toArray();
        return [
            'talle' => $this->faker->randomElement(['xs' ,'s', 'm', 'l', 'xl']), 
            'color' => $this->faker->randomElement(['rojo' ,'azul', 'amarillo', 'verde', 'negro']),
            'imagen' => $this->faker->imageUrl(),
            'precio' => rand(1, 1000) / 10,
            //'marca_id' => $this->faker->randomElement($marcas),
            'marca_id' => rand(1, 100),
            //'categoria_id' => $this->faker->randomElement($categorias),
            'categoria_id' => rand(1, 100),
            'descripcion' => $this->faker->text(),
        ];
    }
}
