<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cronograma extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'face', 'descripcion', 'fecha_inicio', 'fecha_final', 'estado', 'id_proyecto'];
    public function proyectos() {
        return $this->belongsTo(Proyecto::class, 'id_proyecto');
    }
}
