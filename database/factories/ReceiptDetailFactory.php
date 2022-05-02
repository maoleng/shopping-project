<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Receipt;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReceiptDetail>
 */
class ReceiptDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $random_product_id = Product::query()->inRandomOrder()->value('id');
        $product = Product::query()->find($random_product_id);
        return [
            'product_id' => $product->id,
            'receipt_id' => Receipt::query()->inRandomOrder()->value('id'),
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $this->faker->randomDigit()
        ];
    }
}
