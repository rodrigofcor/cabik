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
        Schema::create('users', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->boolean('show_email')->default(0);
            $table->string('phone', 10)->nullable();
            $table->boolean('show_phone')->default(0);
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('pix_type_id')->nullable();
            $table->string('pix')->nullable();
            $table->boolean('show_pix')->default(0);
            $table->string('profile_photo');

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
};
