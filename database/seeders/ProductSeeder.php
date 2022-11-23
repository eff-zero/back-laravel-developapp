<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        Product::factory()->create([
            'category_id' => 1,
            'name' => 'Lenovo IdeaPad 3i',
            'price' => 1800000,
            'description' => 'core i3|full hd|15 pulgadas',
            'image' => ''
        ]);
        Product::factory()->create([
            'category_id' => 1,
            'name' => 'Lenovo IdeaPad 5i',
            'price' => 2200000,
            'description' => 'core i5|full hd|16 pulgadas',
            'image' => ''
        ]);

        // 2
        Product::factory()->create([
            'category_id' => 2,
            'name' => 'IdeaCentre 3i',
            'price' => 2500000,
            'description' => 'core i3|full hd|23 pulgadas',
            'image' => ''
        ]);
        Product::factory()->create([
            'category_id' => 2,
            'name' => 'IdeaCentre 5i',
            'price' => 3000000,
            'description' => 'amd r5|2k|23 pulgadas',
            'image' => ''
        ]);

        // 3
        Product::factory()->create([
            'category_id' => 3,
            'name' => 'AOC 24G2',
            'price' => 950000,
            'description' => '24 pulgadas|1 ms|144 hz',
            'image' => ''
        ]);
        Product::factory()->create([
            'category_id' => 3,
            'name' => 'Lenovo G24',
            'price' => 1200000,
            'description' => '24 pulgadas|1 ms|165 hz',
            'image' => ''
        ]);

        // 4
        Product::factory()->create([
            'category_id' => 4,
            'name' => 'Redragon K631',
            'price' => 250000,
            'description' => '65%|mecanico|negro',
            'image' => ''
        ]);
        Product::factory()->create([
            'category_id' => 4,
            'name' => 'Redragon K552',
            'price' => 170000,
            'description' => '60%|mecanico|negro',
            'image' => ''
        ]);
    }
}
