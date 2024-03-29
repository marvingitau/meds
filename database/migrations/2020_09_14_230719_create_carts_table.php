<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('products_id');
            $table->string('product_name');
            $table->string('product_code');
            $table->string('product_color');
            $table->string('size');
            $table->float('price');
            $table->integer('quantity');
            $table->string('user_email');
            $table->string('session_id');

            $table->integer('item_from')->nullable();

             // syspro data attribs
             $table->integer('itemNumber')->nullable();
             $table->string('itemDesc')->nullable();
             $table->string('itemCode')->nullable();
             $table->float('listPrice')->nullable();
             $table->integer('itemUnits')->nullable();
             $table->integer('Qty')->nullable();
            $table->string('baseCurrency')->nullable();
            // Staff ID no
            $table->string('PONumber')->nullable();
            $table->string('ProductClass')->nullable();



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
        Schema::dropIfExists('carts');
    }
}
