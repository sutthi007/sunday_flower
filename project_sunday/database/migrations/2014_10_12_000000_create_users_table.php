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
            $table->id();
            $table->string('name');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role',['admin','employee','owner']);
            $table->date('birthday');
            $table->string('IDuser')->unique();
            $table->string('city');
            $table->string('subdistrict');
            $table->string('province');
            $table->string('address');
            $table->string('phone');
            $table->string('phone_relative')->nullable();
            $table->string('Idcard');
            $table->integer('zipcode');
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
