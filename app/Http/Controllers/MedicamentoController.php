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
        $medicamentos= Medicamento::get();

        return view('medicamentos.index', compact('medicamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medicamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedicamentoRequest $request)
    {
        $medicamento= new Medicamento();
        $medicamento->nombre=Crypt::encryptString($request->get('nombre'));
        $medicamento->principio_ac=Crypt::encryptString($request->get('principio'));
        $medicamento->cantidad = $request->get('cantidad');
        $medicamento->save();
        return back()->with('info','Se ha creado el registro.');
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
        $esp= Medicamento::findOrFail($id);
        try
        {
            if(Tratamiento::where('medicamento_id', '=', $id)->first() != null){
                return back()->with('error','Este mediamento se ha usado en un tratamiento, no puede ser eliminada.');
            }else{

                $esp->delete();
                Session::flash('info', "Se ha eliminado el registro.");
                return redirect()->route('medicamentos.index');

            }

        }catch(Exception $e){
            return $e->getMessage();

        }
    }
}
