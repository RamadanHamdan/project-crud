<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition(): array
    {
        return [
            'image' => fake()->image(),
            'product_name' => fake()->sentence(),
            'category' => fake()->sentence(),
            'brand' => fake()->sentence(),
            'description' => fake()->text(),
            'price' => fake()->text(),
            'quantity' => fake()->text(),
        ];
    }
}