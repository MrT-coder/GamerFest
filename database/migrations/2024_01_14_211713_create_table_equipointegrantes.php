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
        Schema::create('equipointegrantes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usu');
            $table->unsignedBigInteger('id_equ');
            $table->boolean('isLider');

            $table->foreign('id_usu')->references('id')->on('usuarios');
            $table->foreign('id_equ')->references('id')->on('equipos');
            
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
        Schema::dropIfExists('equipointegrantes');
    }
};
