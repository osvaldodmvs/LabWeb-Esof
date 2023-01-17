<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'order_id' => Order::all()->random()->id,
            'product_id' => Product::all()->random()->id,
            'start_date' => fake()->dateTimeInInterval('now', '+1 hour'),
            'end_date' => fake()->dateTimeInInterval('now', '+1 hour'),
            'quantity' => fake()->numberBetween(1, 4),
            'total' => fake()->randomFloat(2, 1, 100)
        ];
    }

}
