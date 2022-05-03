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
        Schema::create('devs', function (Blueprint $table) {
            $table->id();
            $table->string('n')->nullable();
            $table->dateTime('date')->nullable();
            $table->dateTime('final')->nullable();
            $table->text('troubles')->nullable();
            $table->text('address')->nullable();
            $table->text('phone')->nullable();
            $table->bigInteger('customer_id')
                ->unsigned();
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->bigInteger('type_id')
                ->unsigned();
            $table->foreign('type_id')
                ->references('id')
                ->on('types')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->bigInteger('vendor_id')
                ->unsigned();
            $table->foreign('vendor_id')
                ->references('id')
                ->on('vendors')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('sn')
                ->nullable();
            $table->boolean('notification')
                ->default(false);
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
        Schema::dropIfExists('devs');
    }
};
