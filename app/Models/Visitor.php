<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'provincia', 'ciudad', 'barrio', 'salvo', 'bautizado', 'lesson_id', 'slug', 'creado_por', 'actualizado_por'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function lessons(){
        return $this->belongsTo('App\Models\Lesson','lesson_id');
    }
}
