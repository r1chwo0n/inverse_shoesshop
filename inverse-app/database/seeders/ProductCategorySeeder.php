<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    public function run()
    {
        ProductCategory::create(['id' => 1, 'name' => 'Chuck 70']);
        ProductCategory::create(['id' => 2, 'name' => 'Classic Chuck']);
        ProductCategory::create(['id' => 3, 'name' => 'Sport']);
        ProductCategory::create(['id' => 4, 'name' => 'Elevation']);
    }
}
