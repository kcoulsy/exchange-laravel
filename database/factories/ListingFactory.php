<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Currency;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence();
        $slug = \Str::slug($title);
        return [
            'title' => $title,
            'subtitle' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 0, 100000),
            'is_por' => $this->faker->boolean(),
            'slug' => $slug,
            'description' => $this->faker->paragraph(),
            'model' => $this->faker->sentence(),
            'location' => $this->faker->sentence(),
            'currency_id' => Currency::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'condition_id' => Condition::all()->random()->id,
            'brand_id' => Brand::all()->random()->id,
            'user_id' => User::all()->random()->id,


        ];
    }
}