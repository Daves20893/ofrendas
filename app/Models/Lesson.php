<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = ['leccion', 'slug', 'creado_por', 'actualizado_por'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    //Relacion uno a muchos
    public function visitor(){
        return $this->hasMany('App\Models\Visitor');
    }
}
