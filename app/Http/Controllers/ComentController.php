<?php

namespace App\Http\Controllers;
use App\Models\Servicio;
use App\Models\Cliente;

use Illuminate\Support\Facades\Crypt;

class ComentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'getData']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getData()
    {
        $servicios=[];
        $servicios1= Servicio::get();
        foreach($servicios1 as $cl){
           if(Crypt::decryptString($cl->comentario) != ""){
                $us['comentario']=Crypt::decryptString($cl->comentario);
                $us['valoracion']=$cl->valoracion;
                $us['nombre']=$cl->user->nombre;
                $us['tipo']=$cl->tipo;
                $us['fecha']=$cl->fecha;

                $servicios[]=$us;
            }
        }

        return $servicios;
    }
}
