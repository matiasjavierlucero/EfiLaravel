<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Localidad;
use App\Categoria;
use App\Jugadores;
use App\Fixture;

class Equipos extends Model
{
    protected $table = "equipo";
    protected $fillable = ['Nombre'];
    protected $guarded = [];
    protected $primaryKey = 'id';
    
    public function localidad()
    {
        return $this->belongsTo(Localidad::class,'idLocalidad');
    }

    public function categoria()
    {
        return $this->belongsTo(Categorias::class,'idCategoria');
    }
    public function jugador()
    {
        return $this->hasMany(Jugadores::class,'idEquipo');
    }
    public function fixture()
    {
        return $this->hasMany(Fixture::class,'idEquipo');
    }

}
