<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Equipos;

class Jugadores extends Model
{
    protected $table = 'jugador';
    protected $fillable = [
        'nombre',
        'apellido',
        'dorsal'
    ];

    public function equipo()
    {
        return $this->belongsTo(Equipos::class,'idEquipo');
    }
}