<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Incidencia;
use App\Models\Servicio;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Especialidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Exception;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\CitaRequest;

class CitaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'index','create', 'store', 'show', 'edit', 'update', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citas=[];
        if(auth()->user()->tipo == 'Administrativo' ){
            $citas= Cita::get();
            return view('citas.index', compact('citas'));

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
            return view('citas.index', compact('citas'));
        }else if(auth()->user()->tipo == 'Cuidador'){
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
            return view('citas.index', compact('citas'));
        }else{
            return view('welcome');
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
            $empleados=Empleado::get();
            $especialidades=Especialidad::get();
            return view('citas.create', compact('empleados','clientes', 'especialidades'));
        }else if(auth()->user()->tipo == 'Cuidador'){
            //filtro clientes para que en select aparezcan solamente los que tienen servicios asignados con el cuidador
            $servicios =Servicio::where('empleado_id', auth()->user()->id)->get();
            $clientes1=Cliente::get();
            $clientes=[];
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
            $especialidades=Especialidad::get();
            return view('citas.create', compact('clientes', 'especialidades'));
        }else{
            Session::flash('danger','No está autorizado a acceder a esta página.');
            return redirect()->route('citas.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CitaRequest $request)
    {
        if(auth()->user()->tipo == 'Administrativo' || auth()->user()->tipo == 'Cuidador'){
            $ser= new Servicio();
            $ser->fecha=$request->get('fecha');
            $ser->hora_inicio=$request->get('hora_inicio');
            $ser->hora_final=$request->get('hora_final');
            $ser->tipo="Cita";
            if($request->has('descripcion')){
                $ser->descripcion=Crypt::encryptString($request->get('descripcion'));
            }
            if($request->has('comentario')){
                $ser->comentario=Crypt::encryptString($request->get('comentario'));
            }
            $ser->estado=$request->get('estado');

            $cliente=Cliente::findOrFail($request->get('cliente'));
            $ser->cliente()->associate($cliente);
            $empleado= Empleado::findOrFail($request->get('empleado'));
            $ser->empleado()->associate($empleado);
            $ser->save();
            $cita=new Cita();
            $cita->hora_cita=$request->get('hora_cita');
            $cita->lugar=$request->get('lugar');
            $cita->especialidad_id=$request->get('especialidad');
            $especialidad= Especialidad::findOrFail($request->get('especialidad'));
            $cita->especialidad()->associate($especialidad);
            $cita->servicio_id = $ser->id;
            $cita->servicio()->associate($ser);
            $cita->save();

            return back()->with('info','Se ha creado el registro.');
        }else{
            Session::flash('danger','No está autorizado a acceder a esta página.');
            return redirect()->route('citas.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cita = null;
        if(auth()->user()->tipo == 'Administrativo'){
            $cita=Cita::findOrFail($id);
            return view('citas.show', compact('cita'));

        }else if(auth()->user()->tipo == 'cliente'){
            $clientes=Cliente::where('user_id', auth()->user()->id)->get();
            $cita1= Cita::findOrFail($id);
            foreach($clientes as $cliente){

                if($cita1->servicio->cliente_id == $cliente->id){
                    $cita=$cita1;
                }
            }

            if($cita == null){
                Session::flash('danger','No está autorizado a acceder a esta página.');
                return redirect()->route('inicio');
            }else{
                return view('citas.show', compact('cita'));
            }

        }else if(auth()->user()->tipo == 'Cuidador'){
            $empleados=Empleado::where('user_id', auth()->user()->id)->get();
            $cita1= Cita::findOrFail($id);
            foreach($empleados as $emp){
                if($cita1->servicio->empleado_id == $emp->id){
                    $cita=$cita1;
                }
            }
            if($cita == null){
                Session::flash('danger','No está autorizado a acceder a esta página.');
                return redirect()->route('inicio');
            }else{
                return view('citas.show', compact('cita'));
            }
        }else{
            return view('welcome');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        if(auth()->user()->tipo == 'Administrativo'){
            $cita= Cita::findOrFail($id);
            $clientes=Cliente::get();
            $empleados=Empleado::get();
            $especialidades = Especialidad::get();
            return view('citas.edit', compact('cita', 'clientes', 'empleados', 'especialidades'));
        }else if(auth()->user()->tipo == 'Cuidador'){
            $cita= Cita::findOrFail($id);
                $servicios =Servicio::where('empleado_id', auth()->user()->id)->get();
                $clientes1=Cliente::get();
                $clientes=[];
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
                $especialidades=Especialidad::get();
                return view('citas.edit', compact('cita','clientes', 'especialidades'));
        }else if(auth()->user()->tipo == 'cliente'){
                $cita=null;

                $cita1= Cita::findOrFail($id);
                $clientes=Cliente::where('user_id', auth()->user()->id)->get();

                    foreach($clientes as $cliente){
                        if($cita1->servicio->cliente_id === $cliente->id){
                            $cita=$cita1;

                        }
                    }
                    $especialidades=Especialidad::get();
                    return view('citas.edit', compact('cita','clientes', 'especialidades'));

        }else{
            Session::flash('danger','No está autorizado a acceder a esta página.');
            return redirect()->route('citas.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function update(CitaRequest $request, $id)
    {
        if(auth()->user()->tipo == 'Administrativo' || auth()->user()->tipo == 'Cuidador' || auth()->user()->tipo == 'cliente'){
            $cita= Cita::findOrFail($id);
            $cita->servicio->fecha=$request->get('fecha');
            $cita->servicio->hora_inicio=$request->get('hora_inicio');
            $cita->servicio->hora_final=$request->get('hora_final');
            $cita->servicio->estado = $request->get('estado');
            if($request->has('descripcion')){
                $cita->servicio->descripcion=Crypt::encryptString($request->get('descripcion'));
            }
            if($request->has('comentario')){
                $cita->servicio->comentario=Crypt::encryptString($request->get('comentario'));
            }
            if($request->has('valoracion')){
                $cita->servicio->valoracion=$request->get('valoracion');
            }

            $cita->servicio->cliente_id=$request->get('cliente');
            $cita->servicio->empleado_id=$request->get('empleado');
            $cita->servicio->save();
            $cita->hora_cita=$request->get('hora_cita');
            $cita->lugar = $request->get('lugar');
            $cita->especialidad_id=$request->get('especialidad');
            $cita->save();

            Session::flash('info', "Se han actualizado los datos.");

            return redirect()->route('citas.show', $id);
        }else{
            Session::flash('danger','No está autorizado a acceder a esta página.');
            return redirect()->route('citas.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->tipo == 'Administrativo' || auth()->user()->tipo == 'Cuidador'){
            $cita= Cita::findOrFail($id);
            try {
                $cita->servicio->delete();
                $cita->delete();
                Session::flash('info', "Se ha eliminado el registro.");
                return redirect()->route('citas.index');
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }else{
            Session::flash('danger','No está autorizado a acceder a esta página.');
            return redirect()->route('citas.index');
        }
    }
}
