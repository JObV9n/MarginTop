<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category = Category::pluck('id');
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'date' => fake()->dateTimeBetween('now', '+1 month'),
            'location' => fake()->address(),
            'category_id' => $category->random(),
        ];
    }
}
