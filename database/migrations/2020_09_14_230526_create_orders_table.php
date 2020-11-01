<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id');
            $table->string('users_email',100);
            $table->string('name',100);
            $table->string('postal_address');
            $table->string('city',100);
            $table->string('country',100);
            $table->string('phone_no',100);
            $table->float('shipping_charges');
            $table->string('coupon_code',100);
            $table->string('coupon_amount',100);
            $table->string('order_status',100);
            $table->tinyInteger('order_verify')->default(0);
            $table->string('payment_method',100);
            $table->string('grand_total',100);

            $table->integer('staff_id')->nullable();

            $table->integer('progress_status_whmgr')->nullable();
            $table->integer('progress_status_hr')->nullable();
            $table->integer('progress_status_packaged')->nullable();
            $table->integer('progress_status_ac')->nullable();
            $table->integer('progress_status_dispatch')->nullable();

            $table->integer('order_type')->nullable();

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
        Schema::dropIfExists('orders');
    }
}
