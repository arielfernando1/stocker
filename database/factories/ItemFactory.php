<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition(): array
    {
        return [
            'is_service' => $this->faker->boolean,
            'category_id' => $this->faker->numberBetween(1, 24),
            'name' => $this->faker->word,
            'brand' => $this->faker->word,
            'stock' => $this->faker->numberBetween(0, 100),
            'cost' => $this->faker->randomFloat(2, 0, 1000),
            'price' => $this->faker->randomFloat(2, 0, 1000),
            'description' => $this->faker->sentence,
        ];
    }
}
