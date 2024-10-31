<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id(); // orderDetail_id
            $table->foreignId('order_id')->constrained()->onDelete('cascade'); // เชื่อมกับ order_id
            $table->unsignedBigInteger('product_id'); // product_id
            $table->decimal('unit_price', 10, 2); // ราคาต่อหน่วย
            $table->integer('quantity'); // จำนวนสินค้า
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
