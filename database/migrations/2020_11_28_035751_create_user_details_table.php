<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->string('annual_income')->nullable();
            $table->tinyInteger('occupation')->nullable();
            $table->tinyInteger('family_type')->nullable();
            $table->tinyInteger('manglik')->nullable();
            $table->string('annual_income_preference_from')->nullable();
            $table->string('annual_income_preference_to')->nullable();
            $table->string('family_type_preference')->nullable();
            $table->string('occupation_preference')->nullable();
            $table->integer('manglik_preference')->nullable();
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
        Schema::dropIfExists('user_details');
    }
}
