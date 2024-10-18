<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    public function run()
    {
        Size::create(['size' => 'US 6', 'stock' => 10]);
        Size::create(['size' => 'US 7', 'stock' => 20]);
        Size::create(['size' => 'US 8', 'stock' => 15]);
        Size::create(['size' => 'US 9', 'stock' => 25]);
        Size::create(['size' => 'US 10', 'stock' => 30]);
    }
}
