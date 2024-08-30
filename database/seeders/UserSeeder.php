<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@ceramic.com',
            'password' => '$2y$10$2TaA.DxsSMStzKpX1Vj/6u6PdQloSEYgoR9BjaTuqNxPyJ0KNKPnq', // la contraseña es 'administrador'
            'role' => 'admin'
        ]);
        User::factory(20)->create();
    }
}
