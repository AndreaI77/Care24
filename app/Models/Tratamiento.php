<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha_principio',
        'fecha_fin',
        'cantidad',
        'hora',
        'descripcion',
        'medicamento_id',
        'cliente_id'
    ];
    public function medicamento(){
        return $this->belongsTo(Medicamento::class);
    }
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
}
