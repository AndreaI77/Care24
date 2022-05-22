<?php

namespace App\Http\Controllers;

use App\Models\Tratamiento;
use App\Models\Medicamento;
use App\Models\Cliente;
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
        if(auth()->user()->tipo === 'empleado'){
            $tratamientos = Tratamiento::get();
        }else{
            $clientes=Cliente::where('user_id', auth()->user()->id)->get();
            foreach($clientes as $cliente){
                $tratamientos=Tratamiento::where('cliente_id', $cliente->id)->get();
            }
        }
        return view('tratamientos.index', compact('tratamientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->tipo === 'empleado'){
            $medicamentos = Medicamento::get();
            $clientes = Cliente::get();
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
        if(auth()->user()->tipo === 'empleado'){
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
        $tratamiento= Tratamiento::findOrFail($id);

        return view('tratamientos.show', compact('tratamiento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        if(auth()->user()->tipo === 'empleado'){
            $tratamiento= Tratamiento::findOrFail($id);
            $medicamentos = Medicamento::get();
            $clientes=Cliente::get();

            return view('tratamientos.edit', compact('medicamentos','clientes', 'tratamiento'));
        }else{
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
        if(auth()->user()->tipo === 'empleado'){
            $trat=Tratamiento::findOrFail($id);
            $trat->fecha_principio=$request->get('fecha_principio');
            $trat->fecha_fin=$request->get('fecha_fin');
            $trat->cantidad=$request->get('cantidad');
            $trat->hora=$request->get('hora');
            $trat->descripcion=Crypt::encryptString($request->get('descripcion'));
            $trat->medicamento_id=$request->get('medicamento');
            $trat->cliente_id=$request->get('cliente');
            $trat->save();

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
        if(auth()->user()->tipo === 'empleado'){
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
