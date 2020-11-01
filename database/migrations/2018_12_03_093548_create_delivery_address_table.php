<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_address', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id');
            $table->string('users_email');
            $table->string('name');
            $table->string('email');
            $table->string('postal_address');
            $table->string('city');
            $table->string('country');
            $table->string('buildingname');
            $table->string('phone_no');

            $table->string('soldToAddr1')->nullable();
            $table->string('soldToAddr2')->nullable();
            $table->string('soldToAddr3')->nullable();
            $table->string('ShipToAddr1')->nullable();
            $table->string('ShipToAddr2')->nullable();
            $table->string('ShipToAddr3')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivery_address');
    }
}
