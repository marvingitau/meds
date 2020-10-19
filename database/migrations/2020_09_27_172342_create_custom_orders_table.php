<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_orders', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('products_id')->nullable();
            $table->string('product_name')->nullable();
            $table->string('product_code')->nullable();
            $table->string('product_color')->nullable();
            $table->string('size')->nullable();
            $table->float('price')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('user_email')->nullable();
            $table->string('session_id')->nullable();

            $table->integer('users_id')->nullable();
            $table->string('users_email')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('postal_address')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('buildingname')->nullable();
            $table->string('phone_no')->nullable();

            $table->integer('order_id')->nullable();

            $table->tinyInteger('approved')->default(0);
            $table->integer('item_from')->nullable();

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
        Schema::dropIfExists('custom_orders');
    }
}
