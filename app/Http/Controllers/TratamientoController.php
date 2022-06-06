<?php

namespace App\Http\Controllers;

use App\Models\Tratamiento;
use App\Models\Medicamento;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Exception;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\TratamientoRequest;

class TratamientoController extends Controller
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
        $tratamientos=[];
        if(auth()->user()->tipo == 'Administrativo' ){
            $tratamientos = Tratamiento::orderBy('hora','ASC')->get();
            $clientes = Cliente::get();
            return view('tratamientos.index', compact('tratamientos','clientes'));

        }else if(auth()->user()->tipo == 'cliente'){
            $clientes1=Cliente::where('user_id', auth()->user()->id)->get();
            foreach($clientes1 as $cliente){
                $tratamientos=Tratamiento::where('cliente_id', $cliente->id)->orderBy('hora','ASC')->get();
            }
            return view('tratamientos.index', compact('tratamientos'));
        }else if(auth()->user()->tipo == 'Cuidador'){
            $empleados =Empleado::where('user_id', auth()->user()->id)->get();
            $clientes=[];
            foreach($empleados as $empleado){
                $servicios=Servicio::where('empleado_id', $empleado->id)->get();
                foreach($servicios as $servicio){
                    $clientes1= Cliente::where('id', $servicio->cliente_id)->get();
                    foreach($clientes1 as $cliente){
                        if(in_array($cliente, $clientes) == false){
                            $clientes[]=$cliente;
                        }
                    }
                }
            }

            foreach ($clientes as $cliente) {
                $tratamientos1 = Tratamiento::where('cliente_id', $cliente->id)->orderBy('hora', 'ASC')->get();
                foreach ($tratamientos1 as $trat) {
                    $tratamientos[] = $trat;
                }
            }

            return view('tratamientos.index', compact('tratamientos','clientes'));
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
            $medicamentos = Medicamento::get();
            $clientes = Cliente::get();
            return view('tratamientos.create', compact('medicamentos', 'clientes'));
        }else if(auth()->user()->tipo == 'Cuidador'){
            //filtro clientes para que en select aparezcan solamente los que tienen servicios asignados con el cuidador
            $servicios =Servicio::where('empleado_id', auth()->user()->id)->get();
            $clientes1=Cliente::get();
            $clientes=[];
            foreach($servicios as $servicio){
                foreach($clientes1 as $ct){
                    if($ct->id == $servicio->cliente_id){
                        if(in_array($ct, $clientes) == false){
                            $clientes[]=$ct;
                        }
                    }
                }
            }
            $medicamentos = Medicamento::get();
            return view('tratamientos.create', compact('medicamentos', 'clientes'));
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
    public function store(TratamientoRequest $request, )
    {
        if(auth()->user()->tipo == 'Administrativo' || auth()->user()->tipo == 'Cuidador'){
            $trat=new Tratamiento();
            $trat->fecha_principio=$request->get('fecha_principio');
            $trat->fecha_fin=$request->get('fecha_fin');
            $trat->cantidad=$request->get('cantidad');
            $trat->hora=$request->get('hora');
            $trat->descripcion=Crypt::encryptString($request->get('descripcion'));
            $medicamento=Medicamento::findOrFail($request->get('medicamento'));
            $trat->medicamento()->associate($medicamento);
            $cliente= Cliente::findOrFail($request->get('cliente'));
            $trat->cliente()->associate($cliente);
            $trat->save();
            return back()->with('info','Se ha creado el registro.');
        }else{
            Session::flash('danger','No está autorizado a acceder a esta ruta.');
            return redirect()->route('inicio');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $tratamiento = null;
        if(auth()->user()->tipo == 'Administrativo'){
            $tratamiento= Tratamiento::findOrFail($id);
            return view('tratamientos.show', compact('tratamiento'));
        }else if(auth()->user()->tipo == 'cliente'){
            $clientes=Cliente::where('user_id', auth()->user()->id)->get();
            $tratamiento1= Tratamiento::findOrFail($id);
            foreach($clientes as $cliente){
                if($tratamiento1->cliente_id === $cliente->id){
                    $tratamiento=$tratamiento1;
                }
            }
            if($tratamiento == null){
                Session::flash('danger','No está autorizado a acceder a esta ruta.');
                return redirect()->route('inicio');
            }else{
                return view('tratamientos.show', compact('tratamiento'));
            }
        }else if(auth()->user()->tipo == 'Cuidador'){
            $empleados=Empleado::where('user_id', auth()->user()->id)->get();
            $tratamiento1= Tratamiento::findOrFail($id);
            foreach($empleados as $emp){
                $servicios=Servicio::where('empleado_id', $emp->id)->get();
                foreach($servicios as $ser){

                    if($ser->cliente_id == $tratamiento1->cliente_id){
                        $tratamiento=$tratamiento1;
                    }
                }
            }
            if($tratamiento == null){
                Session::flash('danger','No está autorizado a acceder a esta ruta.');
                return redirect()->route('inicio');
            }else{
                return view('tratamientos.show', compact('tratamiento'));
            }
        }else{
            Session::flash('danger','No está autorizado a acceder a esta ruta.');
            return redirect()->route('inicio');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        if(auth()->user()->tipo == 'Administrativo'){
            $tratamiento= Tratamiento::findOrFail($id);
            $medicamentos = Medicamento::get();
            $clientes=Cliente::get();

            return view('tratamientos.edit', compact('medicamentos','clientes', 'tratamiento'));
        } else if (auth()->user()->tipo == 'Cuidador') {
            $tratamiento1 = Tratamiento::findOrFail($id);
            $medicamentos = Medicamento::get();
            $clientes1 = Cliente::get();
            $clientes = [];
            $tratamiento= null;
            $empleados=Empleado::where('user_id', auth()->user()->id)->get();
            foreach($empleados as $emp){
                $servicios=Servicio::where('empleado_id', $emp->id)->get();

                foreach ($servicios as $servicio) {
                    if($servicio->cliente_id == $tratamiento1->cliente_id){
                        $tratamiento=$tratamiento1;
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
            if($tratamiento == null){
                Session::flash('danger','No está autorizado a acceder a esta ruta.');
                return redirect()->route('inicio');
            }else{
                return view('tratamientos.edit', compact('medicamentos', 'clientes', 'tratamiento'));
            }

        } else {
            Session::flash('danger','No está autorizado a acceder a esta ruta.');
            return redirect()->route('inicio');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function update(TratamientoRequest $request, $id)
    {
        if(auth()->user()->tipo == 'Administrativo' || auth()->user()->tipo == 'Cuidador'){
            $tratamiento=Tratamiento::findOrFail($id);
            $tratamiento->fecha_principio=$request->get('fecha_principio');
            $tratamiento->fecha_fin=$request->get('fecha_fin');
            $tratamiento->cantidad=$request->get('cantidad');
            $tratamiento->hora=$request->get('hora');
            $tratamiento->descripcion=Crypt::encryptString($request->get('descripcion'));
            $tratamiento->medicamento_id=$request->get('medicamento');
            $tratamiento->cliente_id=$request->get('cliente');
            $tratamiento->save();

            Session::flash('info', "Se han actualizado los datos.");
            return view('tratamientos.show', compact('tratamiento'));
            // return redirect()->route('tratamientos.show', $cliente_id, $id);
        }else{
            Session::flash('danger','No está autorizado a acceder a esta ruta.');
            return redirect()->route('inicio');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        if(auth()->user()->tipo == 'Administrativo' || auth()->user()->tipo == 'Cuidador'){
            $tratamiento= Tratamiento::findOrFail( $id);
            try
            {
                $tratamiento->delete();
                Session::flash('info', "Se ha eliminado el registro.");
                return redirect()->route('tratamientos.index');

            }catch(Exception $e){
                return $e->getMessage();

            }
        }else{
            Session::flash('danger','No está autorizado a acceder a esta ruta.');
            return redirect()->route('inicio');
        }
    }
}
