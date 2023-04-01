<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use DB;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrendaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        for ($i = 1; $i <= 1000; $i++) {
            DB::table('prenda')->insert([
                'talle' => $faker->randomElement(['xs' ,'s', 'm', 'l', 'xl']), 
                'color' => Str::random(10),
                'precio' => rand(1, 1000) / 10,
                'marca_id' => DB::table('marca')::inRandomOrder()->limit(10)->get(),
                'categoria_id' => Categoria::inRandomOrder()->limit(10)->get(),
            ]);
        }
    }
}
