<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\User;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'index', 'update']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=null;
        if(auth()->user()->tipo === 'cliente'){
            $clientes= Cliente::get();
            foreach ($clientes as $cl) {
                if($cl->user_id == auth()->user()->id)
                {
                    $user=$cl;
                }
            }

        }else{
            $empleados= Empleado::get();
            foreach ($empleados as $em) {
                if($em->user_id == auth()->user()->id)
                {
                    $user=$em;
                }
            }
        }

        return view('auth.perfil', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'password_confirmation' => 'required|min:8',
            'pass' => 'required|min:8'
        ]);
        $user= User::findOrFail($id);
        $user->password=bcrypt($request->get('pass'));
        $user->save();

        return back()->with('info','Se ha actualizado la contraseña.');
    }

}
