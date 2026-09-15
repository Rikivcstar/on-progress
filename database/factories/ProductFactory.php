<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Product>
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
            'name' => fake()->words(3, true),
            'slug' => fn (array $attrs) => Str::slug($attrs['name']),
            'price' => fake()->numberBetween(10000, 5000000),
            'stock' => fake()->numberBetween(0, 100),
            'category_id' => Category::factory(),
        ];
    }
}
