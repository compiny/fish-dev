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
            $table->string('urAdr');
            $table->string('mailAdr');
            $table->string('factAdr');
            $table->string('email');
            $table->string('phones');
            $table->string('web');
            $table->string('about');
            $table->date('dateReg');
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
