<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@iaw.com',
            'password' => Hash::make('admin123'),
        ])->assignRole('admin');
        
        User::create([
            'name' => 'empleado',
            'email' => 'empleado@iaw.com',
            'password' => Hash::make('empleado123'),
        ])->assignRole('empleado');

        User::create([
            'name' => 'repositor',
            'email' => 'repositor@iaw.com',
            'password' => Hash::make('repositor123'),
        ])->assignRole('repositor');
    }
}
