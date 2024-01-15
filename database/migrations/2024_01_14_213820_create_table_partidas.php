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
        Schema::create('partidas', function (Blueprint $table) {
            $table->id('id_partidas');
            $table->unsignedBigInteger('id_juegos');
            $table->foreign('id_juegos')->references('id_juegos')->on('juegos');

            $table->unsignedBigInteger('id_usuarios');
            $table->foreign('id_usuarios')->references('id')->on('usuarios');

            $table->string('salon', 255);
            $table->date('fecha');
            $table->dateTime('hora_inicio');
            $table->dateTime('hora_fin');
            $table->string('estado', 255);
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
        Schema::dropIfExists('partidas');
    }
};
