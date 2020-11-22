<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Jugadores extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jugadores=DB::table('jugador')
        ->join('localidad', 'localidad.id', '=', 'jugador.idLocalidad')
        ->join('equipo', 'equipo.id', '=', 'jugador.idEquipo')
        ->join('posicion', 'posicion.id', '=', 'jugador.idPosicion')
        ->select('jugador.*', 'localidad.Nombre as NomLocalidad', 'equipo.Nombre as NomEquipo','posicion.Nombre as NomPosicion')
        ->get();

       /*  var_dump($jugadores);
        die(); */
        return view('jugadores.index',[
            'jugadores'=>$jugadores
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
        //
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
        $jugador=DB::table('jugador')->where('id','=',$id)->first();
        $idEquipo=$jugador->idEquipo;//Id del equipo al que pertenecia el jugador, debo enviarlo por la action
        
        $jugador=DB::table('jugador')->where ('id',$id)->delete();

        return redirect()->action('Equipos@show',['id'=>$idEquipo])->with('status','Jugador Eliminado Correctame');
    }
}
