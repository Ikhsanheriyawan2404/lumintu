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
        Category::create([
            'name' => 'Room Linen',
            // 'status' => 'Active'
        ]);

        Category::create([
            'name' => 'Room Food and Beverage',
            // 'status' => 'Active'
        ]);

        Category::create([
            'name' => 'Uniform',
            // 'status' => 'Active'
        ]);

        Category::create([
            'name' => 'Pakaian',
            // 'status' => 'Active'
        ]);
    }
}
