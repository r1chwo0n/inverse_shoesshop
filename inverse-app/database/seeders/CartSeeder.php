<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // สมมติว่าเราจะดึงผู้ใช้คนแรกจากตาราง users
        $user = User::first(); // หรือคุณสามารถดึงตามเงื่อนไขที่ต้องการได้
        // สมมติว่าเราจะดึงสินค้าจากตาราง products
        $products = Product::take(3)->get(); // ดึงสินค้าสามชิ้นแรกจากฐานข้อมูล

        // เพิ่มสินค้าแต่ละชิ้นลงในรถเข็นของผู้ใช้
        foreach ($products as $product) {
            Cart::create([
                'user_id' => 2,   // ID ของผู้ใช้
                'product_id' => $product->id,   // ID ของสินค้า
                'quantity' => rand(1, 5),   // กำหนดจำนวนสินค้าแบบสุ่มระหว่าง 1 ถึง 5
            ]);
        }
    }
}
