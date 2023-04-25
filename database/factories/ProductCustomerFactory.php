<?php

namespace Database\Factories;

use App\Models\ProductCustomer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProductCustomer>
 */
class ProductCustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'price' => fake()->randomNumber(),
        ];
    }
}
