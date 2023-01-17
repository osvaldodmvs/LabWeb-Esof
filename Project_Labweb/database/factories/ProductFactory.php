<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->unique()->randomElement(['KATWALK','V-STATION','RACING','PACK DISCOVERY','XTREME','XBIKE','FLY','ESCAPE ROOM','PACK RACING']),
            'description' => fake()->text(500),
            'price' => fake()->randomElement(['5','10','15','20','22','30']),
            'capacity' => fake()->randomElement(['1','2','3','4',]),
            'duration' => fake()->randomElement(['5','10','15','20','30','60']),
            'image' => fake()->imageUrl(640, 480, 'animals', true, 'Faker'),
            'is_pack' => fake()->randomElement(['0','1']),
        ];
    }
}
