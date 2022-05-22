<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\Cliente;
use App\Models\User;
use App\Models\Empleado;
use App\Models\Incidencia;
use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;
use Illuminate\Support\Facades\Session;
use Exception;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\ServicioRequest;


class ServicioController extends Controller
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
        $servicios=[];
        if(auth()->user()->tipo === 'empleado'){
            $servicios= Servicio::get();
        }else{
            $clientes=Cliente::where('user_id', auth()->user()->id)->get();
            foreach($clientes as $cliente){
                $servicios=Servicio::where('cliente_id', $cliente->id)->get();
            }
        }
        return view('servicios.index', compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->tipo === 'empleado'){
            $clientes=Cliente::get();
            $empleados=Empleado::get();

            return view('servicios.create', compact('empleados','clientes'));
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
    public function store(ServicioRequest $request)
    {
        if(auth()->user()->tipo === 'empleado'){
            $ser= new Servicio();
            $ser->fecha=$request->get('fecha');
            $ser->hora_inicio=$request->get('hora_inicio');
            $ser->hora_final=$request->get('hora_final');
            $ser->tipo=$request->get('tipo');
            if($request->has('descripcion')){
                $ser->descripcion=Crypt::encryptString($request->get('descripcion'));
            }
            $ser->estado=$request->get('estado');
            if($request->has('comentario')){
                $ser->comentario=Crypt::encryptString($request->get('comentario'));
            }
            $ser->valoracion=$request->get('valoracion');
            $cliente=Cliente::findOrFail($request->get('cliente'));
            $ser->cliente()->associate($cliente);
            $em=explode(";", $request->get('empleado'));
            $empleado= Empleado::findOrFail($em[0]);
            $ser->empleado()->associate($empleado);
            $ser->save();

            return back()->with('info','Se ha creado el registro.');
        }else{
            Session::flash('danger','No está autorizado a acceder a esta ruta.');
            return redirect()->route('inicio');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servicio= Servicio::findOrFail($id);

        return view('servicios.show', compact('servicio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->user()->tipo === 'empleado'){
            $servicio= Servicio::findOrFail($id);
            $clientes=Cliente::get();
            $empleados=Empleado::get();
            return view('servicios.edit', compact('servicio', 'clientes', 'empleados'));
        }else{
            Session::flash('danger','No está autorizado a acceder a esta ruta.');
            return redirect()->route('inicio');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(ServicioRequest $request, $id)
    {
        if(auth()->user()->tipo === 'empleado'){
            $ser= Servicio::findOrFail($id);
            $ser->fecha=$request->get('fecha');
            $ser->hora_inicio=$request->get('hora_inicio');
            $ser->hora_final=$request->get('hora_final');
            $ser->tipo=$request->get('tipo');
            if($request->has('descripcion')){
                $ser->descripcion=Crypt::encryptString($request->get('descripcion'));
            }
            $ser->estado=$request->get('estado');
            if($request->has('comentario')){
                $ser->comentario=Crypt::encryptString($request->get('comentario'));
            }

            $ser->valoracion=$request->get('valoracion');
            $ser->cliente_id=$request->get('cliente');
            $em=explode(";", $request->get('empleado'));

            $ser->empleado_id=$em[0];
            $ser->save();

            Session::flash('info', "Se han actualizado los datos.");

            return redirect()->route('servicios.show', $id);
        }else{
            Session::flash('danger','No está autorizado a acceder a esta ruta.');
            return redirect()->route('inicio');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->tipo === 'empleado'){
            $ser= Servicio::findOrFail($id);
            try
            {
                if(Incidencia::where('servicio_id', '=', $id)->first() != null){
                    return back()->with('error','Se ha reportado incidencia durante este servicio, no puede ser eliminado.');
                }else{

                    $ser->delete();
                    Session::flash('info', "Se ha eliminado el registro.");
                    return redirect()->route('servicios.index');
                }
            }catch(Exception $e){
                return $e->getMessage();

            }
        }else{
            Session::flash('danger','No está autorizado a acceder a esta ruta.');
            return redirect()->route('inicio');
        }
    }
}
