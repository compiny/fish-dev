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
        Schema::create('store_services', function (Blueprint $table) {
            $table->id();
            $table->foreign('dev_id')->references('id')->on('devs')->cascadeOnDelete()->cascadeOnUpdate();
            $table->bigInteger('dev_id')->unsigned();
            $table->foreign('service_id')->references('id')->on('services')->cascadeOnDelete()->cascadeOnUpdate();
            $table->bigInteger('service_id')->unsigned();
            $table->float('price');
            $table->float('qn');
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
        Schema::dropIfExists('store_services');
    }
};
