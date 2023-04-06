<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\ProductCustomer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCustomer::create([
            'product_id' => 1,
            'user_id' => 4,
            'price' => 100,
        ]);

        ProductCustomer::create([
            'product_id' => 2,
            'user_id' => 4,
            'price' => 100,
        ]);

        $order = Order::create([
            'customer_id' => 4,
            'supervisor_id' => 1,
            'total_price' => 15000,
            'order_date' => date('Y-m-d'),
            'estimate_date' => date('Y-m-d'),
        ]);

        $order->order_details()->create([
            'product_customer_id' => 1,
            'qty' => 100,
        ]);

        $order->order_details()->create([
            'product_customer_id' => 2,
            'qty' => 50,
        ]);
    }
}
