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
            $table->string('address_line_1');                    // Address Line 1
            $table->string('address_line_2')->nullable();        // Address Line 2
            $table->string('address_line_3')->nullable();        // Address Line 3
            $table->string('street')->nullable();  //street
            $table->string('subdistrict');         // Subdistrict
            $table->string('district');            // District
            $table->string('province');            // Province
            $table->string('country');         // Country
            $table->string('postal_code');         // Postal code
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}

