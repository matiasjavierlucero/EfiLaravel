<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixtureRelations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('fixture', function (Blueprint $table) {
           
            $table->unsignedInteger('idCategoria');
            $table->foreign('idCategoria')->references('id')->on('categoria');
            $table->unsignedInteger('idLocal');
            $table->foreign('idLocal')->references('id')->on('equipo');
            $table->unsignedInteger('idVisitante');
            $table->foreign('idVisitante')->references('id')->on('equipo');
            
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
