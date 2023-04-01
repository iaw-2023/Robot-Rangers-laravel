<?php

namespace Database\Seeders;

use DB;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PedidoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 1; $i <= 1000; $i++) {
            DB::table('pedido')->insert([
                'mail_cliente' => Str::random(10).'@gmail.com',
                'monto' => rand(1, 1000) / 10,
                'date' => time(),
            ]);
        }
    }
}
