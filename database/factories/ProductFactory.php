<?php

namespace Database\Factories;

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
        $productImages = [
            '/storage/images/products/0.jpg',
            '/storage/images/products/1.jpg',
            '/storage/images/products/2.jpg',
            '/storage/images/products/3.jpg',
            '/storage/images/products/4.jpg',
            '/storage/images/products/Product_1000.png',
            '/storage/images/products/furandana.jpg',
            '/storage/images/products/mixture-dalmoth.jpg',
            '/storage/images/products/moong-dal-namkeen.jpg',
        ];

        return [
            'name' => $this->faker->words(3, true),
            'photo' => $this->faker->randomElement($productImages),
            'description' => $this->faker->paragraph(3),
            'in_stock' => $this->faker->boolean(80), // 80% chance of being in stock
            'home' => $this->faker->boolean(30), // 30% chance of being featured on home
            'retail_price' => $this->faker->randomFloat(2, 100, 2000),
            'discount' => $this->faker->numberBetween(0, 50),
            'price' => $this->faker->numberBetween(50, 1500),
            'category' => $this->faker->numberBetween(1, 5),
            'brand_name' => $this->faker->company(),
            'size' => $this->faker->randomElement(['250g', '500g', '1kg', '2kg', '5kg']),
            'qr_code' => $this->faker->optional()->uuid(),
            'qr_path' => $this->faker->optional()->filePath(),
            'bar_path' => $this->faker->optional()->filePath(),
            'bar_code' => $this->faker->optional()->ean13(),
            'bar_number' => $this->faker->optional()->numerify('############'),
        ];
    }
}
