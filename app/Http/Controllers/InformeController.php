<?php

namespace App\Http\Controllers;

use App\Models\Informe;
use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Http\Requests\InformeRequest;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Crypt;


class InformeController extends Controller
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
        $informes= Informe::get();
        return view('informes.index', compact( 'informes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('informes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InformeRequest $request)
    {
        $informe= new Informe();
        $informe->fecha = Carbon::now();
        $empleado= Empleado::findOrFail(auth()->user()->id);
        $informe->empleado()->associate($empleado);
        $informe->titulo = Crypt::encryptString($request->get('titulo'));
        $informe->descripcion = Crypt::encryptString($request->get('descripcion'));
        $informe->estado = $request->get('estado');
        $informe->save();
        return back()->with('info','Se ha creado el registro.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $informe= Informe::findOrFail($id);

        return view('informes.show', compact('informe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $informe= Informe::findOrFail($id);
        return view('informes.edit', compact('informe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function update(InformeRequest $request, $id)
    {
        $informe= Informe::findOrFail($id);
        $informe->titulo = Crypt::encryptString($request->get('titulo'));
        $informe->descripcion = Crypt::encryptString($request->get('descripcion'));
        $informe->estado = $request->get("estado");
        $informe->save();
        Session::flash('info', "Se han actualizado los datos.");

        return redirect()->route('informes.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $informe= Informe::findOrFail($id);
        try
        {
            $informe->delete();
            Session::flash('info', "Se ha eliminado el registro.");
            return redirect()->route('informes.index');
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
}
