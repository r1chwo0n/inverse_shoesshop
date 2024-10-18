<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use App\Models\ProductCategory;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Fetch category IDs
        $chuck70 = ProductCategory::where('name', 'Chuck 70')->first()->id;
        $classicChuck = ProductCategory::where('name', 'Classic Chuck')->first()->id;
        $sport = ProductCategory::where('name', 'Sport')->first()->id;
        $elevation = ProductCategory::where('name', 'Elevation')->first()->id;

        // Chuck 70 Category Products
        Product::create([
            'name' => 'Chuck 70 Embroidered Stars',
            'category_id' => $chuck70,
            'price' => 2890.00,
            'color' => 'Red',
            'stock' => 5,
            'description' => 'The premium Chuck 70 gets a little starry.',
            'image_path' => 'chuck70/Chuck 70 Embroidered Stars.jpg'
        ]);

        Product::create([
            'name' => 'Chuck 70 Plus',
            'category_id' => $chuck70,
            'price' => 3400.00,
            'color' => 'Black',
            'stock' => 10,
            'description' => 'Distorted details and asymmetrical lines reimagine the premium Chuck 70 for cant-be-missed style.',
            'image_path' => 'chuck70/Chuck 70 Plus.jpg'
        ]);

        Product::create([
            'name' => 'Chuck 70 Sketch',
            'category_id' => $chuck70,
            'price' => 2720.00,
            'color' => 'Blue',
            'stock' => 8,
            'description' => 'These premium Chucks get a cartoon makeover with blown-up and squiggly details.',
            'image_path' => 'chuck70/Chuck 70 Sketch.jpg'
        ]);

        Product::create([
            'name' => 'Chuck 70 Canvas',
            'category_id' => $chuck70,
            'price' => 3500.00,
            'color' => 'Green',
            'stock' => 7,
            'description' => 'The Chuck 70 offers a blank canvas for you to tell your own stories.',
            'image_path' => 'chuck70/Chuck 70 Canvas.jpg'
        ]);

        // Classic Chuck Category Products
        Product::create([
            'name' => 'Chuck Taylor All Star',
            'category_id' => $classicChuck,
            'price' => 2500.00,
            'color' => 'Pink',
            'stock' => 4,
            'description' => 'The ultimate classic sneaker. The Chuck Taylor All Star High Top in red is an iconic staple for any wardrobe.',
            'image_path' => 'classicChuck/Chuck Taylor All Star.jpg'
        ]);

        Product::create([
            'name' => 'Chuck Taylor All Star Premium Party',
            'category_id' => $classicChuck,
            'price' => 2400.00,
            'color' => 'Black',
            'stock' => 5,
            'description' => 'Low-profile classic sneaker, the Chuck Taylor Low Top in black delivers all-day comfort with timeless style.',
            'image_path' => 'classicChuck/Chuck Taylor All Star Premium Party.jpg'
        ]);

        Product::create([
            'name' => 'Chuck Taylor All Star Canvas',
            'category_id' => $classicChuck,
            'price' => 2600.00,
            'color' => 'Brown',
            'stock' => 12,
            'description' => 'Elevate your style with the Chuck Taylor All Star Platform sneaker in white, giving a modern twist to a classic.',
            'image_path' => 'classicChuck/Chuck Taylor All Star Canvas.jpg'
        ]);

        Product::create([
            'name' => 'Chuck Taylor All Star Glitter',
            'category_id' => $classicChuck,
            'price' => 2700.00,
            'color' => 'Pink Glitter',
            'stock' => 3,
            'description' => 'The leather version of the classic, offering a durable and sleek look. The Chuck Taylor Leather in navy is a premium option.',
            'image_path' => 'classicChuck/Chuck Taylor All Star Glitter.jpg'
        ]);

        // Sport Category Products
        Product::create([
            'name' => 'Run Star Trainer',
            'category_id' => $sport,
            'price' => 2800.00,
            'color' => 'Blue/Green',
            'stock' => 6,
            'description' => 'Built for comfort and performance, the Chuck Taylor All Star Move High Top is a versatile sneaker for active lifestyles.',
            'image_path' => 'sport/Run Star Trainer.png'
        ]);

        Product::create([
            'name' => 'Star Player 76',
            'category_id' => $sport,
            'price' => 2900.00,
            'color' => 'Pink',
            'stock' => 1,
            'description' => 'A lightweight and flexible mid-top sneaker, designed for on-the-go wear and ultimate mobility.',
            'image_path' => 'sport/Star Player 76.png'
        ]);

        Product::create([
            'name' => 'CONS Fastbreak Pro Leather and Nubuck',
            'category_id' => $sport,
            'price' => 3100.00,
            'color' => 'White/Pink',
            'stock' => 4,
            'description' => 'With innovative CX foam for ultimate comfort, the All Star CX High Top offers a fresh take on the classic silhouette.',
            'image_path' => 'sport/CONS Fastbreak Pro Leather and Nubuck.jpg'
        ]);

        Product::create([
            'name' => 'AS-1 Pro',
            'category_id' => $sport,
            'price' => 3500.00,
            'color' => 'Black',
            'stock' => 9,
            'description' => 'Designed for athletes, the Chuck Taylor High Performance sneaker features enhanced cushioning and support for all-day activities.',
            'image_path' => 'sport/AS-1 Pro.png'
        ]);

        // Elevation Category Products
        Product::create([
            'name' => 'Run Star Hike Platform Sketch',
            'category_id' => $elevation,
            'price' => 3600.00,
            'color' => 'Red',
            'stock' => 3,
            'description' => 'The All Star Lift Clean High Top elevates your style with a bold platform design and a sleek clean finish.',
            'image_path' => 'elevation/Run Star Hike Platform Sketch.jpg'
        ]);

        Product::create([
            'name' => 'Run Star Motion Canvas Platform',
            'category_id' => $elevation,
            'price' => 3800.00,
            'color' => 'Black',
            'stock' => 7,
            'description' => 'Go higher with the Chuck Taylor Platform Plus, offering an extra boost and a playful, colorful design in pink.',
            'image_path' => 'elevation/Run Star Motion Canvas Platform.jpg'
        ]);

        Product::create([
            'name' => 'Chuck Taylor All Star Lift Embroidery',
            'category_id' => $elevation,
            'price' => 3700.00,
            'color' => 'White',
            'stock' => 3,
            'description' => 'The All Star Lift Ripple is all about bold statements with its ridged outsole and striking design, perfect for standing out.',
            'image_path' => 'elevation/Chuck Taylor All Star Lift Embroidery.jpg'
        ]);

        Product::create([
            'name' => 'Run Star Legacy Cx',
            'category_id' => $elevation,
            'price' => 3900.00,
            'color' => 'Brown',
            'stock' => 2,
            'description' => 'The Double Stack platform sneaker in blue takes your style to new heights with an extra lift and a bold design.',
            'image_path' => 'elevation/Run Star Legacy Cx.png'
        ]);
    }
}
