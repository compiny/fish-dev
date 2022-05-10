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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nameOff');
            $table->string('inn');
            $table->string('kpp');
            $table->string('ogrn');
            $table->string('urAdr')->nullable();;
            $table->string('mailAdr')->nullable();;
            $table->string('factAdr')->nullable();;
            $table->string('email')->nullable();;
            $table->string('phones')->nullable();;
            $table->string('web')->nullable();;
            $table->string('about')->nullable();;
            $table->date('dateReg')->nullable();;
            $table->date('dateClose')->nullable();
            $table->bigInteger('dirID')->unsigned();
            $table->foreign('dirID')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->bigInteger('buhID')->unsigned();
            $table->foreign('buhID')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->bigInteger('ownerID')->unsigned();
            $table->foreign('ownerID')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('companies');
    }
};
