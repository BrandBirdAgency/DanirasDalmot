<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Make sure we have products first
        $productIds = Product::pluck('id')->toArray();

        if (empty($productIds)) {
            // If no products exist, create some first
            Product::factory(5)->create();
            $productIds = Product::pluck('id')->toArray();
        }

        // Create sample orders
        $orders = [
            [
                'name' => 'Ram Bahadur',
                'email' => 'ram@example.com',
                'phone' => '+977 9841234567',
                'address' => 'Lalitpur-1, Nepal',
                'product_id' => $productIds[0] ?? 1,
                'quantity' => 2,
                'price' => 450.00,
                'status' => 1, // Processing
                'ward_no' => 5,
                'district' => 'Lalitpur',
            ],
            [
                'name' => 'Sita Sharma',
                'email' => 'sita@example.com',
                'phone' => '+977 9857654321',
                'address' => 'Kathmandu-3, Nepal',
                'product_id' => $productIds[1] ?? 2,
                'quantity' => 1,
                'price' => 298.00,
                'status' => 2, // Shipped
                'ward_no' => 12,
                'district' => 'Kathmandu',
            ],
            [
                'name' => 'Hari Poudel',
                'email' => 'hari@example.com',
                'phone' => '+977 9812345678',
                'address' => 'Bhaktapur-7, Nepal',
                'product_id' => $productIds[2] ?? 3,
                'quantity' => 3,
                'price' => 513.00,
                'status' => 3, // Delivered
                'ward_no' => 8,
                'district' => 'Bhaktapur',
            ],
        ];

        foreach ($orders as $order) {
            Order::create($order);
        }

        // Create additional random orders using factory
        Order::factory(25)->create();
    }
}
