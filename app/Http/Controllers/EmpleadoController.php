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
        $this->middleware('auth', ['only' => 'index','create', 'store', 'edit', 'update', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $empleados= Empleado::get();

        return view('empleados.index', compact( 'empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpleadoRequest $request)
    {
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
            $user->tipo="empleado";
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


            //enviar email con contraseña care24web@gmail.com, webcare24

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
        $empleado= Empleado::findOrFail($id);

        return view('empleados.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado= Empleado::findOrFail($id);
        return view('empleados.edit', compact('empleado'));
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
        $empleado= Empleado::findOrFail($id);
        $empleado->user->nombre=$request->get('nombre');
        $empleado->user->apellido=$request->get('apellido');
        $empleado->user->domicilio=$request->get('domicilio');
        $empleado->user->dni=$request->get('DNI');
        $empleado->user->email=$request->get('email');
        $empleado->user->tel=$request->get('tel');
        $empleado->user->fecha_nac=$request->get('fecha_nacimiento');
        $empleado->user->datos=$request->get('datos');
        $empleado->user->fecha_baja=$request->get('fecha_baja');
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
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
    }
}
