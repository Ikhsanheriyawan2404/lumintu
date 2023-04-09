<?php

namespace Database\Seeders;

use App\Enums\OrderStatusEnum;
use App\Models\Order;
use App\Models\ProductCustomer;
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
        // ProductCustomer::create([
        //     'product_id' => 1,
        //     'user_id' => 4,
        //     'price' => 1000,
        // ]);

        // ProductCustomer::create([
        //     'product_id' => 2,
        //     'user_id' => 4,
        //     'price' => 5000,
        // ]);

        $order = Order::create([
            'customer_id' => 4,
            'total_price' => 30000,
            'status' => 'done',
        ]);

        $order->order_details()->create([
            'product_customer_id' => 1,
            'qty' => 5,
        ]);

        $order->order_details()->create([
            'product_customer_id' => 2,
            'qty' => 5,
        ]);

        foreach (OrderStatusEnum::values() as $status) {
            $order->order_status()->create([
                'order_id' => $order->id,
                'status' => $status,
            ]);
        }

        $order = Order::create([
            'customer_id' => 4,
            'total_price' => 12300,
            'status' => 'pending',
            'created_at' => '2023-04-06 00:00:00',
        ]);

        $order->order_details()->create([
            'product_customer_id' => 1,
            'qty' => 5,
        ]);

        $order->order_details()->create([
            'product_customer_id' => 2,
            'qty' => 5,
        ]);

        foreach (OrderStatusEnum::values() as $status) {
            if ($status == OrderStatusEnum::PENDING) {
                $order->order_status()->create([
                    'order_id' => $order->id,
                    'status' => $status,
                ]);
            } else {
                $order->order_status()->insert([
                    'order_id' => $order->id,
                    'status' => $status,
                ]);
            }
        }

        // $order = Order::create([
        //     'customer_id' => 4,
        //     'total_price' => 150000,
        //     'status' => 'approve',
        //     'created_at' => '2023-04-05 00:00:00',
        // ]);

        // $order->order_details()->create([
        //     'product_customer_id' => 1,
        //     'qty' => 10,
        // ]);

        // $order->order_details()->create([
        //     'product_customer_id' => 2,
        //     'qty' => 10,
        // ]);
    }
}
