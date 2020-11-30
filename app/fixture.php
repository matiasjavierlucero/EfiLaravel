<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Categorias;
use App\Equipos;


class Fixture extends Model
{
    protected $table = "fixture";
    protected $guarded = ['fecha'];
    protected $primaryKey = 'id';
    
    public function equipoLocal()
    {
        return $this->belongsTo(Equipos::class,'idLocal');
    }

    public function equipoVisitante()
    {
        return $this->belongsTo(Equipos::class,'idVisitante');
    }

    public function categoria()
    {
        return $this->belongsTo(Categorias::class,'idCategoria');
    }

}
