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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('customer_id');
            $table->integer('city_id');
            $table->integer('province_id');
            $table->string('type');
            $table->string('list')->nullable();
            $table->string('sendto')->nullable();
            $table->integer('price_to')->nullable();
            $table->string('amount');
            $table->integer('quantity');
            $table->integer('price');
            $table->string('phone');
            $table->string('tracking');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->enum('status',['order','send','success'])->default('order');
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
};
