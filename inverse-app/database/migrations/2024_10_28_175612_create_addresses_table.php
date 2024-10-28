<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('address_line_1', 100);                    // Address Line 1
            $table->string('address_line_2', 100)->nullable();        // Address Line 2
            $table->string('address_line_3', 100)->nullable();        // Address Line 3
            $table->string('street')->nullable();  //street
            $table->string('subdistrict', 50);         // Subdistrict
            $table->string('district', 50);            // District
            $table->string('province', 50);            // Province
            $table->string('postal_code', 10);         // Postal code
            $table->string('country', 50);         // Country
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}

