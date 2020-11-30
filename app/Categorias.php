<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Equipos;
use App\Fixture;

class Categorias extends Model
{
    protected $table = 'categoria';
    protected $fillable = [
        'id',
        'Nombre',
    ];

    public function equipos()
    {
        return $this->hasMany(Equipos::class, 'idCategoria');   
    }
     public function fixture()
    {
        return $this->hasMany(Fixture::class,'idEquipo');
    }
}