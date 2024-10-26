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
            'title' => fake()->randomElement(['Tuts Nepal Conference', 'GSOC 2025', 'Hiro ML RoadShine', 'Laracon 11', 'PHPCON 8.3', 'Meta DevCon 2025','EVO Esports','PSCON 2025-Berlin']),
            'description' => fake()->paragraph(),
            'date' => fake()->dateTimeBetween('now', '+1 month'),
            'location' => fake()->address(),
            'category_id' => $category->random(),
        ];
    }
}
