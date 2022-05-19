<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha',
        'tipo',
        'titulo',
        'descripcion',
        'estado',
        'cliente_id',
        'empleado_id'
    ];
    public function servicio(){
        return $this->belongsTo(Servicio::class);
    }
    public function empleado(){
        return $this->belongsTo(Empleado::class);
    }
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
}
