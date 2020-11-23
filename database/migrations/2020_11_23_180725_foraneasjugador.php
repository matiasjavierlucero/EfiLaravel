<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Foraneasjugador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jugador', function (Blueprint $table) {
           
            $table->unsignedInteger('idLocalidad');
            $table->foreign('idLocalidad')->references('id')->on('localidad');
            $table->unsignedInteger('idEquipo');
            $table->foreign('idEquipo')->references('id')->on('equipo');
            $table->integer('idPosicion')->unsigned();
            $table->foreign('idPosicion')->references('id')->on('posicion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
