<?php

namespace Database\Seeders;

use App\Models\Cost;
use App\Models\MasterCost;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MasterCost::get(['name']);
        $listPrice = [10000, 15000, 25000];
        $listQty = [1, 3, 5, 10, 25, 46];
        $data = [];
        for ($i = 0; $i < 1000; $i++) {
            $price = $listPrice[array_rand($listPrice)];
            $qty = $listQty[array_rand($listQty)];
            $randomDate = Carbon::createFromTimestamp(rand(
                Carbon::now()->subDays(360)->timestamp,
                Carbon::now()->timestamp
            ));
            $data [] = [
                'name' => MasterCost::all()->random()->name,
                'price' => $price,
                'qty' => $qty,
                'total' => $price * $qty,
                'description' => 'Pengeluaran ' . $i,
                'date' => $randomDate,
                'user_id' => 1,
                'created_at' => $randomDate,
                'updated_at' => $randomDate,
            ];
        }
        foreach (array_chunk($data, 1000) as $chunk) {
            Cost::insert($chunk);
        }
    }
}
