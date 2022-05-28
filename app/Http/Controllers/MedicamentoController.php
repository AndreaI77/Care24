<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use App\Models\Tratamiento;
use Illuminate\Http\Request;
use App\Http\Requests\MedicamentoRequest;
use Illuminate\Support\Facades\Session;
use Exception;
use Illuminate\Support\Facades\Crypt;

class MedicamentoController extends Controller
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
        if(auth()->user()->tipo !== 'cliente'){
            $medicamentos= Medicamento::get();

            return view('medicamentos.index', compact('medicamentos'));
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
        if(auth()->user()->tipo == 'Administrativo' || auth()->user()->tipo == 'Cuidador'){
            return view('medicamentos.create');
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
    public function store(MedicamentoRequest $request)
    {
        if(auth()->user()->tipo == 'Administrativo' || auth()->user()->tipo == 'Cuidador'){
            $medicamento= new Medicamento();
            $medicamento->nombre=Crypt::encryptString($request->get('nombre'));
            $medicamento->principio_ac=Crypt::encryptString($request->get('principio'));
            $medicamento->cantidad = $request->get('cantidad');
            $medicamento->save();
            return back()->with('info','Se ha creado el registro.');
        }else{
            Session::flash('danger','No está autorizado a acceder a esta ruta.');
            return redirect()->route('inicio');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function show(Medicamento $medicamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicamento $medicamento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicamento $medicamento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->tipo == 'Administrativo' || auth()->user()->tipo == 'Cuidador'){
            $esp= Medicamento::findOrFail($id);
            try
            {
                if(Tratamiento::where('medicamento_id', '=', $id)->first() != null){
                    return back()->with('error','Este medicamento se ha usado en un tratamiento, no puede ser eliminada.');
                }else{

                    $esp->delete();
                    Session::flash('info', "Se ha eliminado el registro.");
                    return redirect()->route('medicamentos.index');

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
