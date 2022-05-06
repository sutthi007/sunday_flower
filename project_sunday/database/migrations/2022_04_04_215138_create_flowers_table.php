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
        Schema::create('flowers', function (Blueprint $table) {
            $table->id();
            $table->integer('type_id');
            $table->string('province');
            $table->string('subdistrict');
            $table->integer('price');
            $table->string('nextsend');
            $table->integer('nextsend_price');
            $table->foreign('type_id')->references('id')->on('type_service')->onDelete('cascade');
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
        Schema::dropIfExists('flowers');
    }
};
