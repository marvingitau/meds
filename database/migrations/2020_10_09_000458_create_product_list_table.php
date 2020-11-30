<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductlistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_list', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('parent_id')->nullable();
            $table->string('Product_class')->nullable();
            $table->text('Description')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->rememberToken();

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
        Schema::dropIfExists('Productlist');
    }
}
