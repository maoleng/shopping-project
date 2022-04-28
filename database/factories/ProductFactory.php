<?php

namespace Database\Factories;

use App\Models\Manufacturer;
use App\Models\Subtype;
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
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'price' => $this->faker->numberBetween($min = 1000, $max = 9000),
            'description' => $this->faker->name,
            'origin' => $this->faker->country,
            'insurance' => $this->faker->numberBetween($min = 1, $max = 24) . 'months',
            'quantity' => $this->faker->numberBetween($min = 20, $max = 100),
            'video' => $this->faker->url,
            'subtype_id' => Subtype::query()->inRandomOrder()->value('id'),
            'manufacturer_id' => Manufacturer::query()->inRandomOrder()->value('id'),



        ];
    }
}
