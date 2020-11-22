<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Equipos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $equipos=DB::table('equipo')
       ->orderBy('Nombre','asc')
       ->get();

        return view('equipos.index',[
            'equipos'=>$equipos
        ]);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $equipo=DB::table('equipo')->where('id','=',$id)->first();
        $jugadores=DB::table('jugador')
        ->join('localidad', 'localidad.id', '=', 'jugador.idLocalidad')
        ->join('equipo', 'equipo.id', '=', 'jugador.idEquipo')
        ->join('posicion', 'posicion.id', '=', 'jugador.idPosicion')
        ->select('jugador.*', 'localidad.Nombre as NomLocalidad', 'equipo.Nombre as NomEquipo','posicion.Nombre as NomPosicion')
        ->where('idEquipo','=',$id)->get();

       /*  var_dump($jugadores);
        die(); */
        return view('equipos.equipo',[
            'equipo'=>$equipo,
            'jugadores'=>$jugadores
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
