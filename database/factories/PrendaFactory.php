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
            'nombre'=>$this->faker->name(),
            'talle' => $this->faker->randomElement(['xs' ,'s', 'm', 'l', 'xl']), 
            'color' => '#' . dechex($this->faker->numberBetween(0, 16777215)),
            'imagen' => $this->faker->imageUrl(),
            'imagen_public_id' => $this->faker->unique()->randomNumber(5),
            'precio' => $this->faker->randomFloat(2, 0, 999999.99),
            'marca_id' => Marca::inRandomOrder()->first(),
            'categoria_id' => Categoria::inRandomOrder()->first(),
            'descripcion' => $this->faker->text(),
        ];
    }
}
