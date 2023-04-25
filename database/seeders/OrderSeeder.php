<?php

namespace Database\Seeders;

use App\Enums\OrderStatusEnum;
use App\Models\Delivery;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Pickup;
use Carbon\Carbon;
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
//        $products = ProductCustomer::get(['id', 'user_id']);
//        $data = [];
//        for ($i = 0; $i < 50; $i++) {
//            $data[] = [
//                'order_number' => 1000 . ($i + 1),
//                'customer_id' => ProductCustomer::get()->random()->user_id,
//                'total_price' => 0,
//                'payment_status' => fake()->randomElement(['unpaid', 'paid']),
//                'status' => fake()->randomElement(['done', 'delivery', 'process', 'pickup', 'pending']),
//                'created_at' => fake()->dateTimeBetween('-1 Month', 'Now'),
//                'updated_at' => now()->toDateString(),
//            ];
//        }
//        foreach (array_chunk($data, $products->count()) as $chunk) {
//            Order::insert($chunk);
//        }
//
//        $products = Order::with(['customer'])->get(['customer_id', 'id', 'created_at']);
//        $orders = Product::with(['product_customers'])->get(['id']);
//        $order = [];
//        for ($i = 0; $i < $products->count(); $i++) {
//            for ($j = 0; $j < 10; $j++) {
//                $order[] = [
//                    'product_customer_id' => $orders->random()->id,
//                    'order_id' => $products[$i]->id,
//                    'qty' => fake()->numberBetween(10, 100),
//                    'created_at' => $products[$i]->created_at,
//                    'updated_at' => $products[$i]->created_at,
//                ];
//            }
//        }
//
//        foreach (array_chunk($order, 10) as $chunk) {
//            BridgeOrderProduct::insert($chunk);
//        }
//
//        $getQty = BridgeOrderProduct::with('order', 'order.customer')->get(['qty', 'order_id']);
//        $getPrice = Product::with(['product_customers'])->get(['price']);
//        foreach ($getOrder as $order) {
//            $price = ($order->id == $order) ? $order->with(['order_details.product_customer'])->get(['']) : 2;
//        }
//        $order->update(['total_price' => ]);
//        for ($i = 0; $i < $getOrder; $i++) {
//        }


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
            ['order_id' => 1, 'status' => 'pending', 'user_id' => random_int(5, 10)],
            ['order_id' => 1, 'status' => 'pickup', 'user_id' => random_int(1, 3)],
            ['order_id' => 1, 'status' => 'process', 'user_id' => random_int(1, 3)],
            ['order_id' => 1, 'status' => 'delivery', 'user_id' => random_int(1, 3)],
            ['order_id' => 1, 'status' => 'done', 'user_id' => random_int(1, 3)],
            ['order_id' => 2, 'status' => 'pending', 'user_id' => random_int(5, 10)],
            ['order_id' => 2, 'status' => 'pickup', 'user_id' => null, 'created_at' => null],
            ['order_id' => 2, 'status' => 'process', 'user_id' => null, 'created_at' => null],
            ['order_id' => 2, 'status' => 'delivery', 'user_id' => null, 'created_at' => null],
            ['order_id' => 2, 'status' => 'done', 'user_id' => null, 'created_at' => null],
        )->create();

        for ($i = 0; $i < 100; $i++) {
            $lastOrder = Order::orderBy('id', 'desc')
                ->first();

            $orderNumber = $lastOrder ? ++$lastOrder->order_number : 10001;

            $order = Order::create([
                'order_number' => $orderNumber,
                'customer_id' => random_int(4, 10),
                'total_price' => 200000,
                'payment_status' => 'paid',
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
                        'user_id' => random_int(5, 10),
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
