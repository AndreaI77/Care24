<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha',
        'hora_inicio',
        'hora_final',
        'tipo',
        'descripcion',
        'estado',
        'comentario',
        'valoracion',
        'cliente_id',
        'empleado_id'

    ];
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
    public function empleado(){
        return $this->belongsTo(Empleado::class);
    }
    public function incidencia(){
        return $this->hasMany(Incidencia::class);
    }
}
