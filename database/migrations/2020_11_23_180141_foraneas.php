<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Foraneas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('equipo', function (Blueprint $table) {
            $table->unsignedInteger('idLocalidad');
            $table->foreign('idLocalidad')->references('id')->on('localidad');
            $table->integer('idCategoria')->unsigned();
            $table->foreign('idCategoria')->references('id')->on('categoria');
            
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
