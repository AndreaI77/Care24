<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Servicio;
use App\Models\Informe;
use App\Models\Incidencia;
use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Http\Controllers\Carbon;
use App\Http\Requests\EmpleadoRequest;
use Illuminate\Support\Facades\Session;
use Exception;
use Illuminate\Support\Facades\Mail;
use App\Mail\PassMail;
use Illuminate\Support\Str;

class EmpleadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'index','create', 'store','show', 'edit', 'update', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->tipo == 'Administrativo'){

            $empleados= Empleado::get();

            return view('empleados.index', compact( 'empleados'));
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
            return view('empleados.create');
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
    public function store(EmpleadoRequest $request)
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
                $user->tipo=$request->get('puesto');
                if($request->hasFile('foto')){
                    $file = $request->file('foto');
                    $path = 'img/fotos/';
                    $filename= time().'-'.$file->getClientOriginalName();
                    $uploadSuccess = $request->file('foto')->move($path , $filename);
                    $user->foto = $path . $filename;
                }
                $user->activo= 1;
                $pass = Str::random(8);
                $user->password=bcrypt($pass);
                $user->save();
                $emp=new Empleado();
                $emp->user_id=$user->id;
                $emp->puesto=$request->puesto;

                $emp->idiomas=$request->idiomas;
                $emp->user()->associate($user);
                $emp->save();

                $details=[
                    'password' => $pass
                ];

                Mail::to($user->email)->send(new PassMail($details));

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
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(auth()->user()->tipo == 'Administrativo'){
            $empleado= Empleado::findOrFail($id);

            return view('empleados.show', compact('empleado'));
        }else{
            Session::flash('danger','No está autorizado a acceder a esta ruta.');
            return redirect()->route('inicio');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->user()->tipo == 'Administrativo'){
            $empleado= Empleado::findOrFail($id);
            return view('empleados.edit', compact('empleado'));
        }else{
            Session::flash('danger','No está autorizado a acceder a esta ruta.');
            return redirect()->route('inicio');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(EmpleadoRequest $request, $id)
    {
        if(auth()->user()->tipo == 'Administrativo'){
            $empleado= Empleado::findOrFail($id);
            $empleado->user->nombre=$request->get('nombre');
            $empleado->user->apellido=$request->get('apellido');
            $empleado->user->domicilio=$request->get('domicilio');
            $empleado->user->dni=$request->get('DNI');
            $empleado->user->email=$request->get('email');
            $empleado->user->tel=$request->get('tel');
            $empleado->user->fecha_nac=$request->get('fecha_nacimiento');
            $empleado->user->datos=$request->get('datos');

            $empleado->user->fecha_baja= $request->get('fecha_baja');

            if($request->hasFile('foto')){
                $file = $request->file('foto');
                $path = 'img/fotos/';
                $filename= time().'_'.$file->getClientOriginalName();
                $uploadSuccess = $request->file('foto')->move($path , $filename);
                $empleado->user->foto = $path . $filename;
            }
            $empleado->user->save();
            $empleado->puesto=$request->get('puesto');
            $empleado->idiomas=$request->get('idiomas');

            $empleado->save();
            Session::flash('info', "Se han actualizado los datos.");

            return redirect()->route('empleados.show', $id);
        }else{
            Session::flash('danger','No está autorizado a acceder a esta ruta.');
            return redirect()->route('inicio');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->tipo == 'Administrativo'){
            $empleado= Empleado::findOrFail($id);
            try
            {
                if(Servicio::where('empleado_id', '=', $id)->first() != null || Informe::where('empleado_id', '=', $id)->first() != null
                    || Incidencia::where('empleado_id', '=', $id)->first() != null){
                    return back()->with('error','Se han creado registros con este empleado, no puede ser eliminado.');
                }else{
                    $empleado->user->delete();
                    $empleado->delete();
                    Session::flash('info', "Se ha eliminado el registro.");
                    return redirect()->route('empleados.index');

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
