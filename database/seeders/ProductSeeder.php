<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create sample products based on a food/snack business
        $products = [
            [
                'name' => 'Daniras Special Mix',
                'photo' => '/storage/images/products/0.jpg',
                'description' => 'A delicious blend of traditional Nepali snacks with a modern twist. Perfect for any occasion.',
                'in_stock' => 1,
                'home' => 1,
                'retail_price' => 250.00,
                'discount' => 10,
                'price' => 225,
                'category' => 1,
                'brand_name' => 'Daniras',
                'size' => '500g',
                'qr_code' => 'QR001',
                'qr_path' => '/storage/qr/qr001.png',
                'bar_path' => '/storage/bar/bar001.png',
                'bar_code' => '1234567890123',
                'bar_number' => '001234567890',
            ],
            [
                'name' => 'Premium Dalmoth',
                'photo' => '/storage/images/products/1.jpg',
                'description' => 'Premium quality dalmoth made with finest ingredients and traditional recipes.',
                'in_stock' => 1,
                'home' => 1,
                'retail_price' => 350.00,
                'discount' => 15,
                'price' => 298,
                'category' => 1,
                'brand_name' => 'Daniras',
                'size' => '1kg',
                'qr_code' => 'QR002',
                'qr_path' => '/storage/qr/qr002.png',
                'bar_path' => '/storage/bar/bar002.png',
                'bar_code' => '1234567890124',
                'bar_number' => '001234567891',
            ],
            [
                'name' => 'Spicy Namkeen',
                'photo' => '/storage/images/products/2.jpg',
                'description' => 'Crispy and spicy namkeen that will satisfy your taste buds.',
                'in_stock' => 1,
                'home' => 0,
                'retail_price' => 180.00,
                'discount' => 5,
                'price' => 171,
                'category' => 2,
                'brand_name' => 'Daniras',
                'size' => '250g',
                'qr_code' => 'QR003',
                'qr_path' => '/storage/qr/qr003.png',
                'bar_path' => '/storage/bar/bar003.png',
                'bar_code' => '1234567890125',
                'bar_number' => '001234567892',
            ],
            [
                'name' => 'Sweet & Salty Mix',
                'photo' => '/storage/images/products/3.jpg',
                'description' => 'Perfect combination of sweet and salty flavors in one package.',
                'in_stock' => 1,
                'home' => 1,
                'retail_price' => 220.00,
                'discount' => 8,
                'price' => 202,
                'category' => 1,
                'brand_name' => 'Daniras',
                'size' => '500g',
                'qr_code' => 'QR004',
                'qr_path' => '/storage/qr/qr004.png',
                'bar_path' => '/storage/bar/bar004.png',
                'bar_code' => '1234567890126',
                'bar_number' => '001234567893',
            ],
            [
                'name' => 'Traditional Bhujia',
                'photo' => '/storage/images/products/4.jpg',
                'description' => 'Authentic traditional bhujia made with age-old recipes.',
                'in_stock' => 0,
                'home' => 0,
                'retail_price' => 200.00,
                'discount' => 0,
                'price' => 200,
                'category' => 2,
                'brand_name' => 'Daniras',
                'size' => '250g',
                'qr_code' => 'QR005',
                'qr_path' => '/storage/qr/qr005.png',
                'bar_path' => '/storage/bar/bar005.png',
                'bar_code' => '1234567890127',
                'bar_number' => '001234567894',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }

        // Create additional random products using factory
        Product::factory(15)->create();
    }
}
