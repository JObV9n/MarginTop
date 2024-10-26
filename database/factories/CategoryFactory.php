<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected static $categoryNames = ['Conference', 'Seminar', 'Workshop', 'Webinar', 'Meetup'];
    protected static $isCategoryNamesUsed = false;
    public function definition(): array
    {
        if (!self::$isCategoryNamesUsed && count(self::$categoryNames) > 0) // if category names not used & if category names left
         {
            $name = array_pop(self::$categoryNames);
            if(count(self::$categoryNames) == 0) {
                self::$isCategoryNamesUsed = true;
            }
            return [
                'name' => $name,
            ];
        }
        return [
            'name' => fake()->word().' '.fake()->randomNumber(3, true),//chioce of random word along with num
        ];
    }

    public function resetCategoryNames()
    {
        self::$categoryNames = ['Conference', 'Seminar', 'Workshop', 'Webinar', 'Meetup'];
        self::$isCategoryNamesUsed = false;
        return $this;
    }
}
