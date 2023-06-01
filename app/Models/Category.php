<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['categoria', 'slug', 'creado_por', 'actualizado_por'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    //Relacion uno a muchos
    public function expense(){
        return $this->hasMany('App\Models\Expense');
    }

}
