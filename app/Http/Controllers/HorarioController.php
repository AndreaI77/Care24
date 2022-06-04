<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Servicio;
use App\Models\Cliente;
use App\Models\Empleado;

class HorarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citas=[];
        $servicios=[];
        if(auth()->user()->tipo == 'Administrativo' ){
            $citas= Cita::get();
            $servicios = Servicio::orderBy('fecha','ASC')->get();
            return view('horarios.index', compact('citas', 'servicios'));

        }else if(auth()->user()->tipo == 'cliente'){
            $clientes=Cliente::where('user_id', auth()->user()->id)->get();
            $citas1 = Cita::get();
            foreach($clientes as $cliente){
                $servicios=Servicio::where('cliente_id', $cliente->id)->get();

                foreach($servicios as $servicio){
                    foreach($citas1 as $ct){
                        if($ct->servicio_id == $servicio->id){
                            $citas[]=$ct;
                        }
                    }
                }
            }
            return view('horarios.index', compact('citas', 'servicios'));
        }else if(auth()->user()->tipo == 'Cuidador' || auth()->user()->tipo == 'Limpiador'){
            $empleados=Empleado::where('user_id', auth()->user()->id)->get();
            $citas1 = Cita::get();
            foreach($empleados as $emp){
                $servicios=Servicio::where('empleado_id', $emp->id)->get();

                foreach($servicios as $servicio){
                    foreach($citas1 as $ct){
                        if($ct->servicio_id == $servicio->id){
                            $citas[]=$ct;
                        }
                    }
                }
            }
            return view('horarios.index', compact('citas', 'servicios'));
        }else{
            return view('welcome');
        }

    }
}
