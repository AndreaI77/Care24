<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'puesto',
        'idiomas'
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function informes(){
        return $this->hasMany(Informe::class);
    }
    public function servicios(){
        return $this->hasMany(Servicio::class);
    }
    public function citas(){
        return $this->hasMany(Cita::class);
    }
    public function incidencia(){
        return $this->hasMany(Incidencia::class);
    }


}
