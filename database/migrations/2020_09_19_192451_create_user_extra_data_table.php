<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserExtraDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_extra_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('order_authorized_name')->nullable();
            $table->string('order_authorized_qualification')->nullable();
            $table->string('order_authorized_licence_no')->nullable();
            $table->string('payment_authorizedpersonelname')->nullable();
            $table->string('payment_authorizedpersoneldesignation')->nullable();
            $table->string('payment_authorizedpersonelsign')->nullable();
            $table->string('guarantorname')->nullable();
            $table->string('guarantordesignation')->nullable();
            $table->string('guarantorsignature')->nullable();
            $table->string('filename')->nullable();
            $table->string('personinchargefile')->nullable();
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
        Schema::dropIfExists('user_extra_data');
    }
}
