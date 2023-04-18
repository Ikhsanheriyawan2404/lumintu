<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Cost;
use App\Models\MasterCost;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        for ($i = 0; $i < 100; $i++) {
            $price = $listPrice[array_rand($listPrice)];
            $qty = $listQty[array_rand($listQty)];
            Cost::create([
                'name' => MasterCost::all()->random()->name,
                'price' => $price,
                'qty' => $qty,
                'total' => $price * $qty,
                'description' => 'Pengeluaran ' . $i,
                'date' => Carbon::createFromTimestamp(rand(
                    Carbon::now()->subDays(360)->timestamp,
                    Carbon::now()->timestamp
                )),
                'user_id' => 1,
            ]);
        }
    }
}
