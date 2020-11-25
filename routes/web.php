<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Monolog\Logger;
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

Route::get('/index', function () {
    return view('index')->middleware('auth');
});

//Rutas de Localidad

Route::group(['prefix'=>'localidades'],function(){
    Route::get('index','Localidad@index')->middleware('auth');
});
//Rutas de Categorias
Route::group(['prefix'=>'categorias'],function(){
    Route::get('index','Categoria@index')->middleware('auth');
    Route::get('categoria/{id}','Categoria@show')->middleware('auth');
});

//Rutas de Equipos
Route::group(['prefix'=>'equipos'],function(){
    Route::get('index','Equipos@index')->middleware('auth');
    Route::get('equipo/{id}','Equipos@show')->middleware('auth');
    Route::get('nuevoequipo','Equipos@create')->middleware('auth');
    Route::post('guardar','Equipos@store')->middleware('auth');
    Route::get('editar/{id}','Equipos@edit')->middleware('auth');
    Route::post('update','Equipos@update')->middleware('auth');
});

//Rutas de Jugadores
Route::group(['prefix'=>'jugadores'],function(){
    Route::get('index','Jugadores@index')->middleware('auth');
    Route::get('delete/{id}','Jugadores@destroy')->middleware('auth');
    Route::get('nuevojugador','Jugadores@create')->middleware('auth');
    Route::post('guardar','Jugadores@store')->middleware('auth');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
