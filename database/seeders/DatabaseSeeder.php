<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Pedido;
use App\Models\Prenda;
use App\Models\DetallePedido;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            //CategoriaTableSeeder::class,
            //MarcaTableSeeder::class,
            //PrendaTableSeeder::class,
            //PedidoTableSeeder::class,
            //DetallePedidoTableSeeder::class,
        ]);
        Categoria::factory(100)->create();
        Marca::factory(100)->create();
        Pedido::factory(1000)->create();
        Prenda::factory(1000)->create();
        DetallePedido::factory(3000)->create();
    }
}
