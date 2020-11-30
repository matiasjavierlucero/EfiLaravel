<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Equipos;

class Localidad extends Model
{
    protected $table = 'localidad';
    protected $fillable = [
        'id',
        'nombre',
    ];

    public function equipos()
    {
        return $this->hasMany(Equipos::class, 'idLocalidad');   
    }
}
