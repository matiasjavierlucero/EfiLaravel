<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fixture;

class ApiFixtureController extends Controller
{
    public function index()
    {
        $Fixture = Fixture::with('equipoLocal','equipoVisitante','categoria')->get();          
        return $Fixture;
        
    }
    
}
