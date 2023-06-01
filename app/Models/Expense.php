<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'monto', 'descripcion', 'creado_por', 'actualizado_por'];

    //Relacion uno a muchos(inversa)
    public function category(){
        return $this->belongsTo('App\Models\Category','category_id');
    }
}
