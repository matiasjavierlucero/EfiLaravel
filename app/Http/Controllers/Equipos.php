<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\EquipoNuevo;
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
        $categorias=DB::table('categoria')
       ->orderBy('Id','asc')
       ->get();
        $localidades=DB::table('localidad')
       ->orderBy('Nombre','asc')
       ->get();
        $equipos=DB::table('equipo')
        ->orderBy('Nombre','asc')
        ->join('localidad', 'equipo.idLocalidad', '=', 'localidad.id')
        ->join('categoria', 'equipo.idCategoria', '=', 'categoria.id')
        ->select('equipo.*', 'localidad.Nombre as NomLocalidad', 'categoria.Nombre as NomCategoria')
        ->get();


        return view('equipos.nuevoequipo',[
            'equipos'=>$equipos,
            'categorias'=>$categorias,
            'localidades'=>$localidades,
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
        /* var_dump($request->input('LocalidadEquipo'));
        die(); */
        $equipo=DB::table('equipo')->insert(array(
            'nombre' => $request->input('NombreEquipo'),
            'idLocalidad'=>$request->input('LocalidadEquipo'),
            'idCategoria'=>$request->input('CategoriaEquipo')
        ));
        $NombreEquipo=$request->input('NombreEquipo');
        
        //Envio de email
        Mail::to('j.lucero@itecriocuarto.org.ar')->send(new EquipoNuevo($NombreEquipo));

        return redirect()->action('Equipos@create')->with('success','Equipo Cargado Correctame');
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
        //Datos para el Fomulario
        $equipo=DB::table('equipo')
        ->orderBy('Nombre','asc')
        ->join('localidad', 'equipo.idLocalidad', '=', 'localidad.id')
        ->join('categoria', 'equipo.idCategoria', '=', 'categoria.id')
        ->select('equipo.*', 'localidad.Nombre as NomLocalidad',
                'localidad.id as IdLocalidad', 
                'categoria.Nombre as NomCategoria',
                'categoria.id as IdCategoria')
        ->where('equipo.id','=',$id)
        ->first();
      

        //Datos para la vista
        $equipos=DB::table('equipo')
        ->orderBy('Nombre','asc')
        ->join('localidad', 'equipo.idLocalidad', '=', 'localidad.id')
        ->join('categoria', 'equipo.idCategoria', '=', 'categoria.id')
        ->select('equipo.*', 'localidad.Nombre as NomLocalidad',
                'localidad.id as IdLocalidad', 
                'categoria.Nombre as NomCategoria',
                'categoria.id as IdCategoria')
        ->get();
        

        $categorias=DB::table('categoria')
       ->orderBy('Id','asc')
       ->get();

        $localidades=DB::table('localidad')
       ->orderBy('Nombre','asc')
       ->get();
       
        return view('equipos.nuevoequipo',[
            'equipo'=>$equipo,
            'equipos'=>$equipos,
            'categorias'=>$categorias,
            'localidades'=>$localidades
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //Almaceno los parametros para hacer mas limpio el update
        $idEquipo=$request->input('id');
        $nombreEquipo=$request->input('NombreEquipo');
        $localidadEquipo=$request->input('LocalidadEquipo');
        $categoriaEquipo=$request->input('CategoriaEquipo');

        $equipo=DB::table('equipo')
        ->where('equipo.id','=',$idEquipo)
        ->update(array(
            'Nombre'=>$nombreEquipo,
            'idLocalidad'=>$localidadEquipo,
            'idCategoria'=>$categoriaEquipo
        ));
        return redirect()->action('Equipos@create',[
            'Mensaje'=>'Equipo Modificado Correctamente'
        ]);
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
