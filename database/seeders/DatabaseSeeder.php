<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategoriaTableSeeder::class,
            MarcaTableSeeder::class,
            PrendaTableSeeder::class,
            PedidoTableSeeder::class,
            DetallePedidoTableSeeder::class,
            UserSeeder::class
        ]);        
    }
}
