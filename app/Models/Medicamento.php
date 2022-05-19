<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'principio_ac',
        'cantidad'
    ];
    public function tratamientos(){
        return $this->hasMany(Tratamiento::class);
    }
}
