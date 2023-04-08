<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductCustomer;
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

        $prodcuts = Product::get();
        foreach ($prodcuts as $product) {
            ProductCustomer::create([
                'product_id' => $product->id,
                'user_id' => 4,
                'price' => $product->price,
            ]);
        }
    }
}
