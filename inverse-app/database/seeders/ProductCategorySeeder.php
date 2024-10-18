<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    public function run()
    {
        ProductCategory::create(['name' => 'Chuck 70']);
        ProductCategory::create(['name' => 'Classic Chuck']);
        ProductCategory::create(['name' => 'Sport']);
        ProductCategory::create(['name' => 'Elevation']);
    }
}
