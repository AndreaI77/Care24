<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Servicio;
use App\Models\Cliente;
use App\Models\Incidencia;
use App\Models\Empleado;
use App\Models\Tratamiento;
use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;
use Illuminate\Support\Facades\Session;
use Exception;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use App\Mail\PassMail;
use Illuminate\Support\Str;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'index','create', 'show', 'store', 'edit', 'update', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes=[];
        if(auth()->user()->tipo == 'Administrativo' ){
            $clientes= Cliente::get();

            return view('clientes.index', compact( 'clientes'));
        }else if(auth()->user()->tipo == 'Cuidador' || auth()->user()->tipo == 'Limpiador'){
            $empleados=Empleado::where('user_id', auth()->user()->id)->get();
            $clientes1 = Cliente::get();
            foreach($empleados as $emp){
                $servicios=Servicio::where('empleado_id', $emp->id)->get();

                foreach($servicios as $servicio){
                    foreach($clientes1 as $ct){
                        if($ct->id == $servicio->cliente_id){
                            if(in_array($ct, $clientes) == false){
                                $clientes[]=$ct;
                            }
                        }
                    }
                }
            }
            return view('clientes.index', compact( 'clientes'));
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
        if(auth()->user()->tipo == 'Administrativo'){
            return view('clientes.create');
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
    public function store(ClienteRequest $request)
    {
        if(auth()->user()->tipo == 'Administrativo'){
            if($request->has('nombre')){
                $user=new User();
                $user->nombre=$request->get('nombre');
                $user->apellido=$request->get('apellido');
                $user->domicilio=$request->get('domicilio');
                $user->dni=$request->get('DNI');
                $user->email=$request->get('email');
                $user->tel=$request->get('tel');
                $user->fecha_nac=$request->get('fecha_nacimiento');
                $user->datos=$request->get('datos');
                $user->tipo="cliente";
                $user->activo= 1;
                if($request->hasFile('foto')){
                    $file = $request->file('foto');
                    $path = 'img/fotos/';
                    $filename= time().'-'.$file->getClientOriginalName();
                    $uploadSuccess = $request->file('foto')->move($path , $filename);
                    $user->foto = $path . $filename;
                }
                $pass = Str::random(8);
                $user->password=bcrypt($pass);

                $user->save();
                $cl=new Cliente();
                $cl->user_id=$user->id;
                $cl->idioma=$request->idioma;
                if($request->has('SIP')){
                    $cl->sip=Crypt::encryptString($request->SIP);
                }
                $cl->nacionalidad=$request->nacionalidad;
                if($request->has('enfermedades')){
                    $cl->enfermedades=Crypt::encryptString($request->enfermedades);
                }
                $cl->familiares=$request->family;
                $cl->coordenadax=$request->coordenadax;
                $cl->coordenaday=$request->coordenaday;
                $cl->user()->associate($user);
                $cl->save();

                $details=[
                    'password' => $pass
                ];
                if($request->has('email') && $user->email != ""){
                    Mail::to($user->email)->send(new PassMail($details));
                }

                return back()->with('info','Se ha creado el registro.');
            }
        }else{
            Session::flash('danger','No está autorizado a acceder a esta ruta.');
            return redirect()->route('inicio');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente=null;
        if(auth()->user()->tipo == 'Administrativo'){
            $cliente= Cliente::findOrFail($id);
            return view('clientes.show', compact('cliente'));
        }else if(auth()->user()->tipo == 'Cuidador' || auth()->user()->tipo == 'Limpiador'){
            $empleados=Empleado::where('user_id', auth()->user()->id)->get();
            $cliente1= Cliente::findOrFail($id);
            foreach($empleados as $emp){
                $servicios=Servicio::where('empleado_id', $emp->id)->get();
                foreach($servicios as $servicio){
                    if($servicio->cliente_id == $cliente1->id){
                        $cliente=$cliente1;
                    }
                }
            }
            if($cliente == null){
                Session::flash('danger','No está autorizado a acceder a esta ruta.');
                return redirect()->route('inicio');
            }else{
                return view('clientes.show', compact('cliente'));
            }
        }else{
            Session::flash('danger','No está autorizado a acceder a esta ruta.');
            return redirect()->route('inicio');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->user()->tipo == 'Administrativo'){
            $cliente= Cliente::findOrFail($id);
            return view('clientes.edit', compact('cliente'));
        }else{
            Session::flash('danger','No está autorizado a acceder a esta ruta.');
            return redirect()->route('inicio');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteRequest $request, $id)
    {
        if(auth()->user()->tipo == 'Administrativo'){
            $cl= Cliente::findOrFail($id);
            $cl->user->nombre=$request->get('nombre');
            $cl->user->apellido=$request->get('apellido');
            $cl->user->domicilio=$request->get('domicilio');
            $cl->user->dni=$request->get('DNI');
            $cl->user->email=$request->get('email');
            $cl->user->tel=$request->get('tel');
            $cl->user->fecha_nac=$request->get('fecha_nacimiento');
            $cl->user->datos=$request->get('datos');
            $baja=$request->get('fecha_baja');
            if($baja !== "" && $baja != null){
                $cl->user->fecha_baja= $baja;
                $cl->user->activo= 0;
            }else{
                $cl->user->activo= 1;
            }
            if($request->hasFile('foto')){
                $file = $request->file('foto');
                $path = 'img/fotos/';
                $filename= time().'_'.$file->getClientOriginalName();
                $uploadSuccess = $request->file('foto')->move($path , $filename);
                $cl->user->foto = $path . $filename;
            }

            $cl->user->save();
            $cl->idioma=$request->idioma;
            if($request->has('SIP')){
                $cl->sip=Crypt::encryptString($request->SIP);
            }
            $cl->nacionalidad=$request->nacionalidad;
            if($request->has('enfermedades')){
                $cl->enfermedades=Crypt::encryptString($request->enfermedades);
            }
            $cl->familiares=$request->family;
            $cl->coordenadax=$request->coordenadax;
            $cl->coordenaday=$request->coordenaday;
            $cl->save();
            Session::flash('info', "Se han actualizado los datos.");

            return redirect()->route('clientes.show', $id);
        }else{
            Session::flash('danger','No está autorizado a acceder a esta ruta.');
            return redirect()->route('inicio');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->tipo == 'Administrativo'){
            $cl= Cliente::findOrFail($id);
            try
            {
                if(Servicio::where('cliente_id', '=', $id)->first() != null || Tratamiento::where('cliente_id', '=', $id)->first() != null
                    || Incidencia::where('cliente_id', '=', $id)->first() != null){
                    return back()->with('error','Se han creado registros con este cliente, no puede ser eliminado.');
                }else{
                    $cl->user->delete();
                    $cl->delete();
                    Session::flash('info', "Se ha eliminado el registro.");
                    return redirect()->route('clientes.index');

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
