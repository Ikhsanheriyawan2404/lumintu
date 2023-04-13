<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->count(3)->sequence(
            ['name' => 'ROOM LINEN PRICE LIST'],
            ['name' => 'ROOM FOOD AND BEVERAGE PRICE LIST'],
            ['name' => 'UNIFORM PRICE LIST'],
        )->create();
    }
}
