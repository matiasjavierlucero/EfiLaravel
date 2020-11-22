<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('head');
});

//Rutas de Localidad

Route::group(['prefix'=>'localidades'],function(){
    Route::get('index','Localidad@index');
});
//Rutas de Categorias
Route::group(['prefix'=>'categorias'],function(){
    Route::get('index','Categoria@index');
    Route::get('categoria/{id}','Categoria@show');

});
//Rutas de Equipos
Route::group(['prefix'=>'equipos'],function(){
    Route::get('index','Equipos@index');
    Route::get('equipo/{id}','Equipos@show');
});
//Rutas de Jugadores



