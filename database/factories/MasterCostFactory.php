<?php

namespace Database\Factories;

use App\Models\MasterCost;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<MasterCost>
 */
class MasterCostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
        ];
    }
}
