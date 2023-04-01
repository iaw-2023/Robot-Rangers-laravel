<?php

namespace Database\Seeders;

use DB;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //    
        /*for ($i = 1; $i <= 10; $i++) {
            DB::table('categoria')->insert([
                'nombre' => Str::random(10),
            ]);
        }*/
    }
}
