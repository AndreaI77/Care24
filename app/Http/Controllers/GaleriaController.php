<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Servicio;
use Illuminate\Support\Facades\Session;

class GaleriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'index']);
    }
    public function index()
    {
        $clientes=[];
        if(auth()->user()->tipo == 'Administrativo' ){
            $clientes= Cliente::get();

            return view('clientes.galeria', compact( 'clientes'));
        }else if(auth()->user()->tipo == 'Cuidador' || auth()->user()->tipo == 'Limpiador'){
            $empleados=Empleado::where('user_id', auth()->user()->id)->get();
            $clientes1 = Cliente::get();
            foreach($empleados as $emp){
                $servicios=Servicio::where('empleado_id', $emp->id)->get();

                foreach($servicios as $servicio){
                    if($servicio->estado != 'Archivado'){
                        foreach($clientes1 as $ct){
                            if($ct->id == $servicio->cliente_id){
                                if(in_array($ct, $clientes) == false){
                                    $clientes[]=$ct;
                                }
                            }
                        }
                    }
                }
            }
            return view('clientes.galeria', compact( 'clientes'));
        }else{
            Session::flash('danger','No está autorizado a acceder a esta ruta.');
            return redirect()->route('inicio');
        }
    }
}
