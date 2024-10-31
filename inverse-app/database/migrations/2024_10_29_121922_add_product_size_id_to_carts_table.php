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
        Schema::table('carts', function (Blueprint $table) {
            $table->unsignedBigInteger('product_size_id')->after('product_id');

            // If you have a foreign key relationship, you can add this:
            $table->foreign('product_size_id')->references('id')->on('product_sizes');
        });
    }

    public function down()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->dropForeign(['product_size_id']);
            $table->dropColumn('product_size_id');
        });
    }

};
