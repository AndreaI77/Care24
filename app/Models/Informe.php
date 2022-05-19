<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha',
        'titulo',
        'descripcion',
        'estado',
        'empleado_id'
    ];
    public function empleado(){
        return $this->belongsTo(Empleado::class);
    }
}
