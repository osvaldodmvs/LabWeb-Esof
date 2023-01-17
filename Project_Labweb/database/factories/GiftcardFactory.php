<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Giftcard>
 */
class GiftcardFactory extends Factory
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
            'start_date' => fake()->dateTimeBetween('now', '+1 year'),
            'end_date' => fake()->dateTimeBetween('start_date', '+1 year'),
            'code' => fake()->regexify('[A-Z]{5}[0-9]{5}'),
            'value' => fake()->randomElement([10, 15, 20, 25, 30]),
            'recipient' => fake()->randomElement(['36854@ufp.edu.pt', '35194@ufp.edu.pt', NULL]),
            'is_active' => fake()->randomElement([true, false]),
        ];
    }
}
