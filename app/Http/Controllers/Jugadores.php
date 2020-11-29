<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Monolog\Logger;

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
        $equipos=DB::table('equipo')
       ->orderBy('Id','asc')
       ->get();
        $posiciones=DB::table('posicion')
       ->orderBy('Nombre','asc')
       ->get();
        $localidades=DB::table('localidad')
       ->orderBy('Nombre','asc')
       ->get();
        $jugadores=DB::table('jugador')
        ->orderBy('Nombre','asc')
        ->join('localidad', 'jugador.idLocalidad', '=', 'localidad.id')
        ->join('posicion', 'jugador.idPosicion', '=', 'posicion.id')
        ->join('equipo', 'jugador.idEquipo', '=', 'equipo.id')
        ->select('jugador.*', 'localidad.Nombre as NomLocalidad', 'equipo.Nombre as NomEquipo','posicion.Nombre as NomPosicion','localidad.id as IdLocalidad','posicion.id as IdPosicion','equipo.id as IdEquipo')
        ->get();


        return view('jugadores.nuevojugador',[
            'equipos'=>$equipos,
            'posiciones'=>$posiciones,
            'localidades'=>$localidades,
            'jugadores'=>$jugadores,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jugador=DB::table('jugador')->insert(array(
            'Apellido' => $request->input('ApellidoJugador'),
            'Nombre' => $request->input('NombreJugador'),
            'idLocalidad'=>$request->input('LocalidadJugador'),
            'idEquipo'=>$request->input('EquipoJugador'),
            'idPosicion'=>$request->input('PosicionJugador'),
            'dorsal'=>$request->input('dorsal'),
            'dni'=>'0',
            'photo'=>'none',
        ));
        Log::channel('slack')->critical('Se agrego un nuevo Jugador');
        return redirect()->action('Jugadores@create')->with('success','Jugador Creado Correctamente');
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
        $jugador=DB::table('jugador')
                    ->where('id','=',$id)
                    ->first();

        $idEquipo=$jugador->idEquipo;//Id del equipo al que pertenecia el jugador, debo enviarlo por la action
        
        $jugador=DB::table('jugador')->where ('id',$id)->delete();

        return redirect()->action('Equipos@show',
                            [
                            'id'=>$idEquipo
                            ])
                            ->with('status','Jugador Eliminado Correctame');
    }
}
