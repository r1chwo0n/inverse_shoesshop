<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductSize;
use Illuminate\Database\Seeder;

class ProductSizeSeeder extends Seeder
{
    public function run()
    {
        $products = Product::all();

        // Define sizes
        $sizes = [
            '4.5',
            '5',
            '5.5',
            '6',
        ];

        foreach ($products as $product) {
            foreach ($sizes as $size) {
                ProductSize::create([
                    'product_id' => $product->id,
                    'size' => $size, // Ensure you are inserting the size directly
                    'stock' => rand(1, 10), // Random stock for example
                ]);
            }
        }
    }
}
