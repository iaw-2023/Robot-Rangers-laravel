<?php

namespace Database\Seeders;

use DB;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetallePedidoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 1; $i <= 3000; $i++) {
            DB::table('detalle_pedido')->insert([
                'pedido_id' => App\Pedido::inRandomOrder()->limit(1000)->get(),
                'prenda_id' => App\Prenda::inRandomOrder()->limit(1000)->get(),
                'cantidad' => rand(1, 1000),
            ]);
        }
    }
}
