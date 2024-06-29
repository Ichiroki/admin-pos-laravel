<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        User::factory()->create([
            'name' => 'Alif Insani',
            'email' => 'alif@gmail.com'
        ]);

        Category::create([
            'category_name' => "Makanan"
        ]);

        Category::create([
            'category_name' => "Minuman"
        ]);

        Category::create([
            'category_name' => "Desserts"
        ]);
    }
}
