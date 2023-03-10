<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
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
            'status' => fake()->randomElement(['paid', 'pending', 'failed']),
            'value' => fake()->randomFloat(2, 0, 100),
            'method' => fake()->randomElement(['credit_card', 'paypal', 'bank_transfer', 'mbway', 'giftcard', 'balance']),
        ];
    }
}
