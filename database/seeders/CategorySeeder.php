<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->create(['name' => 'portatil']);   // 1
        Category::factory()->create(['name' => 'all-in-one']); // 2
        Category::factory()->create(['name' => 'monitor']);    // 3
        Category::factory()->create(['name' => 'teclado']);   // 4
    }
}
