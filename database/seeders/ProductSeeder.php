<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Apron',
            'category_id' => 1,
            'price' => 4000
        ]);

        Product::create([
            'name' => 'Kitchen Clothe',
            'category_id' => 2,
            'price' => 2000
        ]);

        Product::create([
            'name' => 'Blouse',
            'category_id' => 3,
            'price' => 7500
        ]);

        for ($i = 0; $i < 100; $i++) {
            Product::create([
                'name' => 'Product ' . $i,
                'unit' => 'pcs',
                'category_id' => Category::all()->random()->id,
                'price' => random_int(1000, 10000)
            ]);
        }
    }
}
