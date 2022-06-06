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
            $servicios = Servicio::orderBy('fecha','DESC')->get();
            $clientes=Cliente::get();
            $empleados=Empleado::get();
            return view('horarios.index', compact('citas', 'servicios', 'clientes', 'empleados'));

        }else if(auth()->user()->tipo == 'cliente'){
            $clientes1=Cliente::where('user_id', auth()->user()->id)->get();
            $citas1 = Cita::get();
            $citas=[];
            $empleados=[];
            $empleados1=Empleado::get();
            foreach($clientes1 as $cliente){
                $servicios=Servicio::where('cliente_id', $cliente->id)->orderBy('fecha','DESC')->get();

                foreach($servicios as $servicio){
                    foreach($empleados1 as $emp){
                        if($servicio->empleado_id == $emp->id){
                            if(in_array($emp, $empleados)==false){
                                $empleados[]=$emp;
                            }
                        }
                    }
                    foreach($citas1 as $ct){
                        if($ct->servicio_id == $servicio->id){
                            $citas[]=$ct;
                        }
                    }
                }
            }

            return view('horarios.index', compact('citas', 'servicios', 'empleados'));
        }else if(auth()->user()->tipo == 'Cuidador' || auth()->user()->tipo == 'Limpiador'){
            $empleados1=Empleado::where('user_id', auth()->user()->id)->get();
            $citas1 = Cita::get();
            $clientes1=Cliente::get();
            $clientes=[];
            $citas=[];
            foreach($empleados1 as $emp){
                $servicios=Servicio::where('empleado_id', $emp->id)->orderBy('fecha','DESC')->get();

                foreach($servicios as $servicio){
                    foreach($citas1 as $ct){
                        if($ct->servicio_id == $servicio->id){
                            $citas[]=$ct;
                        }
                    }
                    foreach($clientes1 as $cl){
                        if($servicio->cliente_id == $cl->id){
                            if(in_array($cl, $clientes)==false){
                                $clientes[]=$cl;
                            }
                        }
                    }
                }

            }


            return view('horarios.index', compact('citas', 'servicios', 'clientes'));

        }else{
            return view('welcome');
        }

    }
}
