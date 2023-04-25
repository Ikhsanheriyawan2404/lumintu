<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCustomer;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::get(['id', 'price']);
        $users = User::role('hotel')->get(['id']);
        $data = [];
        for ($i = 0; $i < $users->count(); $i++) {
            for ($j = 0; $j < $products->count(); $j++) {
                $data[] = [
                    'user_id' => $users[$i]->id,
                    'product_id' => $products[$j]->id,
                    'price' => fake()->numberBetween(4000, 15000),
                    'created_at' => now()->toDateString(),
                    'updated_at' => now()->toDateString(),
                ];

            }
        }
        foreach (array_chunk($data, $products->count()) as $chunk) {
            ProductCustomer::insert($chunk);
        }
    }
}
