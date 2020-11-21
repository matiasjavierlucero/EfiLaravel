<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ExecuteEFI extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
         CREATE TABLE 'localidad'  (
        'id' int(11) NOT NULL AUTO_INCREMENT,
        'nombre' varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
        PRIMARY KEY ('id') USING BTREE
        ) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

        CREATE TABLE 'categoria'  (
        'id' int(11) NOT NULL AUTO_INCREMENT,
        'Nomrbe' varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
        PRIMARY KEY ('id') USING BTREE
        ) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;


        CREATE TABLE 'equipo'  (
        'id' int(11) NOT NULL AUTO_INCREMENT,
        'Nombre' varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
        'idLocalidad' int(11) NOT NULL,
        'idCategoria' int(11) NOT NULL,
        PRIMARY KEY ('id') USING BTREE,
        INDEX 'Localidad'('idLocalidad') USING BTREE,
        INDEX 'Categoria'('idCategoria') USING BTREE,
        CONSTRAINT 'Localidad' FOREIGN KEY ('idLocalidad') REFERENCES 'localidad' ('id') ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT 'Categoria' FOREIGN KEY ('idCategoria') REFERENCES 'categoria' ('id') ON DELETE RESTRICT ON UPDATE RESTRICT
        ) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

            CREATE TABLE 'posicion'  (
        'id' int(11) NOT NULL AUTO_INCREMENT,
        'nombre' varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
        PRIMARY KEY ('id') USING BTREE
        ) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;



        CREATE TABLE 'jugador'  (
        'id' int(11) NOT NULL AUTO_INCREMENT,
        'nombre' varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
        'apellido' varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
        'dorsal' int(2) NOT NULL,
        'idPosicion' int(11) NOT NULL,
        'idLocalidad' int(11) NOT NULL,
        'idEquipo' int(11) NOT NULL,
        PRIMARY KEY ('id') USING BTREE,
        INDEX 'localidadJugador'('idLocalidad') USING BTREE,
        INDEX 'posicionJugador'('idPosicion') USING BTREE,
        INDEX 'equipoJugador'('idEquipo') USING BTREE,
        CONSTRAINT 'equipoJugador' FOREIGN KEY ('idEquipo') REFERENCES 'equipo' ('id') ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT 'localidadJugador' FOREIGN KEY ('idLocalidad') REFERENCES 'localidad' ('id') ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT 'posicionJugador' FOREIGN KEY ('idPosicion') REFERENCES 'posicion' ('id') ON DELETE RESTRICT ON UPDATE RESTRICT
        ) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;
        
        ");
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
