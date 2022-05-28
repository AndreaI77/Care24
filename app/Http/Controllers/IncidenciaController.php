<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;
use App\Models\Empleado;
use App\Models\Cliente;
use App\Models\Servicio;
use Illuminate\Http\Request;
use App\Http\Requests\IncidenciaRequest;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Crypt;

class IncidenciaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'index','create', 'store', 'edit', 'update', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->tipo == 'Administrativo' ){
            $incidencias= Incidencia::get();
            return view('incidencias.index', compact( 'incidencias'));
        }else if(auth()->user()->tipo == 'Cuidador' || auth()->user()->tipo == 'Limpiador'){
            $incidencias=[];
            $incidencias1=Incidencia::get();
            $empleados=Empleado::where('user_id', auth()->user()->id)->get();
            foreach($empleados as $emp){
                $servicios=Servicio::where('empleado_id', $emp->id)->get();
                foreach($servicios as $ser){
                    foreach($incidencias1 as $inc){
                        if($inc->cliente_id == $ser->cliente_id){
                            if(in_array($inc, $incidencias)== false){
                                $incidencias[] = $inc;
                            }
                        }
                    }
                }
            }
            return view('incidencias.index', compact( 'incidencias'));
        }else{
            Session::flash('danger','No está autorizado a acceder a esta ruta.');
            return redirect()->route('inicio');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->tipo == 'Administrativo' ){
            $clientes=Cliente::get();

            return view('incidencias.create',compact('clientes'));
        }else if(auth()->user()->tipo == 'Cuidador' || auth()->user()->tipo == 'Limpiador'){
            $empleados=Empleado::where('user_id', auth()->user()->id)->get();
            $clientes=[];
            $clientes1=Cliente::get();
            foreach ($empleados as $emp) {
                $servicios = Servicio::where('empleado_id', $emp->id)->get();
                foreach ($clientes1 as $cl) {
                    foreach ($servicios as $ser) {

                        if ($ser->cliente_id == $cl->id) {
                            if(in_array($cl, $clientes)== false){
                                $clientes[] = $cl;
                            }
                        }
                    }
                }
            }
            return view('incidencias.create',compact('clientes'));
        }else{
            Session::flash('danger','No está autorizado a acceder a esta ruta.');
            return redirect()->route('inicio');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncidenciaRequest $request)
    {
        if(auth()->user()->tipo !== 'cliente'){
            $incidencia= new Incidencia();
            $incidencia->fecha = $request->get('fecha');
            $empleado= Empleado::findOrFail(auth()->user()->id);
            $incidencia->empleado()->associate($empleado);
            $cliente= Cliente::findOrFail($request->get('cliente'));
            $incidencia->cliente()->associate($cliente);
            if(!empty($request->get('servicio'))){
                $servicio= Servicio::findOrFail($request->get('servicio'));
                $incidencia->servicio()->associate($servicio);
            }
            $incidencia->tipo = $request->get('tipo');
            $incidencia->titulo =Crypt::encryptString( $request->get('titulo'));
            $incidencia->descripcion = Crypt::encryptString($request->get('descripcion'));
            $incidencia->estado = "activo";
            $incidencia->save();
            //return redirect()->route('incidencias.index')->with('info','Se ha creado el registro.');
            return back()->with('info','Se ha creado el registro.');
        }else{
            Session::flash('danger','No está autorizado a acceder a esta ruta.');
            return redirect()->route('inicio');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(auth()->user()->tipo == 'Administrativo'){
            $incidencia= Incidencia::findOrFail($id);

            return view('incidencias.show', compact('incidencia'));
        }else if(auth()->user()->tipo == 'Cuidador' || auth()->user()->tipo == 'Limpiador'){
            $empleados=Empleado::where('user_id', auth()->user()->id)->get();
            $incidencia1= Incidencia::findOrFail($id);
            $incidencia=null;
            foreach ($empleados as $emp) {
                $servicios = Servicio::where('empleado_id', $emp->id)->get();

                foreach ($servicios as $ser) {
                    if ($ser->cliente_id == $incidencia1->cliente_id) {
                        $incidencia = $incidencia1;
                    }
                }
            }
            if($incidencia == null){
                Session::flash('danger','No está autorizado a acceder a esta ruta.');
                return redirect()->route('inicio');
            }else{
                return view('incidencias.show', compact('incidencia'));
            }

        }else{
            Session::flash('danger','No está autorizado a acceder a esta ruta.');
            return redirect()->route('inicio');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->user()->tipo == 'Administrativo'){
            $incidencia= Incidencia::findOrFail($id);
            $clientes= Cliente::get();
            return view('incidencias.edit', compact('incidencia', 'clientes'));
        }else if(auth()->user()->tipo == 'Cuidador' || auth()->user()->tipo == 'Limpiador'){
            $incidencia1= Incidencia::findOrFail($id);
            $clientes1 = Cliente::get();
            $clientes = [];
            $incidencia= null;
            $empleados=Empleado::where('user_id', auth()->user()->id)->get();
            foreach($empleados as $emp){
                $servicios=Servicio::where('empleado_id', $emp->id)->get();

                foreach ($servicios as $servicio) {
                    if($servicio->cliente_id == $incidencia1->cliente_id){
                        $incidencia=$incidencia1;
                    }
                    foreach ($clientes1 as $ct) {
                        if ($ct->id == $servicio->cliente_id) {
                            if (in_array($ct, $clientes) == false) {
                                $clientes[] = $ct;
                            }

                        }
                    }
                }
            }
            if($incidencia == null){
                Session::flash('danger','No está autorizado a acceder a esta ruta.');
                return redirect()->route('inicio');
            }else{
                return view('incidencias.edit', compact('incidencia', 'clientes'));
            }
        }else{
            Session::flash('danger','No está autorizado a acceder a esta ruta.');
            return redirect()->route('inicio');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function update(IncidenciaRequest $request, $id)
    {
        if(auth()->user()->tipo !== 'cliente'){
            $incidencia= Incidencia::findOrFail($id);
            $incidencia->fecha = $request->get('fecha');
            $incidencia->tipo = $request->get('tipo');
            $incidencia->titulo =Crypt::encryptString( $request->get('titulo'));
            $incidencia->descripcion = Crypt::encryptString($request->get('descripcion'));
            $incidencia->estado = $request->get('estado');
            $incidencia->save();
            Session::flash('info', "Se han actualizado los datos.");

            return redirect()->route('incidencias.show', $id);
        }else{
            Session::flash('danger','No está autorizado a acceder a esta ruta.');
            return redirect()->route('inicio');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->tipo !== 'cliente'){
            $incidencia= Incidencia::findOrFail($id);
            try
            {
                $incidencia->delete();
                Session::flash('info', "Se ha eliminado el registro.");
                return redirect()->route('incidencias.index');
            }catch(Exception $e){
                return $e->getMessage();
            }
        }else{
            Session::flash('danger','No está autorizado a acceder a esta ruta.');
            return redirect()->route('inicio');
        }
    }
}
