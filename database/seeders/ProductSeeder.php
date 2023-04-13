<?php

namespace Database\Seeders;

use App\Models\User;
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
        Product::factory()->count(21)->sequence(
            ['name' => 'Apron', 'price' => 4000, 'unit' => 'pcs', 'category_id' => 1],
            ['name' => 'Bath Math (BM)', 'price' => 1800, 'unit' => 'pcs', 'category_id' => 1],
            ['name' => 'Bath Towel (BT) ', 'price' => 2700, 'unit' => 'pcs', 'category_id' => 1],
            ['name' => 'Bath Robe (BR) ', 'price' => 7000, 'unit' => 'pcs', 'category_id' => 1],
            ['name' => 'Bed Pad Double', 'price' => 8000, 'unit' => 'pcs', 'category_id' => 1],
            ['name' => 'Bed Pad Twin/Sigle', 'price' => 7000, 'unit' => 'pcs', 'category_id' => 1],
            ['name' => 'Bed Sheet Single', 'price' => 3000, 'unit' => 'pcs', 'category_id' => 1],
            ['name' => 'Bed Sheet Double', 'price' => 3000, 'unit' => 'pcs', 'category_id' => 1],
            ['name' => 'Bed Skirting', 'price' => 9000, 'unit' => 'pcs', 'category_id' => 1],
            ['name' => 'Bendera', 'price' => 4000, 'unit' => 'pcs', 'category_id' => 1],
            ['name' => 'Black Out', 'price' => 8000, 'unit' => 'meter persegi', 'category_id' => 1],
            ['name' => 'Inner Duvet King', 'price' => 10000, 'unit' => 'pcs', 'category_id' => 1],
            ['name' => 'Duve Cover Double', 'price' => 5500, 'unit' => 'pcs', 'category_id' => 1],
            ['name' => 'Duve Cover Sigle', 'price' => 5500, 'unit' => 'pcs', 'category_id' => 1],
            ['name' => 'Face Towel', 'price' => 1500, 'unit' => 'pcs', 'category_id' => 1],
            ['name' => 'Gordyn/Vitrage (Curtain)', 'price' => 8000, 'unit' => 'meter persegi', 'category_id' => 1],
            ['name' => 'Hand Towel', 'price' => 1700, 'unit' => 'pcs', 'category_id' => 1],
            ['name' => 'Pillow Cases', 'price' => 1500, 'unit' => 'pcs', 'category_id' => 1],
            ['name' => 'Pool Towel', 'price' => 3500, 'unit' => 'pcs', 'category_id' => 1],
            ['name' => 'Rug/Karpet', 'price' => 15000, 'unit' => 'meter persegi', 'category_id' => 1],
            ['name' => 'Shower Curting', 'price' => 10000, 'unit' => 'pcs', 'category_id' => 1],
        )->create();
        Product::factory()->count(15)->sequence(
            ['name' => 'Blouse', 'price' => 7500, 'unit' => 'pcs', 'category_id' => 3],
            ['name' => 'Cook Jacket', 'price' => 8000, 'unit' => 'pcs', 'category_id' => 3],
            ['name' => 'Hat', 'price' => 4000, 'unit' => 'pcs', 'category_id' => 3],
            ['name' => 'Jacket', 'price' => 10000, 'unit' => 'pcs', 'category_id' => 3],
            ['name' => 'Mukena', 'price' => 5500, 'unit' => 'pcs', 'category_id' => 3],
            ['name' => 'Necktie', 'price' => 4000, 'unit' => 'pcs', 'category_id' => 3],
            ['name' => 'Rompi / Vest', 'price' => 5000, 'unit' => 'pcs', 'category_id' => 3],
            ['name' => 'Safari Shirt', 'price' => 9000, 'unit' => 'pcs', 'category_id' => 3],
            ['name' => 'Sajadah', 'price' => 5500, 'unit' => 'pcs', 'category_id' => 3],
            ['name' => 'Scruff', 'price' => 4500, 'unit' => 'pcs', 'category_id' => 3],
            ['name' => 'Shirt', 'price' => 7000, 'unit' => 'pcs', 'category_id' => 3],
            ['name' => 'Skirt', 'price' => 5000, 'unit' => 'pcs', 'category_id' => 3],
            ['name' => 'Slack', 'price' => 5000, 'unit' => 'pcs', 'category_id' => 3],
            ['name' => 'Trousher', 'price' => 6000, 'unit' => 'pcs', 'category_id' => 3],
            ['name' => 'T-Shirt', 'price' => 5500, 'unit' => 'pcs', 'category_id' => 3],
        )->create();
        Product::factory()->count(9)->sequence(
            ['name' => 'Kitchen Clothe', 'price' => 2000, 'unit' => 'pcs', 'category_id' => 2],
            ['name' => 'Napkin', 'price' => 1500, 'unit' => 'pcs', 'category_id' => 2],
            ['name' => 'Inner Duve Twin', 'price' => 9000, 'unit' => 'pcs', 'category_id' => 2],
            ['name' => 'Round Table Clothe', 'price' => 6000, 'unit' => 'pcs', 'category_id' => 2],
            ['name' => 'Table Runner', 'price' => 7000, 'unit' => 'pcs', 'category_id' => 2],
            ['name' => 'Table Clothe (Medium)', 'price' => 10000, 'unit' => 'pcs', 'category_id' => 2],
            ['name' => 'Table Clothe (Large)', 'price' => 12000, 'unit' => 'pcs', 'category_id' => 2],
            ['name' => 'Velvet / Laken', 'price' => 6000, 'unit' => 'meter persegi', 'category_id' => 2],
            ['name' => 'Cover Chair', 'price' => 6000, 'unit' => 'pcs', 'category_id' => 2],
        )->create();


//        $products = Product::get();
//        $users = User::role('hotel')->get(['id']);
//        foreach ($users as $user) {
//            foreach ($products as $product) {
//                ProductCustomer::create([
//                    'product_id' => $product->id,
//                    'user_id' => $user->id,
//                    'price' => $product->price,
//                ]);
//            }
//        }
    }
}
