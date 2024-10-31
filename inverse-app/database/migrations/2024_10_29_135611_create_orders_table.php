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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // order_id
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // เชื่อมกับ user_id
            $table->timestamp('order_date_time')->nullable();
            $table->decimal('subtotal', 10, 2); // สินค้า
            $table->decimal('discount', 10, 2)->default(0); // ส่วนลด
            $table->decimal('total', 10, 2); // ราคารวม
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
