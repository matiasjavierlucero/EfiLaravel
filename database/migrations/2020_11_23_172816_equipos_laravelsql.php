<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EquiposLaravelsql extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('equipo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre');
            //$table->integer('idLocalidad');
            //$table->integer('idCategoria');
            //$table->unsignedInteger('idLocalidad');
            //$table->foreign('idLocalidad')->references('id')->on('localidad');
            //$table->unsignedInteger('idCategoria');
            //$table->foreign('idCategoria')->references('id')->on('categoria');
            //$table->integer('idCategoria')->unsigned();
            //$table->foreign('idCategoria')->references('id')->on('categoria');
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
        Schema::drop('equipo');
    }
}
