<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20)->nullable();
            $table->text('description')->nullable();
            $table->boolean('special');
            $table->unsignedBigInteger('breed_id');
            $table->string('age_id', 1);
            $table->string('size_id', 1);
            $table->string('sex_id', 1);
            $table->string('castration_id', 1);
            $table->string('objective_id', 1);
            $table->string('user_id');
            $table->timestamps();

            $table->foreign('breed_id')->references('id')->on('breeds');
            $table->foreign('age_id')->references('id')->on('ages');
            $table->foreign('size_id')->references('id')->on('sizes');
            $table->foreign('sex_id')->references('id')->on('sexes');
            $table->foreign('castration_id')->references('id')->on('castrations');
            $table->foreign('objective_id')->references('id')->on('objectives');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pets');
    }
};
