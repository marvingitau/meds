<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('CustomerCode')->nullable();
            $table->string('name');
            $table->string('email','191')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('verified')->default(false);
            $table->boolean('approved')->default(false);

            $table->string('password');
            // $table->string('password_confirmation');
            $table->tinyInteger('admin')->nullable();
            $table->tinyInteger('role')->nullable();
            $table->tinyInteger('staff')->nullable();
            // aux data
            $table->string('form_title')->nullable();
            $table->string('name_of_institution')->nullable();
            $table->string('postal_address')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('buildingname')->nullable();
            $table->string('streetname')->nullable();
            $table->string('town')->nullable();
            $table->string('country')->nullable();
            $table->string('qualification')->nullable();
            $table->string('licence_no')->nullable();
            $table->string('doctors_name')->nullable();
            $table->string('doctors_licence_no')->nullable();
            $table->string('resident')->nullable();
            $table->string('fulltime')->nullable();
            $table->string('periodicsupervision')->nullable();

            $table->text('Branch')->nullable();
            $table->text('Salesperson')->nullable();
            $table->text('Terms')->nullable(); //invoice terms



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
        Schema::dropIfExists('users');
    }
}
