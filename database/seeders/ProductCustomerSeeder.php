<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCustomer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
//        ProductCustomer::factory()->count(500)->create();
        $products = Product::get();
        $users = User::role('hotel')->get(['id']);
        foreach ($users as $user) {
            foreach ($products as $product) {
                ProductCustomer::create([
                    'product_id' => $product->id,
                    'user_id' => $user->id,
                    'price' => $product->price,
                ]);
            }
        }
    }
}
