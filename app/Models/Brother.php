<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brother extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'identificador', 'slug', 'creado_por', 'actualizado_por'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    //Relacion uno a muchos
    public function offering(){
        return $this->hasMany('App\Models\Offering');
    }
}
