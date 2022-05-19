<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $fillable = [
        'servicio_id',
        'lugar',
        'hora_cita'
    ];
    public function servicio(){
        return $this->belongsTo(Servicio::class);
    }
    public function especialidad(){
        return $this->belongsTo(Especialidad::class);
    }
    public function empleado(){
        return $this->belongsTo(Empleado::class);
    }
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

}
