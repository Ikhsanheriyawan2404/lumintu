<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Pickup;
use App\Models\Delivery;
use App\Models\OrderStatus;
use App\Enums\OrderStatusEnum;
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
        // Order DONE
        $order = Order::create([
            'order_number' => 10001,
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

        Pickup::create([
            'order_id' => $order->id,
            'user_id' => 3,
            'status' => 'done',
            'date' => date('Y-m-d'),
        ]);

        Delivery::create([
            'order_id' => $order->id,
            'user_id' => 3,
            'status' => 'done',
            'date' => date('Y-m-d'),
        ]);

        // ============================

        $order = Order::create([
            'order_number' => 10002,
            'customer_id' => 4,
            'total_price' => 30000,
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

        OrderStatus::factory()->count(12)->sequence(
            ['order_id' => 1, 'status' => 'pending'],
            ['order_id' => 1, 'status' => 'approve'],
            ['order_id' => 1, 'status' => 'pickup'],
            ['order_id' => 1, 'status' => 'process'],
            ['order_id' => 1, 'status' => 'delivery'],
            ['order_id' => 1, 'status' => 'done'],
            ['order_id' => 2, 'status' => 'pending'],
            ['order_id' => 2, 'status' => 'approve'],
            ['order_id' => 2, 'status' => 'pickup'],
            ['order_id' => 2, 'status' => 'process'],
            ['order_id' => 2, 'status' => 'delivery'],
            ['order_id' => 2, 'status' => 'done'],
        )->create();

        for ($i = 0; $i < 100; $i++) {
            $lastOrder = Order::orderBy('id', 'desc')
                ->first();

            $orderNumber = $lastOrder ? ++$lastOrder->order_number : 10001;

            $order = Order::create([
                'order_number' => $orderNumber,
                'customer_id' => random_int(4, 10),
                'total_price' => 200000,
                'status' => OrderStatusEnum::PENDING,
                'created_at' => Carbon::createFromTimestamp(rand(
                    Carbon::now()->subDays(360)->timestamp,
                    Carbon::now()->timestamp
                ))
            ]);

            $order->order_details()->create([
                'product_customer_id' => 1,
                'qty' => random_int(1, 10),
            ]);

            $order->order_details()->create([
                'product_customer_id' => 2,
                'qty' => random_int(1, 10),
            ]);

            foreach (OrderStatusEnum::values() as $status) {

                if ($status == OrderStatusEnum::PENDING) {
                    OrderStatus::create([
                        'order_id' => $order->id,
                        'status' => $status,
                    ]);
                } else {
                    OrderStatus::insert([
                        'order_id' => $order->id,
                        'status' => $status,
                    ]);
                }
            }
        }
    }
}
