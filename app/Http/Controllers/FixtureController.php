<?php

namespace App\Http\Controllers;

use App\fixture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FixtureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias=DB::table('categoria')->get();
        return view('fixture.index',[
            'categorias'=>$categorias
        ]);
    }

    public function categoria($id)
    {
        $categorias=DB::table('categoria')->get();
        $categoria=DB::table('categoria')->where('id','=',$id)->first();
        $equipos=DB::table('equipo')->where('idCategoria','=',$id)->get();
        $fecha=DB::table('fecha')->get();
        $fixture=DB::table('fixture')
        ->join('equipo','fixture.idLocal', '=', 'equipo.id')
        ->select('fixture.*', 'equipo.Nombre as Nombre')
        ->where('fixture.idCategoria','=',$id)
        ->where('fixture.fecha','=','1')
        ->get();
        
        return view('fixture.index',[
            'categorias'=>$categorias,
            'categoria'=>$categoria,
            'equipos'=>$equipos,
            'fixture'=>$fixture,
            'fecha'=>$fecha,
            'idCategoria'=>$id,
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
     
      $fixture=DB::table('fixture')->insert(array(
            'idLocal' => $request->input('local'),
            'idVisitante'=>$request->input('visitante'),
            'fecha'=>$request->input('fecha'),
            'idCategoria'=>$request->input('categoria'),
        ));
        return redirect()->action('FixtureController@show',[
            'idCategoria'=>$request->input('categoria'),
            'idFecha'=>$request->input('fecha'),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\fixture  $fixture
     * @return \Illuminate\Http\Response
     */
    public function show($idCategoria,$idFecha)
    {
        $categorias=DB::table('categoria')->get();
        $categoria=DB::table('categoria')->where('id','=',$idCategoria)->first();
        $equipos=DB::table('equipo')->where('idCategoria','=',$idCategoria)->get();
        $fecha=DB::table('fecha')->get();
        $fixture=DB::table('fixture')
        ->join('equipo','fixture.idLocal', '=', 'equipo.id')
        ->select('fixture.*', 'equipo.Nombre as Nombre')
        ->where('fixture.idCategoria','=',$idCategoria)
        ->where('fixture.fecha','=',$idFecha)
        ->get();
        
        return view('fixture.index',[
            'categorias'=>$categorias,
            'categoria'=>$categoria,
            'equipos'=>$equipos,
            'fixture'=>$fixture,
            'fecha'=>$fecha,
            'idCategoria'=>$idCategoria,
            'idFecha'=>$idFecha,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\fixture  $fixture
     * @return \Illuminate\Http\Response
     */
    public function edit(fixture $fixture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\fixture  $fixture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, fixture $fixture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\fixture  $fixture
     * @return \Illuminate\Http\Response
     */
    public function destroy(fixture $fixture)
    {
        //
    }
}
