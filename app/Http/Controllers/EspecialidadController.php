<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use App\Models\Cita;
use Illuminate\Http\Request;
use App\Http\Requests\EspecialidadRequest;
use Illuminate\Support\Facades\Session;
use Exception;
use Illuminate\Support\Facades\Crypt;



class EspecialidadController extends Controller
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
        $especialidades= Especialidad::get();

        return view('especialidades.index', compact('especialidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('especialidades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EspecialidadRequest $request)
    {
        $especialidad= new Especialidad();
        $especialidad->nombre=Crypt::encryptString($request->get('nombre'));
        $especialidad->save();
        return back()->with('info','Se ha creado el registro.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */
    public function update(EspecialidadRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $esp= Especialidad::findOrFail($id);
        try
        {
            if(Cita::where('especialidad_id', '=', $id)->first() != null){
                return back()->with('error','Esta especialidad se ha usado en una cita, no puede ser eliminada.');
            }else{

                $esp->delete();
                Session::flash('info', "Se ha eliminado el registro.");
                return redirect()->route('especialidades.index');

            }

        }catch(Exception $e){
            return $e->getMessage();

        }
    }
}
