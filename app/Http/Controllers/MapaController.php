<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Servicio;


class MapaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'index', 'show']);
    }
    public function index(Request $request)
    {
        return view('clientes.mapa');
    }
    public function show()
    {
        $users=[];
        $clientes=[];
        if(auth()->user()->tipo == 'Administrativo'){
            $clientes= Cliente::get();

        }else if(auth()->user()->tipo == 'Cuidador' || auth()->user()->tipo == 'Limpiador'){

            $empleados=Empleado::where('user_id', auth()->user()->id)->get();
            $clientes1 = Cliente::get();
            foreach($empleados as $emp){
                $servicios=Servicio::where('empleado_id', $emp->id)->get();
                foreach($servicios as $servicio){
                    foreach($clientes1 as $ct){
                        if($ct->user->fecha_baja == ""){
                            if($ct->id == $servicio->cliente_id){
                                if(in_array($ct, $clientes) == false){
                                    $clientes[]=$ct;
                                }
                            }
                        }
                    }
                }
            }

        }else{
            $clientes= Cliente::where('user_id', auth()->user()->id)->get();

        }
        foreach($clientes as $cl){
            if($cl->user->fecha_baja == ""){
                $us['id']=$cl->id;
                $us['user_id']=$cl->user->id;
                $us['nombre']=$cl->user->nombre;
                $us['apellido']=$cl->user->apellido;
                $us['domicilio']=$cl->user->domicilio;
                $us['longitud']=$cl->coordenadax;
                $us['latitud']=$cl->coordenaday;
                $users[]=$us;
            }
        }
        return $users;
    }

}
