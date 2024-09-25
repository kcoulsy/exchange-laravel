<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Currency;
use App\Models\User;
use App\Models\Listing;
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
        $slug = uniqid() . '-' . \Str::slug($title);

        return [
            'title' => $title,
            'subtitle' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 0, 100000),
            'is_por' => $this->faker->boolean(),
            'slug' => $slug,
            'description' => $this->faker->paragraph(2),
            'model' => $this->faker->sentence(),
            'location' => $this->faker->sentence(),
            'currency_id' => Currency::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'condition_id' => Condition::all()->random()->id,
            'brand_id' => Brand::all()->random()->id,
            'user_id' => User::all()->random()->id,
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    // public function configure()
    // {

    //     return $this->afterCreating(function (Listing $item) {

    //         $files = array_values(array_diff(scandir(__DIR__ . '/../../public/seed-images'), array('.', '..')));
    //         $num_images = rand(1, 4);

    //         for ($i = 0; $i < $num_images; $i++) {
    //             // randome image from seed-images
    //             $slug = $files[rand(0, count($files) - 1)];

    //             $url = public_path('/seed-images/' . $slug);
    //             $item
    //                 ->addMedia($url)
    //                 ->preservingOriginal()
    //                 ->withResponsiveImages()
    //                 ->toMediaCollection('images');
    //         }
    //     });
    // }

}