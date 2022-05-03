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
        Schema::create('store_bundles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('bundle_id')
                ->unsigned();
            $table->foreign('bundle_id')
                ->references('id')
                ->on('bundles')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->bigInteger('dev_id')
                ->unsigned();
            $table->foreign('dev_id')
                ->references('id')
                ->on('devs')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
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
        Schema::dropIfExists('store_bundles');
    }
};
