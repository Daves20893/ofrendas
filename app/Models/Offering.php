<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offering extends Model
{
    use HasFactory;

    protected $fillable = ['brother_id', 'fecha','diezmo', 'ofrenda', 'mision', 'protemplo', 'servicio', 'buena_dadiva', 'total', 'slug', 'creado_por', 'actualizado_por'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    //Relacion uno a muchos(inversa)
    public function brother(){
        return $this->belongsTo('App\Models\Brother','brother_id');
    }
}
