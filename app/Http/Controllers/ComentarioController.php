<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\Servicio;
use App\Models\Cliente;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;

class ComentarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'index', 'edit', 'update']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            $servicios= Servicio::orderBy('fecha','DESC')->get();

        return view('comentarios.index', compact('servicios'));

    }

    public function edit($id)
    {
        $cita=null;
        $servicio = null;
        if(auth()->user()->tipo == 'cliente'){

            $clientes=Cliente::where('user_id', auth()->user()->id)->get();
            $servicio1= Servicio::findOrFail($id);
            $cita = Cita::where('servicio_id', $servicio1->id);
            foreach($clientes as $cliente){
                if($servicio1->cliente_id === $cliente->id){
                    $servicio=$servicio1;
                    $cita = Cita::where('servicio_id', $servicio->id);
                }
            }
            if($servicio == null){
                Session::flash('danger','No está autorizado a acceder a esta ruta.');
                return redirect()->route('inicio');
            }else{
                return view('comentarios.edit', compact('servicio', 'cita'));
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
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'valoracion' => 'required|numeric|min:1|max:5',
            'comentario' => 'required'
         ]);
        if(auth()->user()->tipo === 'cliente'){
            $servicio= Servicio::findOrFail($id);
            $servicio->comentario=Crypt::encryptString($request->get('comentario'));
            $servicio->valoracion=$request->get('valoracion');
            $servicio->save();

           Session::flash('info', "Se ha guardado su comentario.");
            if($servicio->tipo == 'Cita'){
                return redirect()->route('citas.index');
            }else{
                return redirect()->route('servicios.index');
            }
           ;
        }else{
            Session::flash('danger','No está autorizado a acceder a esta ruta.');
            return redirect()->route('inicio');
        }
    }
}
