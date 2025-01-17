<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            PostSeeder::class,
            CategorySeeder::class,
            ProductDetailSeeder::class,
            ProductSeeder::class,
            OrderSeeder::class,
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([    
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
